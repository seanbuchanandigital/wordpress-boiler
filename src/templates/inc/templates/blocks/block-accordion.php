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
                <ul role="list" uk-accordion>
                    <?php
                    $i = 0;
                    if(have_rows('accordion')):
                        while(have_rows('accordion')):
                            the_row();
                            $title = get_sub_field('accordion_title');
                            $text  = get_sub_field('accordion_text');
                            require(__DIR__.'/../components/component-accordion.php');
                            $i++;
                        endwhile;
                    endif;
                    ?>
                </ul>
            </div>
        </div>
    </div>
</section>
