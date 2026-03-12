<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="top-bar">
        <div class="container">
            <div class="top-bar-info">
                <span class="phone"><i class="icon-phone"></i> <?php echo esc_html(get_theme_mod('practice_phone', '(555) 123-4567')); ?></span>
                <span class="hours"><i class="icon-clock"></i> <?php echo esc_html(get_theme_mod('practice_hours', 'Mon-Fri: 9AM - 6PM')); ?></span>
            </div>
            <div class="top-bar-cta">
                <a href="<?php echo esc_url(home_url('/book-appointment')); ?>" class="btn-small">Book Appointment</a>
            </div>
        </div>
    </div>
    
    <nav class="main-navigation">
        <div class="container nav-container">
            <div class="site-branding">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="site-title">
                        <?php bloginfo('name'); ?>
                    </a>
                <?php endif; ?>
            </div>
            
            <button class="mobile-menu-toggle" aria-label="Toggle Menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
            
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_id'        => 'primary-menu',
                'container'      => false,
                'menu_class'     => 'nav-menu',
                'fallback_cb'    => false,
            ));
            ?>
        </div>
    </nav>
</header>
