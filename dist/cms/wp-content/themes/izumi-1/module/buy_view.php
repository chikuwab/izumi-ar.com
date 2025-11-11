	<div class="l-main__header">
		<header class="p-header">
			<div class="p-header__txt1"><span class="p-header__txt1__main">買う</span><span class="u-uptxt u-uptxt--header p-header__txt1__sub">buy</span></div>
			<h1 class="p-header__txt2">販売商品を探す</h1>
			<div class="p-header__bread">
				<div class="c-bread">
					<a href="/" class="c-bread__item">HOME</a>
					<a href="<?php echo get_post_type_archive_link('buy'); ?>?top=1" class="c-bread__item">買う</a>
					<span class="c-bread__item c-bread__item--current">販売商品を探す</span>
				</div>
			</div>
		</header>
	</div>
	<div class="l-main__contents">
		<article class="p-article">
			<section class="p-article__section">
				<div class="p-article__inner p-article__inner--wide">
					<?php if (is_tax()) : ?>
						<div class="p-article__block">
							<h1 class="p-article__ttl1"><?php single_term_title() ?></h1>
						</div>
					<?php else : ?>
						<div class="p-article__block">
							<div>
								<?php
								$taxonomy_terms = get_terms('buy_category'); // タクソノミースラッグを指定
								if (!empty($taxonomy_terms) && !is_wp_error($taxonomy_terms)) :
									foreach ($taxonomy_terms as $taxonomy_term) : // foreach ループの開始
								?>
										<a href="<?php echo get_term_link($taxonomy_term); ?>" class="p-buy_cate p-buy_cate--btn">
											<div class="p-buy_cate__item p-buy_cate__item--<?php echo $taxonomy_term->slug; ?>"><?php echo $taxonomy_term->name; ?></div>
										</a>
								<?php
									endforeach; // foreach ループの終了
								endif;
								?>
							</div>
						</div>
					<?php endif; ?>
					<div class="p-article__block">
						<div class="p-buy_list p-buy_list--view js-infinite__wrap">
							<?php while (have_posts()) : the_post(); ?>
								<?php $slide = false; ?>
								<?php get_template_part('template-parts/content', 'buy', $slide); ?>
							<?php endwhile; ?>
						</div>
					</div>
					<?php if (get_next_posts_link()) : ?>
						<div class="p-article__block">
							<div class="p-article__btn">
								<?php echo get_next_posts_link('もっとみる') ?>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</section>
			<section class="p-article__section">
				<div class="p-article__inner">
					<div class="p-mall">
						<div class="p-mall__item">
							<a href="https://www.rakuten.ne.jp/gold/gage78/" target="_blank" class="p-mall__btn p-mall__btn--rakuten">
								<img src="/assets/img/buy/logo-rakuten.svg" alt="楽天" />
								<div class="p-mall__txt1">楽天ポイントが貯まります！</div>
							</a>
							<div class="p-mall__data">
								<div class="p-mall__txt2">主なラインナップ</div>
								<p class="p-mall__txt3">ブランドバッグ、小物/腕時計/宝石/貴金属類その他宝飾品など</p>
							</div>
						</div>
						<div class="p-mall__item">
							<a href="https://auctions.yahoo.co.jp/seller/gage_takayama" target="_blank" class="p-mall__btn p-mall__btn--yahoo">
								<img src="/assets/img/buy/logo-yahoo.png" alt="ヤフオク" />
								<div class="p-mall__txt1">掘り出し物を出店中！</div>
							</a>
							<div class="p-mall__data">
								<div class="p-mall__txt2">主なラインナップ</div>
								<p class="p-mall__txt3">パソコン各種/スマートフォン・カメラ各種/AV・生活家電/電動工具類/カーナビ/楽器/スポーツ用品/ゲーム機/毛皮コート、革ジャン/その他</p>
							</div>
						</div>
					</div>
				</div>
			</section>
		</article>
	</div>