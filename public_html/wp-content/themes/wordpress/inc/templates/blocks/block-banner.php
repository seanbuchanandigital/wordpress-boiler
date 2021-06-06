<?php

/**
 * Banner
 *
 */

// Create id attribute allowing for custom "anchor" value.
$class = getBlockClass('banner-block', $block);

// ACF Fields
$image          = get_field('banner_image');
$text           = get_field('banner_text');
?>

<section class="<?= $class; ?>">
    <div role="img" aria-label="<?= $image['alt']; ?>" class="uk-background-cover" style="background-image: url(<?= $image['url']; ?>);">
        <div class="banner-item__content uk-container uk-margin-auto uk-padding">
            <div class="uk-child-width-1-1" uk-grid>
                <div class="banner-item__text">
                    <?= accessibilityFormater($text); ?>
                </div>
            </div>
        </div>
        <?php require(__DIR__ . '/../components/overlay.php'); ?>
    </div>
</section>
