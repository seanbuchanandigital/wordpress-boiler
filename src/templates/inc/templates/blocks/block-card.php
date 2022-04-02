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
        if($heading): ?>
            <div class="section-heading">
                <h2 role="heading" aria-level="2"><?= $heading; ?></h2>
            </div>
            <?php endif; ?>
        <div class="uk-child-width-1-<?= $count; ?>@m" uk-grid>
            <?php
            if(have_rows('cards')):
                while(have_rows('cards')):
                    the_row();
                    $image  = get_sub_field('card_image');
                    $text   = get_sub_field('card_text');
                    ?>
                    <div>
                        <?php require(__DIR__.'/../components/component-card.php') ?>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
