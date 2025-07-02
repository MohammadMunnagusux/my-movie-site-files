<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class('light-mode'); ?>>

<header class="header">
    <div class="header-container">
        <!-- Logo Section - Left (Fixed Width) -->
        <div class="logo-section">
            <a href="<?php echo home_url(); ?>">
                <?php if (has_custom_logo()): ?>
                    <?php 
                    $custom_logo_id = get_theme_mod('custom_logo');
                    $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                    if ($logo) {
                        echo '<img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '" class="logo">';
                    }
                    ?>
                <?php elseif (file_exists(get_template_directory() . '/images/logo.png')): ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="SpectraBox" class="logo">
                <?php else: ?>
                    <span style="color: white; font-size: 1.2rem; font-weight: bold;">SpectraBox</span>
                <?php endif; ?>
            </a>
        </div>
        
        <!-- Desktop Navigation - Center (Flexible) -->
        <nav class="desktop-nav">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_class' => 'main-nav',
                'container' => false,
                'fallback_cb' => 'default_menu_fallback'
            ));
            ?>
        </nav>
        
        <!-- Header Controls - Right (Fixed Width) -->
        <div class="header-controls">
            <button class="header-btn search-btn" onclick="toggleSearch()" title="Search">
                <i class="fas fa-search"></i>
            </button>
            <button class="header-btn theme-toggle" onclick="toggleTheme()" title="Toggle Theme">
                <i class="fas fa-moon"></i>
            </button>
            <button class="header-btn hamburger-btn" onclick="toggleMobileMenu()" title="Menu">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </div>
</header>

<!-- Search Modal -->
<div class="search-modal" id="searchModal">
    <div class="search-container">
        <h3>Search Movies & Series</h3>
        <form role="search" method="get" action="<?php echo home_url('/'); ?>">
            <input type="search" name="s" placeholder="Enter movie or series name..." value="<?php echo get_search_query(); ?>" required>
            <button type="submit"><i class="fas fa-search"></i> Search</button>
            <button type="button" onclick="toggleSearch()">Cancel</button>
        </form>
    </div>
</div>

<!-- Mobile Menu -->
<div class="mobile-menu-overlay" id="mobileMenuOverlay" onclick="toggleMobileMenu()"></div>
<div class="mobile-menu" id="mobileMenu">
    <button class="mobile-menu-close" onclick="toggleMobileMenu()">
        <i class="fas fa-times"></i>
    </button>
    <nav>
        <?php
        wp_nav_menu(array(
            'theme_location' => 'mobile',
            'menu_class' => 'mobile-nav',
            'container' => false,
            'fallback_cb' => 'mobile_menu_fallback'
        ));
        ?>
    </nav>
</div>

<script>
// Theme Toggle
function toggleTheme() {
    const body = document.body;
    const button = document.querySelector('.theme-toggle i');
    
    if (body.classList.contains('light-mode')) {
        body.classList.remove('light-mode');
        body.classList.add('dark-mode');
        button.className = 'fas fa-sun';
        localStorage.setItem('theme', 'dark');
    } else {
        body.classList.remove('dark-mode');
        body.classList.add('light-mode');
        button.className = 'fas fa-moon';
        localStorage.setItem('theme', 'light');
    }
}

// Load saved theme
document.addEventListener('DOMContentLoaded', function() {
    const savedTheme = localStorage.getItem('theme');
    const body = document.body;
    const button = document.querySelector('.theme-toggle i');
    
    if (savedTheme === 'dark') {
        body.classList.remove('light-mode');
        body.classList.add('dark-mode');
        button.className = 'fas fa-sun';
    }
});

// Search Modal
function toggleSearch() {
    const modal = document.getElementById('searchModal');
    modal.classList.toggle('active');
    if (modal.classList.contains('active')) {
        modal.querySelector('input').focus();
    }
}

// Mobile Menu
function toggleMobileMenu() {
    const menu = document.getElementById('mobileMenu');
    const overlay = document.getElementById('mobileMenuOverlay');
    
    menu.classList.toggle('active');
    overlay.classList.toggle('active');
}

// Close modals on Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        document.getElementById('searchModal').classList.remove('active');
        document.getElementById('mobileMenu').classList.remove('active');
        document.getElementById('mobileMenuOverlay').classList.remove('active');
    }
});
</script>

<?php
// Default menu fallback for desktop
function default_menu_fallback() {
    echo '<ul class="main-nav">';
    echo '<li><a href="' . home_url() . '">Home</a></li>';
    echo '<li><a href="https://18plus.spectrabox.xyz" target="_blank">18+ Movies</a></li>';
    echo '<li><a href="https://anime.spectrabox.xyz" target="_blank">Watch Anime</a></li>';
    echo '</ul>';
}

// Default menu fallback for mobile
function mobile_menu_fallback() {
    echo '<ul class="mobile-nav">';
    echo '<li><a href="' . home_url() . '">Home</a></li>';
    echo '<li><a href="https://18plus.spectrabox.xyz" target="_blank">18+ Movies</a></li>';
    echo '<li><a href="https://anime.spectrabox.xyz" target="_blank">Watch Anime</a></li>';
    echo '</ul>';
}
?>
