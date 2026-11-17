<?php
/**
 * Panel Image Content / Desktop
 * Felder: image (ID), heading (text), subheading (text), text (textarea|wysiwyg)
 */

$image_id    = get_sub_field('image');
$heading     = get_sub_field('heading');
$subheading  = get_sub_field('subheading');
$body        = get_sub_field('text');
?>

<div class="panel-image-content-desktop">
  <?php if ($image_id): ?>
    <div class="panel-image-content-desktop__image-wrap">
      <?php echo wp_get_attachment_image($image_id, 'large', false, [
        'class'    => 'panel-image-content-desktop__image',
        'loading'  => 'lazy',
        'decoding' => 'async',
      ]); ?>
    </div>
  <?php endif; ?>

  <div class="panel-image-content-desktop__content">
    <?php if ($heading): ?>
      <p class="panel-image-content-desktop__heading"><?php echo esc_html($heading); ?></p>
    <?php endif; ?>

    <?php if ($subheading): ?>
      <h3 class="panel-image-content-desktop__subheading"><?php echo esc_html($subheading); ?></h3>
    <?php endif; ?>

    <?php if ($body): ?>
      <div class="panel-image-content-desktop__text rte">
        <?php echo wp_kses_post($body); ?>
      </div>
    <?php endif; ?>
  </div>
</div>
