<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>
<?php 
// Get the background image URL from the ACF field

$background_image = get_field('background', 'option');
?>
<body <?php body_class(); ?> style="<?php echo $background_image ? 'background: url(' . esc_url($background_image) . '),  linear-gradient(180deg, #09103A 0%, #010411 100%); background-size: cover; background-repeat: no-repeat;' : ''; ?>">
    <header class="header">
        <nav class="header-inner container navbar navbar-expand-lg">
            <a class="header-logo" href="#home">
                <?php echo file_get_contents(get_template_directory() . '/assets/images/logo.svg'); ?>
            </a>
            <button class="navbar-toggler hamburger" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

            </button>
            <nav class="header-nav collapse navbar-collapse" id="navbarSupportedContent">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'main-menu', // Matches the location identifier in functions.php
                    'container' => 'div',              // Wrap the menu in a <div> (optional)
                    'container_class' => 'menu-container', // Add classes to the container
                    'menu_class' => 'menu navbar-nav me-auto mb-2 mb-lg-0', // Classes for the <ul> element
                    'fallback_cb' => false,            // Fallback if no menu is assigned
                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>', // Maintain structure
                    'depth' => 2,                      // Allow for dropdown menus (if you want nested menus)
                ));
                ?>
                <a class="button button-header d-block d-lg-none" href="#collab">
                    Let's Collaborate
                </a>
            </nav>
            <a class="button button-header d-none d-lg-block" href="#collab">
                Let's Collaborate
            </a>
    </header>