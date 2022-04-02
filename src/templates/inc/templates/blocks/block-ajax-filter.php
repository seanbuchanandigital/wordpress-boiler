<?php

/**
 * AJAX-Filter
 *
 */

// Create id attribute allowing for custom "anchor" value.
$class      = getBlockClass('ajax-filter-block', $block);
?>
<section class="<?= $class; ?>">
    <div class="uk-container uk-margin-auto uk-padding-remove-vertical">
        <div class="uk-child-1-1">
            <div>
                <h1>AJAX Filter</h1>
            </div>
            <div>
                <div class="ajax-post-type" data-post-type="project" data-taxonomy="categories" data-posts-per-page="5"></div>
            </div>
        </div>
    </div>
</section>