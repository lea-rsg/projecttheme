<?php
/**
 * Weekly Craft teaser
 * Felder: title, text, cta, background_image (optional)
 */

$title = get_sub_field('title') ?: __('Our weekly craft', 'projecttheme');
$text  = get_sub_field('text') ?: __('Join our weekly crafting sessions or get recommendations and craft at home!', 'projecttheme');
$cta   = get_sub_field('cta');
$bg_id = (int) get_sub_field('background_image');

$default_bg = get_template_directory_uri() . '/assets/images/weekly-craft-cloud.png';

if ($bg_id) {
  $bg_url = wp_get_attachment_image_url($bg_id, 'full') ?: $default_bg;
} else {
  $bg_url = $default_bg;
}
?>

<div class="weekly-craft" style="--weekly-craft-bg: url('<?php echo esc_url($bg_url); ?>');">
  <?php if ($title): ?>
    <h2 class="weekly-craft__title"><?php echo esc_html($title); ?></h2>
  <?php endif; ?>

  <?php if ($text): ?>
    <p class="weekly-craft__text"><?php echo esc_html($text); ?></p>
  <?php endif; ?>

  <?php if (is_array($cta) && !empty($cta['url'])):
    $url    = $cta['url'];
    $label  = !empty($cta['title']) ? $cta['title'] : __('get infos', 'projecttheme');
    $target = !empty($cta['target']) ? $cta['target'] : '_self';
    ?>
    <a class="weekly-craft__button" href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>">
      <?php echo esc_html($label); ?>
    </a>
  <?php endif; ?>
</div>
