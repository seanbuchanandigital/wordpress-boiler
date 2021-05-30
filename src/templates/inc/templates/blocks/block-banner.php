<?php

/**
 * Banner
 *
 */

// Create id attribute allowing for custom "anchor" value.
$class = getBlockClass('banner-block', $block);

// ACF Fields
$image          = get_field('banner_image');
$overlay        = strtolower(get_field('banner_overlay'));
$defaultWidth   = strtolower(get_field('default_width', 'option'));
$defaultPadding = strtolower(get_field('default_padding', 'option'));
$width          = strtolower(get_field('banner_width'));
$text           = get_field('banner_text');
$textPosition   = strtolower(get_field('banner_text_position'));
?>

<section class="<?= $class; ?> ">
    <div class="uk-background-cover" style="background-image: url(<?= $image['url']; ?>);">
        <div class="banner-item__content <?php if($defaultWidth == 'default'){ echo 'uk-container'; }elseif($defaultWidth == 'large'){ echo 'uk-container-large'; }elseif($defaultWidth == 'extra large' ){ echo 'uk-container-xlarge'; }elseif($defaultWidth == 'expand'){ echo 'uk-container-expand'; } if($defaultPadding == 'default'){ echo 'uk-padding'; }elseif($defaultPadding == 'small'){ echo 'uk-padding-small'; } ?> uk-margin-auto">
            <div class="<?php if($width == 'default'){ echo 'uk-child-width-1-1'; }elseif($width == '1/2'){ echo 'uk-child-width-1-2'; }elseif($width == '1/3'){ echo 'uk-child-width-1-3'; } ?>" uk-grid>
                <div class="banner-item__text">
                    <?= $text; ?>
                </div>
            </div>
        </div>
        <?php
        if($overlay == 'yes'){
            echo '<div class="component-item__overlay"></div>';
        }
        ?>
    </div>
</section>
