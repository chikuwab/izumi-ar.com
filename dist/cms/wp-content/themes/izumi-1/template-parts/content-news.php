<?php if (is_single()): ?>
  <div class="p-block-cms">
    <div class="p-block-cms__header">
      <?php if (has_post_thumbnail()) : ?>
        <div class="p-block-cms__eyechatch">
          <?php echo post_thumbnail_tag('large') ?>
        </div>
      <?php endif; ?>
      <div class="p-block-cms__title"><?php the_title(); ?></div>
      <div class="p-block-cms__sub"><?php the_time('Y年n月j日'); ?></div>
    </div>
    <div class="p-block-cms__entry">
      <?php the_content(); ?>
    </div>
    <div class="p-block-cms__post_links">
      <?php
      previous_post_link('%link', '%title');
      next_post_link('%link', '%title');
      ?>
    </div>
  </div>
<?php else: ?>
  <a class="p-block-list__item" href="<?php the_permalink() ?>">
    <div class="p-block-list__date"><?php the_time('Y年n月j日'); ?></div>
    <div class="p-block-list__title"><?php the_title(); ?></div>
  </a>
<?php endif; ?>