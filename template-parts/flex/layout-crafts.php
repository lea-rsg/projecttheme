<?php
/**
 * Crafts cards layout
 * Felder: cards (repeater: image, title, text, link)
 */

$cards = get_sub_field('cards');

if (empty($cards) || !is_array($cards)) {
  return;
}
?>

<div class="crafts">
  <div class="crafts__grid">
    <?php foreach ($cards as $card):
      $image_id = isset($card['image']) ? (int) $card['image'] : 0;
      $title    = isset($card['title']) ? $card['title'] : '';
      $text     = isset($card['text']) ? $card['text'] : '';
      $link     = isset($card['link']) && is_array($card['link']) ? $card['link'] : [];
      $url      = isset($link['url']) ? $link['url'] : '';
      $label    = isset($link['title']) && $link['title'] !== '' ? $link['title'] : __('learn more', 'projecttheme');
      $target   = isset($link['target']) && $link['target'] !== '' ? $link['target'] : '_self';
      ?>
      <article class="crafts__card">
        <div class="crafts__image-wrap">
          <?php if ($image_id): ?>
            <?php echo wp_get_attachment_image($image_id, 'medium_large', false, [
              'class'    => 'crafts__image',
              'loading'  => 'lazy',
              'decoding' => 'async',
            ]); ?>
          <?php endif; ?>
        </div>

        <div class="crafts__content">
          <?php if ($title): ?>
            <h3 class="crafts__title"><?php echo esc_html($title); ?></h3>
          <?php endif; ?>

          <?php if ($text): ?>
            <p class="crafts__text"><?php echo esc_html($text); ?></p>
          <?php endif; ?>

          <?php if ($url): ?>
            <a class="crafts__button" href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>">
              <?php echo esc_html($label); ?>
            </a>
          <?php endif; ?>
        </div>
      </article>
    <?php endforeach; ?>
  </div>
</div>
