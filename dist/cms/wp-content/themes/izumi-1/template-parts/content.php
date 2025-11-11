<article class="p-article-primary">
  <div class="p-article-primary__item">
    <div class="p-block-cms">
      <div class="p-block-cms__header">
        <div class="p-block-cms__eyechatch">
          <?php echo post_thumbnail_tag('large') ?>
        </div>
        <div class="p-block-cms__title"><?php the_title(); ?></div>
        <div class="p-block-cms__sub"><?php the_time('Y年n月j日'); ?></div>
        <?php the_field_summary($post->ID); ?>
      </div>
      <div class="p-block-cms__entry">
        <?php the_content(); ?>
      </div>
    </div>
  </div>
</article>