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
    <div class="uk-container uk-margin-auto uk-padding">
        <div uk-grid>
            <div class="uk-child-1-4">
                <ul class="uk-tab-left" uk-tab>
                    <?php
                    $i = 0;
                    if(have_rows('tabs')){
                        while(have_rows('tabs')){
                            if($i == 0){
                                $class = 'active';
                            }
                            the_row();
                            $title = get_sub_field('tab_title');
                            ?><li><a class="<?= $class; ?>" href=""><?= $title; ?></a></li><?php
                        }
                        $i++;
                    }
                    ?>
                </ul>
            </div>
            <div class="uk-child-3-4">
                <?php
                if(have_rows('tabs')){
                    while(have_rows('tabs')){
                        the_row();
                        require(__DIR__ . '/block-accordion.php');
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>
