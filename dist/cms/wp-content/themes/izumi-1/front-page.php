<?php
get_header();
?>
<main class="l-main">
  <div class="l-main__contents">
    <div class="p-section-primary u-mg-main">
      <section class="p-section-primary__item u-inner">
        <?php
        $args = array(
          'post_type' => 'works',
          'posts_per_page' => 6,
          'orderby' =>  'date', //キーの指定
          'order' =>  'DESC', //並び順の指定
        );
        $query = new WP_Query($args);
        if ($query->have_posts()) : ?>
          <div class="p-block-works-list">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
              <?php get_template_part('template-parts/content', 'works'); ?>
            <?php endwhile;
            wp_reset_postdata(); ?>
          </div>
          <div class="p-block-more">
            <div class="p-block-more__item">
              <a class="p-link-more" href="<?php echo esc_url(home_url('/works/')) ?>">
                <div class="p-link-more__item">more</div>
              </a>
            </div>
          </div>
        <?php endif; ?>
      </section>
      <section class="p-section-primary__item u-inner">
        <div class="p-block-home-list">
          <div class="p-block-home-list__header">
            <div class="p-title-primary">
              <div class="p-title-primary__item">news</div>
            </div>
          </div>
          <div class="p-block-list">
            <?php
            $args = array(
              'post_type' => 'news',
              'posts_per_page' => 6,
              'orderby' =>  'date', //キーの指定
              'order' =>  'DESC', //並び順の指定
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) : ?>
              <div class="p-block-list">
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                  <?php get_template_part('template-parts/content', 'news'); ?>
                <?php endwhile;
                wp_reset_postdata(); ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
        <div class="p-block-more">
          <div class="p-block-more__item">
            <a class="p-link-more" href="<?php echo esc_url(home_url('/news/')) ?>">
              <div class="p-link-more__item">more</div>
            </a>
          </div>
        </div>
      </section>
      <section class="p-section-primary__item u-inner">
        <div class="p-block-home-list">
          <div class="p-block-home-list__header">
            <div class="p-title-primary">
              <div class="p-title-primary__item">notebook</div>
            </div>
          </div>
          <div class="p-block-home-list__data">
            <?php
            $args = array(
              'post_type' => 'notebook',
              'posts_per_page' => 6,
              'orderby' =>  'date', //キーの指定
              'order' =>  'DESC', //並び順の指定
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) : ?>
              <div class="p-block-list">
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                  <?php get_template_part('template-parts/content', 'news'); ?>
                <?php endwhile;
                wp_reset_postdata(); ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
        <div class="p-block-more">
          <div class="p-block-more__item"> <a class="p-link-more" href="<?php echo esc_url(home_url('/notebook/')) ?>">
              <div class="p-link-more__item">more</div>
            </a></div>
        </div>
      </section>
      <section class="p-section-primary__item u-inner">
        <div class="p-block-home-about">
          <div class="p-block-home-about__header"><img src="/img/logo-mark.svg" alt=""></div>
          <div class="p-block-home-about__contents">
            <p>泉竜斗建築設計は、住宅を主に手がける設計事務所です。<br>私は多くの方が携わる家づくりの中で、設計という役目を担い、<br>建て主が求める想いをかたちにしていきます。</p>
          </div>
        </div>
        <div class="p-block-more">
          <div class="p-block-more__item"> <a class="p-link-more" href="<?php echo esc_url(home_url('/about/')) ?>">
              <div class="p-link-more__item">about</div>
            </a></div>
        </div>
      </section>
    </div>
  </div>
</main>


<?php get_footer();
