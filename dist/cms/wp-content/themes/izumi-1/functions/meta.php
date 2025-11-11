<?php

/**
 * wp_header()にタイトルタグを出力
 */
function titles()
{
  add_theme_support('title-tag');
}
add_action('after_setup_theme', 'titles');

/**
 * タイトル内のセパレートを「-」を「|」に変更する
 */
function nendebcom_title_separator($sep)
{
  $sep = '|';
  return $sep;
}
add_filter('document_title_separator', 'nendebcom_title_separator');


/**
 * トップページの、サイトのディスクリプションを削除する
 */
function remove_title_description($title)
{
  global $post;
  $blog_name = get_bloginfo('name');
  $title['site'] = $blog_name;
  $post_type = get_post_type($post);


  if (is_home() || is_front_page()) {
    unset($title['tagline']);
  }


  $queried_object = get_queried_object();
  if (get_post_type()) {
    $post_type_label = esc_html(get_post_type_object(get_post_type())->label);
  }

  if (is_home() || is_front_page()) {
    $title['title'] = "";
  } elseif (is_archive()) {
    $ttl = get_the_archive_title('', false);
    if (!empty($ttl)) {
      $title['title'] = wp_strip_all_tags($ttl);
    }
  } elseif (is_single() && !empty($post_type_label)) {
    $title['title'] = wp_strip_all_tags(get_the_title());
  }
  return $title;
}
add_filter('document_title_parts', 'remove_title_description', 10, 1);

/**
 * タイトルから”アーカイブ：”、”カテゴリー：”、”タグ：”、”作者：”を消す
 */
add_filter('get_the_archive_title', function ($title) {
  if (is_archive()) {
    $title = post_type_archive_title('', false);
  } elseif (is_category()) {
    $title = single_cat_title('', false);
  } elseif (is_tag()) {
    $title = single_tag_title('', false);
  } elseif (is_author()) {
    $title = '<span class="vcard">' . get_the_author() . '</span>';
  }
  return $title;
});

/**
 * description設定
 */
function get_meta_description()
{
  global $post;
  $description = "";
  if (is_single() || is_page()) {
    $post_type = get_post_type($post);

    // ディスプリクション不要
    if (strcmp($post_type, "exhibition") == 0) {
      return $description;
    }

    if ($post->post_excerpt) {
      $description = $post->post_excerpt;
    } else {
      $description = strip_tags($post->post_content);
      $description = str_replace("\n", "", $description);
      $description = str_replace("\r", "", $description);
      if (mb_strlen($description, "UTF-8") >= 100) {
        $description = mb_substr($description, 0, 100) . "...";
      }
    }
  } elseif (is_front_page() || is_home()) {
    $description = get_bloginfo('description');
  }
  return $description;
}

/**
 * keywords設定
 */
// function get_meta_keywords()
// {
// 	global $post;
// 	$keywords = '';


// 	if (is_home() || is_front_page()) {
// 	} elseif (is_page()) {
// 	} elseif (is_archive()) {

// 		// if (is_post_type_archive('column')) {
// 		// } elseif (is_post_type_archive('leadership')) {
// 		// }
// 	} elseif (is_single()) {
// 		$post_type = get_post_type($post);
// 		if (strcmp($post_type, 'column') == 0) { // コラム
// 			$keywords = get_field('keywords', $post->ID);
// 		}
// 	}

// 	return $keywords;
// }


/**
 * keywords、descriptionを出力する
 */
function echo_meta_description_keywords_tag()
{
  echo '<meta name="description" content="' . get_meta_description() . '" />' . "\n";
  // echo '<meta name="keywords" content="' . get_meta_keywords() . '" />' . "\n";
}

/*
 * アーカイブタイトル
 */
function my_archive_title($title)
{
  if (is_category()) {
    $title = single_cat_title('', false);
  } elseif (is_post_type_archive()) {
    $title = single_tag_title('', false);
  }
  return $title;
}
add_filter('get_the_archive_title', 'my_archive_title', 10, 1);
