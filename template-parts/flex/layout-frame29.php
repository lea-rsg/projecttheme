<?php
/**
 * Frame29 – Review Cards
 * Felder: reviews (repeater)
 */

$reviews = get_sub_field('reviews');

if (empty($reviews) || !is_array($reviews)) {
  return;
}
?>

<div class="frame29">
  <div class="frame29__grid">
    <?php foreach ($reviews as $review):
      $rating      = isset($review['rating']) ? max(0, min(5, (int) $review['rating'])) : 5;
      $title       = isset($review['review_title']) ? $review['review_title'] : '';
      $text        = isset($review['review_text']) ? $review['review_text'] : '';
      $author_name = isset($review['author_name']) ? $review['author_name'] : '';
      $review_date = isset($review['review_date']) ? $review['review_date'] : '';
      $avatar_id   = isset($review['avatar']) ? (int) $review['avatar'] : 0;
      ?>
      <article class="frame29__card">
        <div class="frame29__rating" aria-label="<?php echo esc_attr(sprintf(__('Bewertung: %d von 5', 'projecttheme'), $rating)); ?>">
          <?php for ($i = 1; $i <= 5; $i++): ?>
            <span class="frame29__star<?php echo $i <= $rating ? ' is-active' : ''; ?>" aria-hidden="true">
              <svg viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" role="img" focusable="false">
                <path d="M9.99997 1.66669L12.575 6.88335L18.3333 7.72502L14.1666 11.7834L15.15 17.5167L9.99997 14.8084L4.84997 17.5167L5.8333 11.7834L1.66664 7.72502L7.42497 6.88335L9.99997 1.66669Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </span>
          <?php endfor; ?>
        </div>

        <div class="frame29__body">
          <?php if ($title): ?>
            <h3 class="frame29__title"><?php echo esc_html($title); ?></h3>
          <?php endif; ?>

          <?php if ($text): ?>
            <p class="frame29__text"><?php echo esc_html($text); ?></p>
          <?php endif; ?>
        </div>

        <div class="frame29__author-block">
          <?php if ($avatar_id): ?>
            <div class="frame29__avatar">
              <?php echo wp_get_attachment_image($avatar_id, 'thumbnail', false, [
                'class'    => 'frame29__avatar-image',
                'loading'  => 'lazy',
                'decoding' => 'async',
                'alt'      => $author_name ? esc_attr($author_name) : '',
              ]); ?>
            </div>
          <?php endif; ?>

          <div class="frame29__meta">
            <?php if ($author_name): ?>
              <p class="frame29__name"><?php echo esc_html($author_name); ?></p>
            <?php endif; ?>
            <?php if ($review_date): ?>
              <p class="frame29__date"><?php echo esc_html($review_date); ?></p>
            <?php endif; ?>
          </div>
        </div>
      </article>
    <?php endforeach; ?>
  </div>
</div>
