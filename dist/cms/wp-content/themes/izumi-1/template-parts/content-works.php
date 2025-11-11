<?php
$field_subtitle = SCF::get('subtitle');
// $field_summary = SCF::get('summary');
?>
<?php if (is_single()): ?>
  <div class="p-block-cms p-block-cms--works">
    <div class="p-block-cms__header">
      <div class="p-block-cms__eyechatch"><?php echo post_thumbnail_tag('large') ?></div>
      <div class="p-block-cms__title"><?php the_title(); ?></div>
      <div class="p-block-cms__sub"><?php echo $field_subtitle; ?></div>
      <?php the_field_summary($post->ID); ?>
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
  <a class="p-block-works-list__item" href="<?php the_permalink() ?>">
    <div class="p-block-works-list__pic">
      <?php echo post_thumbnail_tag('medium') ?>
    </div>
    <div class="p-block-works-list__data">
      <div class="p-block-works-list__title"><?php the_title(); ?></div>
      <div class="p-block-works-list__sub"><?php echo $field_subtitle; ?></div>
    </div>
  </a>
<?php endif; ?>