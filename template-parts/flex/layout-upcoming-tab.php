<?php
/**
 * Upcoming Tab
 * Felder: day, month, year, title, location, intro_text, details_text, image
 */

$day = get_sub_field('day') ?: '25.';
$month = get_sub_field('month') ?: 'November';
$year = get_sub_field('year') ?: '2026';
$title = get_sub_field('title') ?: __('Embroidery', 'projecttheme');
$location = get_sub_field('location') ?: 'Kunsthauscafe';
$intro = get_sub_field('intro_text') ?: '';
$details = get_sub_field('details_text') ?: '';
$image_id = (int) get_sub_field('image');

$default_image = get_template_directory_uri() . '/assets/images/upcoming-tab/embroidery-session.png';
$image_url = $image_id ? (wp_get_attachment_image_url($image_id, 'large') ?: $default_image) : $default_image;
?>

<article class="upcoming-tab">
  <div class="upcoming-tab__date">
    <?php if ($day): ?><p class="upcoming-tab__day"><?php echo esc_html($day); ?></p><?php endif; ?>
    <?php if ($month): ?><p class="upcoming-tab__month"><?php echo esc_html($month); ?></p><?php endif; ?>
    <?php if ($year): ?><p class="upcoming-tab__year"><?php echo esc_html($year); ?></p><?php endif; ?>
  </div>

  <div class="upcoming-tab__image-wrap">
    <img class="upcoming-tab__image" src="<?php echo esc_url($image_url); ?>" alt="" loading="lazy" decoding="async">
  </div>

  <div class="upcoming-tab__content">
    <?php if ($title): ?><h2 class="upcoming-tab__title"><?php echo esc_html($title); ?></h2><?php endif; ?>
    <?php if ($location): ?><p class="upcoming-tab__location"><?php echo esc_html($location); ?></p><?php endif; ?>

    <?php if ($intro): ?><div class="upcoming-tab__text rte"><?php echo wp_kses_post($intro); ?></div><?php endif; ?>
    <?php if ($details): ?><div class="upcoming-tab__text rte"><?php echo wp_kses_post($details); ?></div><?php endif; ?>
  </div>
</article>
