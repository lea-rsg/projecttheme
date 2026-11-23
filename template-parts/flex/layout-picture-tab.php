<?php
/**
 * Picture Tab
 * Felder: images (gallery)
 */

$images = get_sub_field('images');

if (empty($images) || !is_array($images)) {
  $images = [];
  for ($i = 1; $i <= 16; $i++) {
    $images[] = get_template_directory_uri() . '/assets/images/picture-tab/' . str_pad((string) $i, 2, '0', STR_PAD_LEFT) . '.png';
  }
}
?>

<div class="picture-tab">
  <?php foreach (array_slice($images, 0, 16) as $image):
    if (is_array($image)) {
      $image_id = (int) ($image['ID'] ?? 0);
      $image_url = $image_id ? (wp_get_attachment_image_url($image_id, 'large') ?: '') : '';
    } else {
      $image_id = is_numeric($image) ? (int) $image : 0;
      $image_url = $image_id ? (wp_get_attachment_image_url($image_id, 'large') ?: '') : (is_string($image) ? $image : '');
    }
    if ($image_url): ?>
      <figure class="picture-tab__item">
        <?php if ($image_id):
          echo wp_get_attachment_image($image_id, 'large', false, [
            'class' => 'picture-tab__image',
            'loading' => 'lazy',
            'decoding' => 'async',
            'alt' => '',
          ]);
        else: ?>
          <img class="picture-tab__image" src="<?php echo esc_url($image_url); ?>" alt="" loading="lazy" decoding="async">
        <?php endif; ?>
      </figure>
    <?php endif;
  endforeach; ?>
</div>
