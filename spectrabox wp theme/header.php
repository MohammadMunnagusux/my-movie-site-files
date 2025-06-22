<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="spectra-header">
    <div class="header-container">
        <!-- Logo -->
        <a href="<?php echo home_url(); ?>" class="spectra-logo">
            <div class="logo-icon">✨</div>
            <div class="logo-text">
                <h1>SpectraBox</h1>
                <p>PREMIUM DOWNLOADS</p>
            </div>
        </a>

        <!-- Navigation -->
        <nav>
            <ul class="nav-menu">
                <li class="nav-item <?php echo (is_home() || is_front_page()) ? 'current-menu-item' : ''; ?>">
                    <a href="<?php echo home_url(); ?>">
                        🏠 All
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo home_url('/movies'); ?>">
                        🎬 Movies
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo home_url('/series'); ?>">
                        📺 Series
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo home_url('/4k'); ?>">
                        👑 4K UHD
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo home_url('/trending'); ?>">
                        📈 Trending
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Search -->
        <div class="search-container">
            <div class="search-box">
                <span class="search-icon">🔍</span>
                <form method="get" action="<?php echo home_url(); ?>">
                    <input type="text" name="s" class="search-input" placeholder="Search movies, series..." value="<?php echo get_search_query(); ?>">
                </form>
            </div>
            <a href="#" class="spectra-btn btn-primary">
                🔧 Filter
            </a>
        </div>
    </div>
</header>
