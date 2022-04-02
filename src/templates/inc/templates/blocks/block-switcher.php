<?php

/**
 * Switcher
 *
 */

// Create id attribute allowing for custom "anchor" value.
$class = getBlockClass('switcher-block', $block);
?>

<section class="<?= $class; ?>">
    <div class="uk-container uk-margin-auto uk-padding">
        <div uk-grid>
            <div class="uk-child-1-4">
                <ul class="uk-tab-left" uk-tab="connect: #component-tab-left; animation: uk-animation-fade">
                    <?php
                    $i = 0;
                    if(have_rows('switcher')):
                        while(have_rows('switcher')):
                            if($i == 0):
                                $class = 'active';
                            endif;
                            the_row();
                            $title = get_sub_field('switcher_title');
                            ?><li role="switch"><a class="<?= $class; ?>" href=""><?= $title; ?></a></li><?php
                        endwhile;
                        $i++;
                    endif;
                    ?>
                </ul>
            </div>
            <div class="uk-child-3-4">
                <ul id="component-tab-left" class="uk-switcher">
                        <?php
                        if(have_rows('switcher')):
                            while(have_rows('switcher')):
                                the_row();
                                ?><li><?php require(__DIR__.'/block-accordion.php'); ?></li><?php
                            endwhile;
                        endif;
                        ?>
                </ul>
            </div>
        </div>
    </div>
</section>