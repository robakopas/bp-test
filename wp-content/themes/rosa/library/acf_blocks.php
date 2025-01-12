<?php 

function icepick_setup() {
    add_theme_support('editor-styles');

    add_editor_style('https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css');
    add_editor_style('library/css/style.css');
}
add_action( 'after_setup_theme', 'icepick_setup' );

function custom_category( $categories, $post ) {
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'custom',
                'title' => __( 'Custom', 'custom' ),
            ),
        ),
    );
}
add_filter( 'block_categories', 'custom_category', 10, 2);

function my_acf_block_render_callback ( $block ) {

    $slug = str_replace('acf/', '', $block['name']);

    if( file_exists ( get_theme_file_path("/template-parts/block/{$slug}.php") ) ) {
        include( get_theme_file_path("/template-parts/block/{$slug}.php") );
    }
}
add_action('acf/init', 'my_acf_init');

function my_acf_init() {

    if( function_exists('acf_register_block') ) {
        acf_register_block(array(
            'name' => 'block-rosa-tasks',
            'title' => __('RoSa Tasks'),
            'description' => __('Tasks for player EXP.'),
            'render_callback' => 'my_acf_block_render_callback',
            'category' => 'custom',
            'icon' => 'slides',
            'keywords' => array( 'rosa', 'tasks' ),
            )
        );
    }
}

?>