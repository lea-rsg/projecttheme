<?php
/**
 * Werte Desktop
 * Felder: values (repeater: label, style, icon)
 */

$values = get_sub_field('values');

if (empty($values) || !is_array($values)) {
  $values = [
    ['label' => 'passion', 'style' => 'folk', 'icon' => 'yarn'],
    ['label' => 'community', 'style' => 'subtitle', 'icon' => 'thread'],
    ['label' => 'fun', 'style' => 'folk', 'icon' => 'needle'],
    ['label' => 'events', 'style' => 'subtitle', 'icon' => 'stitch'],
    ['label' => 'handcrafted', 'style' => 'folk', 'icon' => 'sisterhood'],
    ['label' => 'sisterhood', 'style' => 'subtitle', 'icon' => ''],
  ];
}

$icon_files = [
  'yarn' => 'yarn.svg',
  'thread' => 'thread.svg',
  'needle' => 'needle.svg',
  'stitch' => 'stitch.svg',
  'sisterhood' => 'sisterhood.svg',
];
?>

<div class="werte-desktop">
  <div class="werte-desktop__row">
    <?php foreach ($values as $value):
      $label = isset($value['label']) ? trim((string) $value['label']) : '';
      $style = isset($value['style']) ? $value['style'] : 'subtitle';
      $icon_key = isset($value['icon']) ? $value['icon'] : '';
      $icon_id = isset($value['icon_image']) ? (int) $value['icon_image'] : 0;

      if ($label): ?>
        <p class="werte-desktop__label werte-desktop__label--<?php echo esc_attr($style === 'folk' ? 'folk' : 'subtitle'); ?>"><?php echo esc_html($label); ?></p>
      <?php endif;

      if ($icon_id): ?>
        <span class="werte-desktop__icon">
          <?php echo wp_get_attachment_image($icon_id, 'full', false, [
            'class' => 'werte-desktop__icon-image',
            'loading' => 'lazy',
            'decoding' => 'async',
            'alt' => '',
          ]); ?>
        </span>
      <?php elseif (isset($icon_files[$icon_key])):
        $icon_url = get_template_directory_uri() . '/assets/images/werte/' . $icon_files[$icon_key];
        ?>
        <span class="werte-desktop__icon">
          <img class="werte-desktop__icon-image" src="<?php echo esc_url($icon_url); ?>" width="64" height="40" alt="" loading="lazy" decoding="async">
        </span>
      <?php endif;
    endforeach; ?>
  </div>
</div>
