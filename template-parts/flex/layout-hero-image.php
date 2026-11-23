<?php
/**
 * Hero Image
 * Felder: image, title, subtitle, cta
 */

$image_id = (int) get_sub_field('image');
$title    = get_sub_field('title') ?: __('Craft Club Graz', 'projecttheme');
$subtitle = get_sub_field('subtitle') ?: __('Join the Community and Explore your Next Favourite Hobby', 'projecttheme');
$cta      = get_sub_field('cta');

$default_image = get_template_directory_uri() . '/assets/images/hero/hero-image.png';
$image_url = $image_id ? (wp_get_attachment_image_url($image_id, 'full') ?: $default_image) : $default_image;
?>

<div class="hero-image" style="--hero-image-bg: url('<?php echo esc_url($image_url); ?>');">
  <div class="hero-image__content">
    <?php if ($title): ?>
      <h1 class="hero-image__title"><?php echo esc_html($title); ?></h1>
    <?php endif; ?>

    <?php if ($subtitle): ?>
      <p class="hero-image__subtitle"><?php echo esc_html($subtitle); ?></p>
    <?php endif; ?>

    <?php if (is_array($cta) && !empty($cta['url'])):
      $url    = $cta['url'];
      $label  = !empty($cta['title']) ? $cta['title'] : __('sign up', 'projecttheme');
      $target = !empty($cta['target']) ? $cta['target'] : '_self';
      ?>
      <a class="hero-image__button" href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>">
        <?php echo esc_html($label); ?>
      </a>
    <?php endif; ?>
  </div>
</div>
