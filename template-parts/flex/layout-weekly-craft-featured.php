<?php
/**
 * Weekly Craft (featured CTA)
 * Felder: title, text, cta, background_image (optional), icon_image (optional)
 */

$title = get_sub_field('title') ?: __('Want to be featured?', 'projecttheme');
$text  = get_sub_field('text') ?: __('We look forward to seeing your own creations! DM us your crafts on Instagram to inspire other crafters!', 'projecttheme');
$cta   = get_sub_field('cta');
$bg_id = (int) get_sub_field('background_image');
$icon_id = (int) get_sub_field('icon_image');

$default_bg = get_template_directory_uri() . '/assets/images/weekly-craft-featured/cloud.png';
$default_icon = get_template_directory_uri() . '/assets/images/weekly-craft-featured/instagram.svg';

$bg_url = $bg_id ? (wp_get_attachment_image_url($bg_id, 'full') ?: $default_bg) : $default_bg;
$icon_url = $icon_id ? (wp_get_attachment_image_url($icon_id, 'full') ?: $default_icon) : $default_icon;
?>

<div class="weekly-craft-featured" style="--weekly-craft-featured-bg: url('<?php echo esc_url($bg_url); ?>');">
  <?php if ($title): ?>
    <h2 class="weekly-craft-featured__title"><?php echo esc_html($title); ?></h2>
  <?php endif; ?>

  <?php if ($text): ?>
    <p class="weekly-craft-featured__text"><?php echo esc_html($text); ?></p>
  <?php endif; ?>

  <?php if (is_array($cta) && !empty($cta['url'])):
    $url    = $cta['url'];
    $label  = !empty($cta['title']) ? $cta['title'] : __('Instagram', 'projecttheme');
    $target = !empty($cta['target']) ? $cta['target'] : '_self';
    ?>
    <a class="weekly-craft-featured__button" href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>">
      <img class="weekly-craft-featured__button-icon" src="<?php echo esc_url($icon_url); ?>" alt="" width="16" height="16" loading="lazy" decoding="async">
      <span><?php echo esc_html($label); ?></span>
    </a>
  <?php endif; ?>
</div>
