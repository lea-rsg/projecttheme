<?php
/**
 * Community overview
 * Felder: title, text, background_image, images (repeater: image)
 */

$title = get_sub_field('title') ?: __('From our community to our community', 'projecttheme');
$text  = get_sub_field('text') ?: __('explore what our members have crafted in the past', 'projecttheme');
$bg_id = (int) get_sub_field('background_image');
$images = get_sub_field('images');

$default_bg = get_template_directory_uri() . '/assets/images/community-overview/background.png';
$bg_url = $bg_id ? (wp_get_attachment_image_url($bg_id, 'full') ?: $default_bg) : $default_bg;

if (empty($images) || !is_array($images)) {
  $images = [
    ['image' => get_template_directory_uri() . '/assets/images/community-overview/craft-embroidery.png'],
    ['image' => get_template_directory_uri() . '/assets/images/community-overview/craft-press.png'],
    ['image' => get_template_directory_uri() . '/assets/images/community-overview/craft-crochet.png'],
  ];
}

$rotations = [-5.55, 2.41, -1.92];
?>

<div class="community-overview" style="--community-overview-bg: url('<?php echo esc_url($bg_url); ?>');">
  <?php if ($title): ?>
    <h2 class="community-overview__title"><?php echo nl2br(esc_html($title)); ?></h2>
  <?php endif; ?>

  <?php if ($text): ?>
    <p class="community-overview__text"><?php echo esc_html($text); ?></p>
  <?php endif; ?>

  <?php if (!empty($images)): ?>
    <div class="community-overview__grid">
      <?php foreach (array_slice($images, 0, 3) as $index => $item):
        $image = $item['image'] ?? 0;
        $rotation = $rotations[$index] ?? 0;
        ?>
        <div class="community-overview__card">
          <div class="community-overview__frame" style="--community-card-rotation: <?php echo esc_attr($rotation); ?>deg;">
            <?php if (is_numeric($image) && (int) $image > 0):
              echo wp_get_attachment_image((int) $image, 'large', false, [
                'class' => 'community-overview__image',
                'loading' => 'lazy',
                'decoding' => 'async',
              ]);
            elseif (is_string($image) && $image !== ''): ?>
              <img class="community-overview__image" src="<?php echo esc_url($image); ?>" alt="" loading="lazy" decoding="async">
            <?php endif; ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</div>
