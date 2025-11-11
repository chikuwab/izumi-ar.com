<?php
get_header();
$post_type = get_post_type($post);
?>
<main class="l-main">
  <div class="l-main__contents">
    <div class="p-section-primary">
      <section class="p-section-primary__item u-inner">
        <?php get_template_part('template-parts/content', 'works'); ?>
      </section>
    </div>
  </div>
</main>
<?php
get_footer();
