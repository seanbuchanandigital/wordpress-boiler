<?php

/**
 * Accordion
 *
 */

// Create id attribute allowing for custom "anchor" value.
$class = getBlockClass('accordion-block', $block);
?>

<section class="<?= $class; ?>">
    <div class="uk-container uk-margin-auto uk-padding">
        <div class="uk-child-width-1-1" uk-grid>
            <div>
                <ul uk-accordion>
                    <?php
                    $i = 0;
                    if(have_rows('accordion')){
                        while(have_rows('accordion')){
                            the_row();
                            $title = get_sub_field('accordion_title');
                            $text  = get_sub_field('accordion_text');
                            ?>
                            <li class="<?php if($i == 0){ echo 'uk-open'; } ?>">
                                <a class="uk-accordion-title" href="#"><?= $title; ?></a>
                                <div class="uk-accordion-content">
                                    <?php accessibilityFormater($text); ?>
                                </div>
                            </li>
                            <?php
                            $i++;
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</section>
