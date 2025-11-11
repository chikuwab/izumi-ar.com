<?php
header("HTTP/1.1 301 Moved Permanently");
header("Location: " . get_bloginfo('url'));
exit();

/**
 * Template Name: 404 */
get_header();
?>
<div class="l-main__wrapper l-main__wrapper--cms">
	<div class="l-main__inner">
		<div class="l-main__content">
			<article class="p-content">
				<header class="p-cms_header">
					<div class="p-cms_header__ttl1">404 Not Found</div>
				</header>
				<div class="p-content__main">
					<div class="p-content__sec">
						<div class="p-content__entry">
							<p>お探しのページは、移動または削除された可能性があります。</p>
						</div>
					</div>
				</div>
			</article>
		</div>
	</div>
</div>

<?php
get_footer();
