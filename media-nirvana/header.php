<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header" id="masthead">
    <div class="header-container">
        <div class="site-branding">
            <?php if (has_custom_logo()): ?>
                <?php the_custom_logo(); ?>
            <?php else: ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="site-title">
                    <?php bloginfo('name'); ?>
                </a>
            <?php endif; ?>
        </div>

        <nav class="main-navigation" id="site-navigation">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_class' => 'nav-menu',
                'container' => false,
                'fallback_cb' => 'mn_fallback_menu',
            ));

            function mn_fallback_menu() {
                echo '<ul class="nav-menu">';
                echo '<li><a href="' . esc_url(home_url('/')) . '">Home</a></li>';
                echo '<li><a href="' . esc_url(home_url('/about')) . '">About</a></li>';
                echo '<li><a href="' . esc_url(home_url('/services')) . '">Services</a></li>';
                echo '<li><a href="' . esc_url(home_url('/case-studies')) . '">Case Studies</a></li>';
                echo '<li><a href="' . esc_url(home_url('/contact')) . '">Contact</a></li>';
                echo '</ul>';
            }
            ?>
            <button class="theme-toggle" id="theme-toggle" aria-label="Toggle theme">
                <svg class="moon-icon" width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                </svg>
                <svg class="sun-icon" width="20" height="20" fill="currentColor" viewBox="0 0 24 24" style="display:none;">
                    <circle cx="12" cy="12" r="5"></circle>
                    <line x1="12" y1="1" x2="12" y2="3"></line>
                    <line x1="12" y1="21" x2="12" y2="23"></line>
                    <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                    <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                    <line x1="1" y1="12" x2="3" y2="12"></line>
                    <line x1="21" y1="12" x2="23" y2="12"></line>
                    <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                    <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                </svg>
            </button>
            <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn-cta-header">
                <?php _e('Book Strategy Call', 'media-nirvana'); ?>
            </a>
        </nav>

        <button class="mobile-menu-toggle" id="mobile-menu-toggle" aria-label="Toggle menu">
            <span class="menu-icon"></span>
        </button>
    </div>
</header>