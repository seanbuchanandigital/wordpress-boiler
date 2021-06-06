<?php

/**
 * Parallax
 *
 */

// Create id attribute allowing for custom "anchor" value.
$class = getBlockClass('parallax-block', $block);

// ACF Fields
$image          = get_field('parallax_image');
$text           = get_field('parallax_text');
?>

<section class="<?= $class; ?>">
    <div role="img" aria-label="<?= $image['alt']; ?>" class="uk-background-cover" uk-parallax="bgy: -200" style="background-image: url(<?= $image['url']; ?>);">
        <div class="parallax-item__content uk-container uk-margin-auto uk-padding">
            <div class="uk-child-width-1-1" uk-grid>
                <div>
                    <div class="parallax-item__text">
                        <?= accessibilityFormater($text); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php require(__DIR__ . '/../components/overlay.php'); ?>
    </div>
</section>
