<?php

/**
 * Filter
 *
 */

// Create id attribute allowing for custom "anchor" value.
$class      = getBlockClass('filter-block', $block);
$posts   = get_field('filter_post_type');
?>
<section class="<?= $class; ?>">
    <div class="uk-container uk-margin-auto uk-padding-remove-vertical">
        <div class="uk-child-1-1">
            <div>
                <div uk-filter="target: .js-filter">
                    <ul role="list" class="uk-subnav uk-subnav-pill">
                        <li role="listitem" class="uk-active" uk-filter-control><a role="button" href="#">All</a></li>
                        <?php
                        $categories = get_categories();
                        foreach($categories as $category):
                            echo '<li role="listitem" uk-filter-control=".' . $category->slug . '"><a role="button" href="#">' . $category->name . '</a></li>';
                        endforeach;
                        ?>
                    </ul>
                    <ul role="list" class="js-filter uk-child-width-1-2 uk-child-width-1-3@m uk-text-center" uk-grid>
                        <?php
                        foreach($posts as $post):
                            setup_postdata($post);
                            $image          = get_the_post_thumbnail($post->ID, array('title' => get_the_title()));
                            $text           = get_the_title($post->ID);
                            $categoryID     = wp_get_post_categories($post->ID);
                            $categoryName   = get_category($categoryID[0]);
                            $className      = $categoryName->slug;
                            ?>
                            <?php
                            echo '<li role="listitem" class="' . $className . '">';
                            require(__DIR__.'/../components/component-card.php');
                            echo '</li>';
                        endforeach;
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>