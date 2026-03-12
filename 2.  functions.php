<?php
/**
 * Optometrist Pro Theme Functions
 */

// Theme Setup
function optometrist_setup() {
    // Add theme supports
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Register Navigation Menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'optometrist-pro'),
        'footer'  => __('Footer Menu', 'optometrist-pro'),
    ));

    // Register Custom Post Type for Services
    register_post_type('eye_services', array(
        'labels' => array(
            'name'          => __('Eye Care Services', 'optometrist-pro'),
            'singular_name' => __('Service', 'optometrist-pro'),
        ),
        'public'        => true,
        'has_archive'     => true,
        'supports'        => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon'       => 'dashicons-visibility',
        'rewrite'         => array('slug' => 'services'),
    ));

    // Register Sidebar for Contact Info
    register_sidebar(array(
        'name'          => __('Contact Sidebar', 'optometrist-pro'),
        'id'            => 'contact-sidebar',
        'description'   => __('Add contact widgets here', 'optometrist-pro'),
        'before_widget' => '<div class="widget-contact">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('after_setup_theme', 'optometrist_setup');

// Enqueue Scripts and Styles
function optometrist_scripts() {
    // Google Fonts
    wp_enqueue_style('optometrist-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600&display=swap', array(), null);
    
    // Main Stylesheet
    wp_enqueue_style('optometrist-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Custom CSS
    wp_enqueue_style('optometrist-main', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0.0');
    
    // JavaScript
    wp_enqueue_script('optometrist-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true);
    
    // Smooth Scroll
    wp_enqueue_script('optometrist-smooth-scroll', get_template_directory_uri() . '/assets/js/smooth-scroll.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'optometrist_scripts');

// Customizer Settings for Optometrist Info
function optometrist_customize_register($wp_customize) {
    // Section for Practice Info
    $wp_customize->add_section('optometrist_info', array(
        'title'    => __('Practice Information', 'optometrist-pro'),
        'priority' => 30,
    ));

    // Phone Number
    $wp_customize->add_setting('practice_phone', array('default' => '(555) 123-4567'));
    $wp_customize->add_control('practice_phone', array(
        'label'   => __('Phone Number', 'optometrist-pro'),
        'section' => 'optometrist_info',
        'type'    => 'text',
    ));

    // Address
    $wp_customize->add_setting('practice_address', array('default' => '123 Vision Street, Eye City, ST 12345'));
    $wp_customize->add_control('practice_address', array(
        'label'   => __('Address', 'optometrist-pro'),
        'section' => 'optometrist_info',
        'type'    => 'textarea',
    ));

    // Business Hours
    $wp_customize->add_setting('practice_hours', array('default' => 'Mon-Fri: 9AM - 6PM | Sat: 9AM - 2PM'));
    $wp_customize->add_control('practice_hours', array(
        'label'   => __('Business Hours', 'optometrist-pro'),
        'section' => 'optometrist_info',
        'type'    => 'text',
    ));

    // Hero Section
    $wp_customize->add_section('hero_section', array(
        'title'    => __('Hero Section', 'optometrist-pro'),
        'priority' => 40,
    ));

    $wp_customize->add_setting('hero_title', array('default' => 'Clear Vision for Life'));
    $wp_customize->add_control('hero_title', array(
        'label'   => __('Hero Title', 'optometrist-pro'),
        'section' => 'hero_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('hero_subtitle', array('default' => 'Expert eye care for your entire family'));
    $wp_customize->add_control('hero_subtitle', array(
        'label'   => __('Hero Subtitle', 'optometrist-pro'),
        'section' => 'hero_section',
        'type'    => 'textarea',
    ));
}
add_action('customize_register', 'optometrist_customize_register');
