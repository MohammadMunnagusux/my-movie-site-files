<?php
// Theme setup
function spectrabox_setup() {
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => 'Primary Menu',
        'footer' => 'Footer Menu'
    ));
    
    // Set content width
    if (!isset($content_width)) {
        $content_width = 1200;
    }
}
add_action('after_setup_theme', 'spectrabox_setup');

// Enqueue styles and scripts
function spectrabox_scripts() {
    wp_enqueue_style('spectrabox-style', get_stylesheet_uri(), array(), '1.0.0');
    wp_enqueue_style('spectrabox-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap', array(), null);
    wp_enqueue_script('spectrabox-script', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0.0', true);
    wp_localize_script('spectrabox-script', 'spectrabox_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('spectrabox_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'spectrabox_scripts');

// Create Movie Custom Post Type
function create_movie_post_type() {
    $labels = array(
        'name' => 'Movies',
        'singular_name' => 'Movie',
        'menu_name' => 'Movies',
        'add_new' => 'Add New Movie',
        'add_new_item' => 'Add New Movie',
        'edit_item' => 'Edit Movie',
        'new_item' => 'New Movie',
        'view_item' => 'View Movie',
        'search_items' => 'Search Movies',
        'not_found' => 'No movies found',
        'not_found_in_trash' => 'No movies found in Trash'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'movie'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-video-alt3',
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields', 'excerpt'),
        'show_in_rest' => true
    );

    register_post_type('movie', $args);
}
add_action('init', 'create_movie_post_type');

// Create Series Custom Post Type
function create_series_post_type() {
    $labels = array(
        'name' => 'TV Series',
        'singular_name' => 'Series',
        'menu_name' => 'TV Series',
        'add_new' => 'Add New Series',
        'add_new_item' => 'Add New Series',
        'edit_item' => 'Edit Series',
        'new_item' => 'New Series',
        'view_item' => 'View Series',
        'search_items' => 'Search Series',
        'not_found' => 'No series found',
        'not_found_in_trash' => 'No series found in Trash'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'series'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 6,
        'menu_icon' => 'dashicons-playlist-video',
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields', 'excerpt'),
        'show_in_rest' => true
    );

    register_post_type('series', $args);
}
add_action('init', 'create_series_post_type');

// Add custom meta boxes
function spectrabox_add_meta_boxes() {
    add_meta_box(
        'movie_details',
        'Movie/Series Details',
        'movie_details_callback',
        array('movie', 'series'),
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'spectrabox_add_meta_boxes');

// Meta box callback function
function movie_details_callback($post) {
    wp_nonce_field('save_movie_details', 'movie_details_nonce');
    
    // Get current values
    $rating = get_post_meta($post->ID, '_movie_rating', true);
    $year = get_post_meta($post->ID, '_movie_year', true);
    $quality = get_post_meta($post->ID, '_movie_quality', true);
    $audio = get_post_meta($post->ID, '_movie_audio', true);
    $file_size = get_post_meta($post->ID, '_movie_size', true);
    $genre = get_post_meta($post->ID, '_movie_genre', true);
    $views = get_post_meta($post->ID, '_movie_views', true);
    $download_links = get_post_meta($post->ID, '_download_links', true);
    ?>
    
    <style>
        .spectrabox-meta-table { width: 100%; border-collapse: collapse; }
        .spectrabox-meta-table th { text-align: left; padding: 10px; background: #f9f9f9; width: 150px; }
        .spectrabox-meta-table td { padding: 10px; }
        .spectrabox-meta-table input, .spectrabox-meta-table textarea { width: 100%; padding: 8px; }
        .spectrabox-meta-table textarea { height: 80px; }
    </style>
    
    <table class="spectrabox-meta-table">
        <tr>
            <th><label for="movie_rating">Rating (1-10)</label></th>
            <td><input type="number" step="0.1" min="1" max="10" id="movie_rating" name="movie_rating" value="<?php echo esc_attr($rating); ?>" placeholder="7.5" /></td>
        </tr>
        <tr>
            <th><label for="movie_year">Release Year</label></th>
            <td><input type="text" id="movie_year" name="movie_year" value="<?php echo esc_attr($year); ?>" placeholder="2025 or 2013-2022" /></td>
        </tr>
        <tr>
            <th><label for="movie_quality">Available Quality</label></th>
            <td><input type="text" id="movie_quality" name="movie_quality" value="<?php echo esc_attr($quality); ?>" placeholder="4K UHD, 1080p, 720p" /></td>
        </tr>
        <tr>
            <th><label for="movie_audio">Audio Languages</label></th>
            <td><input type="text" id="movie_audio" name="movie_audio" value="<?php echo esc_attr($audio); ?>" placeholder="Hindi, English, Tamil, Telugu" /></td>
        </tr>
        <tr>
            <th><label for="movie_size">File Size</label></th>
            <td><input type="text" id="movie_size" name="movie_size" value="<?php echo esc_attr($file_size); ?>" placeholder="3.2GB or 15.2GB" /></td>
        </tr>
        <tr>
            <th><label for="movie_genre">Genres</label></th>
            <td><input type="text" id="movie_genre" name="movie_genre" value="<?php echo esc_attr($genre); ?>" placeholder="Action, Comedy, Horror, Thriller" /></td>
        </tr>
        <tr>
            <th><label for="movie_views">Views Count</label></th>
            <td><input type="text" id="movie_views" name="movie_views" value="<?php echo esc_attr($views); ?>" placeholder="127K, 2.8M, etc." /></td>
        </tr>
        <tr>
            <th><label for="download_links">Download Links</label></th>
            <td>
                <textarea id="download_links" name="download_links" placeholder="Add download links (one per line):
Google Drive: https://drive.google.com/...
Mega: https://mega.nz/...
MediaFire: https://mediafire.com/..."><?php echo esc_textarea($download_links); ?></textarea>
                <p><em>Add one download link per line with format: "Server Name: URL"</em></p>
            </td>
        </tr>
    </table>
    <?php
}

// Save custom meta box data
function save_movie_details($post_id) {
    if (!isset($_POST['movie_details_nonce']) || !wp_verify_nonce($_POST['movie_details_nonce'], 'save_movie_details')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $fields = array(
        'movie_rating' => '_movie_rating',
        'movie_year' => '_movie_year',
        'movie_quality' => '_movie_quality',
        'movie_audio' => '_movie_audio',
        'movie_size' => '_movie_size',
        'movie_genre' => '_movie_genre',
        'movie_views' => '_movie_views',
        'download_links' => '_download_links'
    );
    
    foreach ($fields as $field => $meta_key) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $meta_key, sanitize_text_field($_POST[$field]));
        }
    }
}
add_action('save_post', 'save_movie_details');

// Custom search to include custom post types
function spectrabox_search_filter($query) {
    if (!is_admin() && $query->is_main_query()) {
        if ($query->is_search()) {
            $query->set('post_type', array('post', 'movie', 'series'));
        }
    }
}
add_action('pre_get_posts', 'spectrabox_search_filter');

// Add custom image sizes
function spectrabox_image_sizes() {
    add_image_size('movie-poster', 400, 600, true);
    add_image_size('movie-backdrop', 1200, 600, true);
    add_image_size('movie-thumbnail', 300, 450, true);
}
add_action('after_setup_theme', 'spectrabox_image_sizes');

// Customize excerpt length
function spectrabox_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'spectrabox_excerpt_length');

// Custom excerpt more text
function spectrabox_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'spectrabox_excerpt_more');

// Add admin styles
function spectrabox_admin_styles() {
    echo '<style>
        .spectrabox-admin-header {
            background: linear-gradient(135deg, #9333ea, #06b6d4);
            color: white;
            padding: 20px;
            margin: 20px 0;
            border-radius: 8px;
        }
        .spectrabox-admin-header h2 {
            color: white;
            margin: 0;
        }
    </style>';
}
add_action('admin_head', 'spectrabox_admin_styles');

// Add theme customizer options
function spectrabox_customize_register($wp_customize) {
    $wp_customize->add_section('spectrabox_options', array(
        'title' => 'SpectraBox Options',
        'priority' => 30,
    ));

    $wp_customize->add_setting('spectrabox_tagline', array(
        'default' => 'PREMIUM DOWNLOADS',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('spectrabox_tagline', array(
        'label' => 'Site Tagline',
        'section' => 'spectrabox_options',
        'type' => 'text',
    ));

    $wp_customize->add_setting('spectrabox_telegram', array(
        'default' => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('spectrabox_telegram', array(
        'label' => 'Telegram Channel URL',
        'section' => 'spectrabox_options',
        'type' => 'url',
    ));
}
add_action('customize_register', 'spectrabox_customize_register');

// Helper function to get movie meta
function get_movie_meta($post_id, $key) {
    return get_post_meta($post_id, '_movie_' . $key, true);
}

// Helper function to format views count
function format_views_count($views) {
    if (empty($views)) return '0';
    
    if (preg_match('/[KM]/', $views)) {
        return $views;
    }
    
    $num = intval($views);
    if ($num >= 1000000) {
        return round($num / 1000000, 1) . 'M';
    } elseif ($num >= 1000) {
        return round($num / 1000, 1) . 'K';
    }
    
    return $views;
}

// Add welcome message for new installations
function spectrabox_admin_notice() {
    if (get_option('spectrabox_welcome_notice', true)) {
        ?>
        <div class="notice notice-success is-dismissible">
            <div class="spectrabox-admin-header">
                <h2>🎉 Welcome to SpectraBox!</h2>
                <p>Your modern movie download theme is ready! Start by adding your first movie in the <strong>Movies</strong> section.</p>
                <p><strong>Quick Start:</strong></p>
                <ul>
                    <li>• Go to <strong>Movies → Add New</strong> to add your first movie</li>
                    <li>• Upload poster images in <strong>Media Library</strong></li>
                    <li>• Customize your site in <strong>Appearance → Customize</strong></li>
                </ul>
            </div>
        </div>
        <?php
        update_option('spectrabox_welcome_notice', false);
    }
}
add_action('admin_notices', 'spectrabox_admin_notice');
?>
