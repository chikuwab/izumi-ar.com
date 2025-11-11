<?php
/*
 * ページネーションカスタマイズ
 */
function custom_the_posts_pagination($template)
{

  $num = (get_query_var('paged') === 0) ? 1 : get_query_var('paged');

  $template = '
	<nav class="c-pagination %1$s pagination--page' . $num . '" role="navigation">
		%3$s
	</nav>';
  return $template;
}
add_filter('navigation_markup_template', 'custom_the_posts_pagination');


/*
 * previous_post_link() と next_post_link() にクラス付加
 */
add_filter('previous_post_link', 'add_prev_post_link_class');
function add_prev_post_link_class($output)
{
  return str_replace('<a href=', '<a class="p-link-latenav p-link-latenav--prev" href=', $output);
}
add_filter('next_post_link', 'add_next_post_link_class');
function add_next_post_link_class($output)
{
  return str_replace('<a href=', '<a class="p-link-latenav p-link-latenav--next" href=', $output);
}

/*
 * previous_posts_link() と next_posts_link() にクラス付加
 */
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes()
{
  return 'class="p-article__btn__item p-article__btn__item--em p-article__btn__item--arrow_none js-infinite__trigger"';
}
