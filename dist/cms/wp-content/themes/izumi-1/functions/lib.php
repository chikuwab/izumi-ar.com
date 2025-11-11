<?php

/**
 * ユニークファイル名
 * キャッシュ対策
 */
function enqueue_file($ver_file, $show_file)
{
  $ver_file = get_template_directory() . $file;
  $show_file = get_template_directory_uri() . $file;
  if (file_exists($ver_file)) {
    echo $show_file . "?ver=" . date('YmdGi', filemtime($ver_file));
  } else {
    echo $show_file;
  }
}

/*
* 半角英数字
*/
function is_alnum($text)
{
  if (preg_match("/^[a-zA-Z0-9]+$/", $text)) {
    return true;
  } else {
    return false;
  }
}

/*
* 半角数字
*/
function is_num($text)
{
  if (preg_match('/^[0-9]+$/', $text)) {
    return true;
  } else {
    return false;
  }
}

/*
* エスケープ処理
*/
function htmlsc($s)
{
  return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
}

/*
* スラッグなど取得
*/
function get_page_info($post)
{
  $info['slug'] = "";
  $info['parent_id'] = "";
  $info['parent_slug'] = "";
  if (is_page()) {
    $page = get_post(get_the_ID());
    $info['slug'] = $page->post_name;
    $info['parent_id'] = $post->post_parent;
    $info['parent_slug'] = ($info['parent_id']) ? get_post($info['parent_id'])->post_name : "";
  } elseif (is_home() || is_front_page()) {
  }
  return $info;
}

/**
 * アイキャッチがない場合はNOIMAGE画像を表示
 */
function post_thumbnail_set($size = 'medium', $slug = "", $post_id = null)
{
  if (has_post_thumbnail()) {
    if (empty($post_id)) {
      return get_the_post_thumbnail_url(get_the_ID(), $size);
    } else {
      return get_the_post_thumbnail_url($post_id, $size);
    }
  } else {
    $thumb = "";
    if ($size === 'thumbnail') {
      $thumb = "-thumbnail";
    }
    if ($slug) :
      return '/img/noimage-' . $slug . $thumb . '.webp';
    else :
      return '/img/noimage' . $thumb . '.webp';
    endif;
  }
}


/**
 * アイキャッチがない場合はNOIMAGE画像を表示
 */
function post_thumbnail_tag($size = 'medium', $slug = "", $post_id = null)
{
  $src = "";
  $width = "";
  $height = "";
  $thumbnail_id = get_post_thumbnail_id($post_id);

  if (has_post_thumbnail()) {
    // if (empty($post_id)) {
    //   $src = get_the_post_thumbnail_url(get_the_ID(), $size);
    // } else {
    //   $src = get_the_post_thumbnail_url($post_id, $size);
    // }
    $image = wp_get_attachment_image_src($thumbnail_id, $size);
    $src = $image[0];
    $width = $image[1];
    $height = $image[2];
  } else {
    $thumb = "";
    if ($size === 'thumbnail') {
      $thumb = "-thumbnail";
    }
    if ($slug) :
      $src = '/img/noimage-' . $slug . $thumb . '.webp';
    else :
      $src = '/img/noimage' . $thumb . '.webp';
    endif;
  }

  echo '<img src="' . $src . '" alt="" width="' . $width . '" height="' . $height . '" />';
}


function post_thumbnail_set2($size = 'medium', $slug = "", $post_id = null, $class = '')
{
  $has_thumbnail = ($post_id) ? has_post_thumbnail($post) : has_post_thumbnail();


  if ($has_thumbnail) {
    the_post_thumbnail($size, array('class' => $class));
  } else {
    $thumb = "";
    if ($size === 'thumbnail') {
      $thumb = "thumbnail";
    }
    if ($slug) {
      echo '<img src="/assets/img/common/noimage-' . $slug . $thumb . '.png" alt="" class="' . $class . '" />';
    } else {
      echo '<img src="/assets/img/common/noimage-' . $thumb . '.png" alt="" class="' . $class . '" />';
    }
  }
}

/**
 * 文字抜粋
 */
function excerpt_text($txt, $length = 80)
{
  if (mb_strlen($txt) > $length) {
    return mb_substr($txt, 0, $length) . '…';
  } else {
    return $txt;
  }
}
/**
 * OG TYPE 出力
 */
function og_type()
{
  if (is_home() || is_front_page()) {
    echo "website";
  } else {
    echo "article";
  }
}

/**
 * 言語取得
 */
function is_en()
{
  global $post;
  $page_info = get_page_info($post);
  $post_type = get_post_type($post);

  if (strpos($post_type, "en_") !== false || strpos($page_info['slug'], "en_") !== false) {
    return true;
  } else {
    return false;
  }
}

/**
 * タグが一致する記事IDを取得
 */
function getRecommendEntryIds(&$a_recommend_auto, $post_id, $post_type, $taxonomy, $posts_per_page, &$tag_ids, $loop_max_tags)
{

  $args = array(
    'post_status' => 'publish',
    'post__not_in' => array($post_id),
    'post_type' => $post_type,
    'taxonomy' => $taxonomy,
    'term__and' => $tag_ids,
    'orderby' => 'rand',
  );
  $the_query = new WP_Query($args);
  if ($the_query->have_posts() && !empty($tag_ids)) :
    while ($the_query->have_posts()) : $the_query->the_post();
      array_push($a_recommend_auto, $the_query->post->ID);
    endwhile;
  endif;
  wp_reset_postdata();

  $a_recommend_auto = array_unique($a_recommend_auto);

  if (count($tag_ids) >= $loop_max_tags && count($a_recommend_auto) < $posts_per_page) {
    array_pop($tag_ids);
    getRecommendEntryIds($a_recommend_auto, $post_id, $post_type, $taxonomy, $posts_per_page, $tag_ids, $loop_max_tags);
  }
}

/**
 * 概要文取得
 */
function the_field_summary($post_id)
{
  $field_summary = SCF::get('summary', $post_id);
  $ret = "";
  if ($field_summary) {
    $ret = '<div class="p-block-cms__summary"><p class="u-lh-large">' . nl2br($field_summary) . '</p></div>';
  }
  echo $ret;
}
