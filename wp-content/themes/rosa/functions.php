<?php

function load_styles()
{
    wp_register_style('carousel-css', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css', [], 1, 'all');
	wp_enqueue_style('carousel-css');

	wp_register_style('bootstrap-css', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css', [], 1, 'all');
	wp_enqueue_style('bootstrap-css');

	wp_register_style('font-awesome-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css', [], 1, 'all');
	wp_enqueue_style('font-awesome-css');
	
	wp_register_style('style', get_template_directory_uri() . '/assets/css/style.css', [], 1, 'all');
	wp_enqueue_style('style');
	
	wp_register_style('responsive', get_template_directory_uri() . '/assets/css/responsive.css', [], 1, 'all');
	wp_enqueue_style('responsive');

	wp_register_style('player-css', get_template_directory_uri() . '/assets/css/partials/player.css', [], 1, 'all');
	wp_enqueue_style('player-css');
}
add_action('wp_enqueue_scripts', 'load_styles');

function load_js()
{
	wp_deregister_script('jquery');
	wp_register_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js', [], 1, 1, 1);
	wp_enqueue_script('jquery');

    wp_register_script('carousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', [], 1, 1, 1);
	wp_enqueue_script('carousel');
   
	wp_register_script('bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js', [], 1, 1, 1);
	wp_enqueue_script('bootstrap');

	wp_register_script('main', get_template_directory_uri() . '/assets/js/main.js', [], 1, 1, 1);
	wp_enqueue_script('main');
}
add_action('wp_enqueue_scripts', 'load_js');

//Theme Option
add_theme_support('menus');

//Menu
function my_theme_register_menus() {
    register_nav_menus(array(
        'main-menu' => __('Main Menu', 'my-theme'),
    ));
}
add_action('init', 'my_theme_register_menus');

function register_rosa_block($name, $title, $description, $directory) {

    acf_register_block_type(array(
        'name'              => $name,
        'title'             => $title,
        'description'       => $description,
        'render_template'   => get_template_directory() . "/template-parts/blocks/".$directory."/block.php",
        'category'          => 'formatting',
        'icon'              => 'admin-customizer',
        'keywords'          => array( 'custom', 'acf' ),
        'enqueue_style'     => get_template_directory_uri() . "/template-parts/blocks/".$directory."/block.css",
        'enqueue_script'    => get_template_directory_uri() . "/template-parts/blocks/".$directory."/block.js",
        
    ));
}

add_action('acf/init', function() {
    if( function_exists('acf_register_block_type') ) {

        register_rosa_block('rosa-tasks', 'Rosa Tasks', 'A custom block created with ACF.', 'rosa-tasks');
        register_rosa_block('rosa-card', 'Rosa Card', 'A custom block created with ACF.', 'rosa-card');
        register_rosa_block('rosa-carousel-l', 'Rosa Carousel Large', 'A custom block created with ACF.', 'rosa-carousel-l');
        register_rosa_block('rosa-carousel-s', 'Rosa Carousel Small', 'A custom block created with ACF.', 'rosa-carousel-s');
    }
});


