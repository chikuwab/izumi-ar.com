<?php

/**
 * head不要なコードの削除
 */
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);

/**
 * 「global-styles-inline-css」を削除
 */
add_action('wp_enqueue_scripts', 'remove_my_global_styles');
function remove_my_global_styles()
{
  wp_dequeue_style('global-styles');
}

/**
 * oEmbed無効化
 */
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');


/*
 * 自動挿入される不要テーマ（CSS、JS）の削除
 */
add_action('wp_enqueue_scripts', 'remove_block_library_style');
function remove_block_library_style()
{
  wp_dequeue_style('wp-block-library');
  wp_dequeue_style('wp-block-library-theme');
}

/*
 * 抜粋
 */
function my_excerpt_more($more)
{
  return '…';
}
add_filter('excerpt_more', 'my_excerpt_more');

function my_excerpt_length($length)
{
  return 80;
}
add_filter('excerpt_length', 'my_excerpt_length');


/*
 * 空欄・スペース検索の結果を変更する関数（結果非表示）
 */
function mycus_empty_and_blank_search_invalid_func($search, \WP_Query $q)
{
  if ($q->is_search() && $q->is_main_query() && !$q->is_admin()) {
    $s = $q->get('s');
    $s = trim($s);
    if (empty($s)) {
      $search .= " AND 0=1 ";
    }
  }
  return $search;
}
add_filter('posts_search', 'mycus_empty_and_blank_search_invalid_func', 10, 2);


/*
 * 画像タグのwidth、height属性の削除
*/
function remove_width_attribute($html)
{
  $html = preg_replace('/(width|height)="\d*"\s/', "", $html);
  return $html;
}
add_filter('post_thumbnail_html', 'remove_width_attribute', 10);
add_filter('image_send_to_editor', 'remove_width_attribute', 10);

/*
 * 投稿の並び順を変更
 */
// function twpp_change_sort_order($query)
// {
// 	if (is_admin() || !$query->is_main_query()) {
// 		return;
// 	}
// 	if ($query->is_post_type_archive('exhibition')) {
// 		$queried_object = $query->get_queried_object();
// 		$term_slug = $queried_object->slug;
// 		if (strcmp($term_slug, 'open') == 0) {
// 			$query->set('order', 'ASC');
// 			$query->set('orderby', 'date');
// 		}
// 	}
// }
// add_action('pre_get_posts', 'twpp_change_sort_order');

/* カスタム投稿の表示件数を変更 */
function change_posts_per_page($query)
{
  if (is_admin() || ! $query->is_main_query())
    return;
  if ($query->is_post_type_archive('notebook')) { //カスタム投稿タイプを指定
    $query->set('posts_per_page', '3'); //表示件数を指定
  }
}
add_action('pre_get_posts', 'change_posts_per_page');
