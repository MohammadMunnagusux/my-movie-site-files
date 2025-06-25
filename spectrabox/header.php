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
        <div class="logo-section">
            <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="SpectraBox" class="logo">
        </div>
        
        <nav class="navigation">
            <ul class="nav-menu">
                <li><a href="<?php echo home_url(); ?>">Home</a></li>
                <li><a href="<?php echo home_url('/category/bangla-movies/'); ?>">Bangla Movies</a></li>
                <li><a href="<?php echo home_url('/category/hindi-movies/'); ?>">Hindi Movies</a></li>
                <li><a href="<?php echo home_url('/category/english-movies/'); ?>">English Movies</a></li>
                <li><a href="<?php echo home_url('/category/animated-movies/'); ?>">Animated Movies</a></li>
                <li><a href="<?php echo home_url('/category/series/'); ?>">Series</a></li>
                <li><a href="<?php echo home_url('/category/k-drama/'); ?>">K-Drama</a></li>
                <li><a href="<?php echo home_url('/category/c-drama/'); ?>">C-Drama</a></li>
                <li><a href="<?php echo home_url('/category/bangla-web-series/'); ?>">Bangla Web Series</a></li>
                <li><a href="<?php echo home_url('/category/anime-series/'); ?>">Anime Series</a></li>
            </ul>
        </nav>
        
        <div class="header-controls">
            <button class="search-icon" onclick="toggleSearch()">🔍</button>
            <button class="theme-toggle" onclick="toggleTheme()">🌙</button>
        </div>
    </div>
</header>

<script>
function toggleTheme() {
    const body = document.body;
    const button = document.querySelector('.theme-toggle');
    
    if (body.classList.contains('light-mode')) {
        body.classList.remove('light-mode');
        body.classList.add('dark-mode');
        button.textContent = '☀️';
        localStorage.setItem('theme', 'dark');
    } else {
        body.classList.remove('dark-mode');
        body.classList.add('light-mode');
        button.textContent = '🌙';
        localStorage.setItem('theme', 'light');
    }
}

// Load saved theme
document.addEventListener('DOMContentLoaded', function() {
    const savedTheme = localStorage.getItem('theme');
    const body = document.body;
    const button = document.querySelector('.theme-toggle');
    
    if (savedTheme === 'dark') {
        body.classList.remove('light-mode');
        body.classList.add('dark-mode');
        button.textContent = '☀️';
    }
});

function toggleSearch() {
    // Add search functionality here
    alert('Search functionality can be added here');
}
</script>