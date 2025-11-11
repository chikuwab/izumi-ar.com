<?php
get_header();
?>
<main class="l-main">
  <div class="l-main__contents">
    <div class="p-section-primary">
      <section class="p-section-primary__item u-inner u-inner--narrow">
        <div class="p-block-primary">
          <div class="p-block-primary__header">
            <div class="p-block-primary__title">
              <div class="p-title-primary p-title-primary--large">
                <div class="p-title-primary__item">news</div>
              </div>
            </div>
            <!-- <div class="p-block-primary__summary">
              <p class="u-text-center-br-none u-lh-large">テキストが入ります。テキストが入ります。<br>テキストが入ります。テキストが入ります。テキストが入ります。</p>
            </div> -->
          </div>
          <div class="p-block-primary__contents">
            <div class="p-block-list">
              <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/content', 'news'); ?>
              <?php endwhile; ?>
            </div>
          </div>
          <div class="p-block-primary__contents">
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
    </div>
  </div>
</main>
<?php get_footer();
