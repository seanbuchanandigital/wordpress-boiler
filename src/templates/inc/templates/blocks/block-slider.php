<?php

/**
 * Slider
 *
 */

// Create id attribute allowing for custom "anchor" value.
$class = getBlockClass('slider-block', $block);
?>

<section class="<?= $class; ?>">
    <div uk-slider="center: true">
        <ul class="uk-slider-items uk-child-width-1-1">
            <?php
            if(have_rows('slider_slides')):
                while(have_rows('slider_slides')):
                    the_row();
                    // ACF Fields
                    $image          = get_sub_field('slide_image');
                    $text           = get_sub_field('slide_text');
                    ?>
                    <li>
                        <div role="img" aria-label="<?= $image['alt']; ?>" class="uk-background-cover" style="background-image: url(<?= $image['url']; ?>);">
                            <div class="slider-item__content uk-container uk-padding">
                                <div class="uk-child-width-1-1" uk-grid>
                                    <div>
                                        <div class="slider-item__text">
                                            <?= accessibilityFormater($text); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php require(__DIR__ . '/../components/overlay.php'); ?>
                    </li>
                <?php endwhile; ?>
            <?php endif; ?>
        </ul>
        <div class="slider-item__dotnav uk-position-absolute uk-position-bottom-center">
            <div class="uk-container uk-margin-auto">
                <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>
            </div>
        </div>
        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
    </div>
</section>
