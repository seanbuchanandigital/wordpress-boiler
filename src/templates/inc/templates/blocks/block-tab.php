<?php

/**
 * Tab
 *
 */

// Create id attribute allowing for custom "anchor" value.
$class = getBlockClass('banner-block', $block);

// ACF Fields
$image          = get_field('banner_image');
$text           = get_field('banner_text');
?>

<section class="<?= $class; ?>">
</section>
