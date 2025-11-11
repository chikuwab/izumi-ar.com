					<div class="p-buy_list p-buy_list--slide js-list-slide">
						<?php
						$args = array(
							'post_type' => 'buy',
							'post_status' => 'publish',
							'posts_per_page' => '-1',
							'meta_query' => array(
								array(
									'key' => 'ピックアップ',
									'value' => '1'
								)
							)
						);
						$pickup_query = new WP_Query($args);
						$param = ['slide' => true];
						if ($pickup_query->have_posts()) {
							while ($pickup_query->have_posts()) {
								$pickup_query->the_post();
								get_template_part('template-parts/content', 'buy', $param);
							}
							wp_reset_query();
						}
						?>
					</div>