<?php
get_header();
?>
<main class="l-main">
  <div class="l-main__contents">
    <div class="p-section-primary">
      <section class="p-section-primary__item u-inner">
        <div class="p-block-primary">
          <div class="p-block-primary__header">
            <div class="p-block-primary__title">
              <div class="p-title-primary p-title-primary--large">
                <div class="p-title-primary__item">works</div>
              </div>
            </div>
            <div class="p-block-primary__summary">
              <p class="u-text-center-br-none u-lh-large">これまでに設計した住宅と現在進めている計画をご紹介しています。<br>それぞれ土地や予算も異なる中で会話を重ねて、<br>お気に入りの一軒を届けるために、愛着を持って設計しています。</p>
            </div>
          </div>
          <div class="p-block-primary__contents">
            <div class="p-block-works-list p-block-works-list--columns">
              <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/content', 'works'); ?>
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
