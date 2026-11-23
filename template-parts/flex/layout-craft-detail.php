<?php
/**
 * Craft detail card
 * Felder: title, what_needed (repeater: item), stores (repeater: link), image
 */

$title = get_sub_field('title') ?: __('Embroidery', 'projecttheme');
$what_needed = get_sub_field('what_needed');
$stores = get_sub_field('stores');
$image_id = (int) get_sub_field('image');

if (empty($what_needed) || !is_array($what_needed)) {
  $what_needed = [
    ['item' => 'Fabric - preferably cotton'],
    ['item' => 'Embroidery Hoop'],
    ['item' => 'Embroidery Floss'],
    ['item' => 'Needles'],
    ['item' => 'Scissors'],
    ['item' => 'optional: Needle Magnet'],
  ];
}

if (empty($stores) || !is_array($stores)) {
  $stores = [
    ['link' => ['url' => 'https://www.kasparharnisch.at', 'title' => 'Kaspar Harnisch', 'target' => '_blank']],
    ['link' => ['url' => 'https://www.maschenwerkstatt.at/de/', 'title' => 'Maschenwerkstatt', 'target' => '_blank']],
    ['link' => ['url' => 'https://www.tedi.com/at/', 'title' => 'Tedi', 'target' => '_blank']],
  ];
}

$default_image = get_template_directory_uri() . '/assets/images/craft-detail/embroidery.png';
$image_url = $image_id ? (wp_get_attachment_image_url($image_id, 'large') ?: $default_image) : $default_image;
?>

<div class="craft-detail">
  <div class="craft-detail__content">
    <?php if ($title): ?>
      <h2 class="craft-detail__title"><?php echo esc_html($title); ?></h2>
    <?php endif; ?>

    <h3 class="craft-detail__subtitle"><?php esc_html_e('What you need', 'projecttheme'); ?></h3>
    <?php if (!empty($what_needed)): ?>
      <ul class="craft-detail__list">
        <?php foreach ($what_needed as $entry):
          $item = $entry['item'] ?? '';
          if ($item): ?>
            <li><?php echo esc_html($item); ?></li>
          <?php endif;
        endforeach; ?>
      </ul>
    <?php endif; ?>

    <h3 class="craft-detail__subtitle craft-detail__subtitle--stores"><?php esc_html_e('Where to get it', 'projecttheme'); ?></h3>
    <?php if (!empty($stores)): ?>
      <ul class="craft-detail__list craft-detail__list--stores">
        <?php foreach ($stores as $entry):
          $link = $entry['link'] ?? [];
          $url = is_array($link) ? ($link['url'] ?? '') : '';
          $label = is_array($link) ? ($link['title'] ?? '') : '';
          $target = is_array($link) ? ($link['target'] ?? '_blank') : '_blank';
          if ($url): ?>
            <li><a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>" rel="<?php echo $target === '_blank' ? 'noopener noreferrer' : ''; ?>"><?php echo esc_html($label ?: $url); ?></a></li>
          <?php endif;
        endforeach; ?>
      </ul>
    <?php endif; ?>
  </div>

  <?php if ($image_url): ?>
    <div class="craft-detail__image-wrap">
      <img class="craft-detail__image" src="<?php echo esc_url($image_url); ?>" alt="" loading="lazy" decoding="async">
    </div>
  <?php endif; ?>
</div>
