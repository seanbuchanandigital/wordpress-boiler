<?php

/**
 * Card
 *
 */

// Create id attribute allowing for custom "anchor" value.
$class      = getBlockClass('card-block', $block);
$count      = count(get_field('cards'));
$heading    = get_field('cards_heading');
?>

<section class="<?= $class; ?>">
    <div class="uk-container uk-margin-auto uk-padding uk-padding-remove-vertical">
        <?php
        if($heading){
            ?>
            <div class="section-heading">
                <h2><?= $heading; ?></h2>
            </div>
            <?php
        }
        ?>
        <div class="uk-child-width-1-<?= $count; ?>" uk-grid>
            <?php
            if(have_rows('cards')){
                while(have_rows('cards')){
                    the_row();
                    $image  = get_sub_field('card_image');
                    $text   = get_sub_field('card_text');
                    ?>
                    <div>
                        <div class="uk-card uk-card-default">
                            <div class="uk-child-width-1-1 uk-grid-collapse" uk-grid>
                                <div>
                                    <div class="card-item__image">
                                        <img role="img" aria-label="<?= $image['alt']; ?>" src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>">
                                    </div>
                                </div>
                                <div>
                                    <div class="card-item__text uk-padding">
                                        <?= accessibilityFormater($text); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</section>
