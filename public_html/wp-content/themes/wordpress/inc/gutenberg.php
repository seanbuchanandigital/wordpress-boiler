<?php

define('coreBlocks', serialize( array(
    'core/paragraph',
    'core/heading',
    'core/list',
    'core/quote',
    'core/pullquote',
    'core/table',
    'core/image',
    'core/gallery',
    'core/file',
    'core/buttons',
    'core/media-text',
    'core/shortcode',
    'core/html',
    'core/group',
    'gravityforms/form',
    'acf/banner',
    'acf/slider',
    'acf/parallax',
    'acf/card',
    'acf/switcher',
    'acf/accordion',
    'acf/filter',
    'acf/ajax-filter'
)));

/**
 * Define allowed block types in editor.
 */
add_filter( 'allowed_block_types_all', 'theme_allowed_block_types' );
function theme_allowed_block_types( $allowed_blocks ) {
    return unserialize(coreBlocks);
}
/**
 * Define allowed block patterns in editor.
 */
// Disable core block patterns
add_action( 'init', 'remove_core_block_patterns' );
function remove_core_block_patterns() {
    $core_block_patterns = array(
//        'core/text-two-columns',
//        'core/two-buttons',
//        'core/two-images',
//        'core/text-two-columns-with-images',
//        'core/text-three-columns-buttons',
//        'core/large-header',
//        'core/large-header-button',
//        'core/three-buttons',
//        'core/heading-paragraph',
//        'core/quote'
    );
    foreach ( $core_block_patterns as $core_block_pattern ) {
        unregister_block_pattern($core_block_pattern);
    }
}
/**
 * Load Gutenberg editor stylesheet
 **/
add_action( 'after_setup_theme', 'uikit_starter_editor_styles' );
function uikit_starter_editor_styles(){
    add_theme_support( 'editor-styles' ); // if you don't add this line, your stylesheet won't be added
    add_editor_style( 'style-editor.css' ); // tries to include style-editor.css directly from your theme folder
}

add_editor_style( 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap' );

function wrap_block( $block_content, $block ) {
    if (in_array($block['blockName'], unserialize(coreBlocks))) {
        $block_content = '<section class="block-html">' . $block_content . '</section>';
    }
    return $block_content;
};

add_filter( 'render_block', 'wrap_block', 10, 2 );

function wordpress_block_category( $categories, $post ) {
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'wordpress-blocks',
                'title' => __( 'WordPress Blocks', 'wordpress-blocks' ),
            ),
        )
    );
}
add_filter( 'block_categories_all', 'wordpress_block_category', 10, 2);

// Registering blocks
add_action('acf/init', function () {

    // Check function exists.
    if (function_exists('acf_register_block_type')) {

        // register a banner block
        registerGutenbergBlocks('wordpress-blocks', 'Banner', 'format-image');

        // register a slider block
        registerGutenbergBlocks('wordpress-blocks', 'Slider', 'slides');

        // register a parallax block
        registerGutenbergBlocks('wordpress-blocks', 'Parallax', 'images-alt');

        // register a card block
        registerGutenbergBlocks('wordpress-blocks', 'Card', 'format-aside');

        // register a tab block
        registerGutenbergBlocks('wordpress-blocks', 'Switcher', 'category');

        // register a accordion block
        registerGutenbergBlocks('wordpress-blocks', 'Accordion', 'excerpt-view');

        // register a filter block
        registerGutenbergBlocks('wordpress-blocks', 'Filter', 'excerpt-view');

        // register a ajax filter block
        registerGutenbergBlocks('wordpress-blocks', 'AJAX-Filter', 'excerpt-view');
    }

});