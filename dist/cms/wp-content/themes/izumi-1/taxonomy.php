<?php
get_header();
$taxonomy = get_query_var('taxonomy');
$post_type = get_taxonomy($taxonomy)->object_type[0];

?>
<div class="u-inner">
	<header class="p-header-1">
		<div class="p-header-1__ttl">
			<p class="p-ttl-4">
				<span class="p-ttl-4__item"><?php echo esc_html(get_post_type_object(get_post_type())->label); ?></span>
			</p>
		</div>
		<div class="p-header-1__subttl">
			<h1 class="p-header-1__subttl__item"><?php echo single_term_title() ?></h1>
		</div>
	</header>
</div>
<?php if (have_posts()) : ?>
	<section class="p-section u-mg-t0">
		<div class="p-section__item u-mg-t0">
			<div class="u-inner">
				<div class="p-article-card p-article-card--cate_none">
					<?php while (have_posts()) : the_post(); ?>
						<?php get_template_part('template-parts/content', $post_type); ?>
					<?php endwhile; ?>
				</div>
			</div>
		</div>

		<div class="p-section__item">
			<div class="u-inner-narrow">
				<div class="p-pagination">
					<div class="p-pagination__item">
						<?php
						the_posts_pagination(
							array(
								'prev_text' => '戻る',
								'next_text' => '次へ',
							)
						);
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
<?php get_footer();
