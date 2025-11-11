<?php


/*
 * 不要項目削除
 */
add_action('admin_menu', 'remove_menus');
function remove_menus()
{
  remove_menu_page('edit.php'); // 投稿
  remove_menu_page('edit-comments.php'); //コメントメニュー
  if (current_user_can('editor')) {
    // remove_menu_page('index.php'); //ダッシュボード
    // remove_menu_page('upload.php'); //メディア
    remove_menu_page('edit.php?post_type=page'); //ページ追加
    remove_menu_page('themes.php'); //外観メニュー
    remove_menu_page('plugins.php'); //プラグインメニュー
    remove_menu_page('tools.php'); //ツールメニュー
    remove_menu_page('options-general.php'); //設定メニュー
    remove_menu_page('edit.php?post_type=mw-wp-form'); // MW WP Form.
    // remove_menu_page('profile.php'); // プロフィール
    // remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=post_tag');
  }
}
/*
 * 投稿編集画面で不要な項目を非表示にする
 */
function my_remove_post_support()
{
  // remove_post_type_support('consul','editor');
  // remove_post_type_support('maintenance','editor');
  // remove_post_type_support('design','editor');
  // remove_post_type_support('shouka_shiken','editor');
  // remove_post_type_support('products','editor');
}
add_action('init', 'my_remove_post_support');



/*
 * ツールバー(admin bar)の表示・非表示
 */
add_filter('show_admin_bar', '__return_false');




/*
 * 固定ページでGUTENBERG（ブロックエディタ）を無効化
 */
add_filter('use_block_editor_for_post_type', 'hide_block_editor', 10, 10);
function hide_block_editor($use_block_editor, $post_type)
{
  if ($post_type === 'page') return false;
  return $use_block_editor;
}

/**
 * アイキャッチ有効化
 */
add_theme_support('post-thumbnails');

/**
 * 管理画面スタイル
 */
function my_admin_style()
{
  wp_enqueue_style('my_admin_style', get_template_directory_uri() . '/admin.css');
}
add_action('admin_enqueue_scripts', 'my_admin_style');


/**
 *  メディアを追加でデフォルトで挿入されるwidth/height/classをimgタグから削除 
 */
add_filter('wp_img_tag_add_width_and_height_attr', '__return_false');

/**
 *  Gutenberg（ブロックエディタ）カスタマイズ
 */
// function add_my_block_editor()
// {
//   wp_enqueue_script(
//     'block-script',
//     get_template_directory_uri() . '/block_custom.js', //JSのパス
//     array('wp-blocks', 'wp-dom-ready', 'wp-edit-post'),
//     '1.0.0',
//     true
//   );
// }
// add_action('enqueue_block_editor_assets', 'add_my_block_editor');
