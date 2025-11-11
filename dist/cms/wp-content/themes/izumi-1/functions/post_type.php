<?php
/*
 * カスタム投稿タイプを追加
 */
function create_post_type()
{
  // WORKS
  register_post_type(
    'works',
    array(
      'label' => 'works',
      'public' => true,
      'has_archive' => true,
      'menu_position' => 2,
      'rewrite' => array('slug' => 'works'),
      'supports' => ['title', 'editor', 'revisions', 'custom-fields', 'thumbnail'],
      'description' => '',
      'show_in_rest' => true,
    )
  );

  // ブログ
  register_post_type(
    'notebook',
    array(
      'label' => 'notebook',
      'public' => true,
      'has_archive' => true,
      'menu_position' => 3,
      'rewrite' => array('slug' => 'notebook'),
      'supports' => ['title', 'editor', 'revisions', 'custom-fields', 'thumbnail'],
      'description' => '',
      'show_in_rest' => true,
    )
  );

  // お知らせ
  register_post_type(
    'news',
    array(
      'label' => 'news',
      'public' => true,
      'has_archive' => true,
      'menu_position' => 4,
      'rewrite' => array('slug' => 'news'),
      'supports' => ['title', 'editor', 'revisions', 'custom-fields', 'thumbnail'],
      'description' => '',
      'show_in_rest' => true,
    )
  );
}
add_action('init', 'create_post_type'); // アクションに上記関数をフックします


//カスタム投稿タイプを変更した際は下記リセット処理を実行
// global $wp_rewrite;
// $wp_rewrite->flush_rules();
