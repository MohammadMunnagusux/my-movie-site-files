<?php
// Theme setup
function spectrabox_setup() {
    // Add theme support
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => 'Primary Menu',
    ));
}
add_action('after_setup_theme', 'spectrabox_setup');

// Enqueue styles and scripts
function spectrabox_scripts() {
    wp_enqueue_style('spectrabox-style', get_stylesheet_uri());
    wp_enqueue_script('spectrabox-script', get_template_directory_uri() . '/js/script.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'spectrabox_scripts');

// Register custom post types
function create_movie_post_type() {
    register_post_type('movie',
        array(
            'labels' => array(
                'name' => 'Movies',
                'singular_name' => 'Movie',
                'add_new' => 'Add New Movie',
                'add_new_item' => 'Add New Movie',
                'edit_item' => 'Edit Movie',
                'new_item' => 'New Movie',
                'view_item' => 'View Movie',
                'search_items' => 'Search Movies',
                'not_found' => 'No movies found',
                'not_found_in_trash' => 'No movies found in Trash'
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_icon' => 'dashicons-video-alt3',
            'rewrite' => array('slug' => 'movie'),
        )
    );
}
add_action('init', 'create_movie_post_type');

function create_series_post_type() {
    register_post_type('series',
        array(
            'labels' => array(
                'name' => 'Series',
                'singular_name' => 'Series',
                'add_new' => 'Add New Series',
                'add_new_item' => 'Add New Series',
                'edit_item' => 'Edit Series',
                'new_item' => 'New Series',
                'view_item' => 'View Series',
                'search_items' => 'Search Series',
                'not_found' => 'No series found',
                'not_found_in_trash' => 'No series found in Trash'
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_icon' => 'dashicons-playlist-video',
            'rewrite' => array('slug' => 'series'),
        )
    );
}
add_action('init', 'create_series_post_type');

// Add meta boxes for movies and series
function add_movie_meta_boxes() {
    add_meta_box(
        'movie-details',
        'Movie Details',
        'movie_details_callback',
        'movie',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_movie_meta_boxes');

function movie_details_callback($post) {
    wp_nonce_field('save_movie_details', 'movie_details_nonce');
    
    $poster_url = get_post_meta($post->ID, 'poster_url', true);
    $trailer_url = get_post_meta($post->ID, 'trailer_url', true);
    $movie_category = get_post_meta($post->ID, 'movie_category', true);
    
    echo '<table class="form-table">';
    echo '<tr><th><label for="poster_url">Poster URL:</label></th>';
    echo '<td><input type="url" id="poster_url" name="poster_url" value="' . esc_attr($poster_url) . '" style="width:100%;" /></td></tr>';
    
    echo '<tr><th><label for="trailer_url">Trailer URL (YouTube Embed):</label></th>';
    echo '<td><input type="url" id="trailer_url" name="trailer_url" value="' . esc_attr($trailer_url) . '" style="width:100%;" /></td></tr>';
    
    echo '<tr><th><label for="movie_category">Category:</label></th>';
    echo '<td><select id="movie_category" name="movie_category">';
    $categories = array('English Movie', 'Hindi Movie', 'Bangla Movie', 'Animated Movie');
    foreach ($categories as $cat) {
        $selected = ($movie_category == $cat) ? 'selected' : '';
        echo '<option value="' . esc_attr($cat) . '" ' . $selected . '>' . esc_html($cat) . '</option>';
    }
    echo '</select></td></tr>';
    echo '</table>';
    
    echo '<h4>Download Links</h4>';
    echo '<p><em>Add download links in JSON format for each quality. Example:</em></p>';
    echo '<pre>[{"label": "4K HDR", "url": "https://example.com/download1"}, {"label": "4K DV", "url": "https://example.com/download2"}]</pre>';
    
    $downloads_4k = get_post_meta($post->ID, 'downloads_4k', true);
    $downloads_1080p = get_post_meta($post->ID, 'downloads_1080p', true);
    $downloads_720p = get_post_meta($post->ID, 'downloads_720p', true);
    $downloads_480p = get_post_meta($post->ID, 'downloads_480p', true);
    
    echo '<table class="form-table">';
    echo '<tr><th><label for="downloads_4k">4K Downloads (JSON):</label></th>';
    echo '<td><textarea id="downloads_4k" name="downloads_4k" rows="3" style="width:100%;">' . esc_textarea(json_encode($downloads_4k, JSON_PRETTY_PRINT)) . '</textarea></td></tr>';
    
    echo '<tr><th><label for="downloads_1080p">1080p Downloads (JSON):</label></th>';
    echo '<td><textarea id="downloads_1080p" name="downloads_1080p" rows="3" style="width:100%;">' . esc_textarea(json_encode($downloads_1080p, JSON_PRETTY_PRINT)) . '</textarea></td></tr>';
    
    echo '<tr><th><label for="downloads_720p">720p Downloads (JSON):</label></th>';
    echo '<td><textarea id="downloads_720p" name="downloads_720p" rows="3" style="width:100%;">' . esc_textarea(json_encode($downloads_720p, JSON_PRETTY_PRINT)) . '</textarea></td></tr>';
    
    echo '<tr><th><label for="downloads_480p">480p Downloads (JSON):</label></th>';
    echo '<td><textarea id="downloads_480p" name="downloads_480p" rows="3" style="width:100%;">' . esc_textarea(json_encode($downloads_480p, JSON_PRETTY_PRINT)) . '</textarea></td></tr>';
    echo '</table>';
}

// Save movie meta data
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
    
    $fields = array('poster_url', 'trailer_url', 'movie_category');
    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
        }
    }
    
    // Handle download links
    $download_fields = array('downloads_4k', 'downloads_1080p', 'downloads_720p', 'downloads_480p');
    foreach ($download_fields as $field) {
        if (isset($_POST[$field])) {
            $json_data = json_decode(stripslashes($_POST[$field]), true);
            if (json_last_error() === JSON_ERROR_NONE) {
                update_post_meta($post_id, $field, $json_data);
            }
        }
    }
}
add_action('save_post', 'save_movie_details');

// Add series meta boxes (similar structure but for series)
function add_series_meta_boxes() {
    add_meta_box(
        'series-details',
        'Series Details',
        'series_details_callback',
        'series',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_series_meta_boxes');

function series_details_callback($post) {
    wp_nonce_field('save_series_details', 'series_details_nonce');
    
    $poster_url = get_post_meta($post->ID, 'poster_url', true);
    $trailer_url = get_post_meta($post->ID, 'trailer_url', true);
    $series_category = get_post_meta($post->ID, 'series_category', true);
    
    echo '<table class="form-table">';
    echo '<tr><th><label for="poster_url">Poster URL:</label></th>';
    echo '<td><input type="url" id="poster_url" name="poster_url" value="' . esc_attr($poster_url) . '" style="width:100%;" /></td></tr>';
    
    echo '<tr><th><label for="trailer_url">Trailer URL (YouTube Embed):</label></th>';
    echo '<td><input type="url" id="trailer_url" name="trailer_url" value="' . esc_attr($trailer_url) . '" style="width:100%;" /></td></tr>';
    
    echo '<tr><th><label for="series_category">Category:</label></th>';
    echo '<td><select id="series_category" name="series_category">';
    $categories = array('Series', 'K-Drama', 'C-Drama', 'Bangla Web Series', 'Anime Series');
    foreach ($categories as $cat) {
        $selected = ($series_category == $cat) ? 'selected' : '';
        echo '<option value="' . esc_attr($cat) . '" ' . $selected . '>' . esc_html($cat) . '</option>';
    }
    echo '</select></td></tr>';
    echo '</table>';
    
    echo '<h4>Seasons Data</h4>';
    echo '<p><em>Add seasons data in JSON format. Example structure:</em></p>';
    echo '<pre>{
  "1": {
    "4k": {
      "episodes": {"1": "url1", "2": "url2"},
      "zip": "zip_url"
    },
    "1080p": {
      "episodes": {"1": "url1", "2": "url2"},
      "zip": "zip_url"
    }
  }
}</pre>';
    
    $seasons_data = get_post_meta($post->ID, 'seasons_data', true);
    echo '<textarea id="seasons_data" name="seasons_data" rows="10" style="width:100%;">' . esc_textarea(json_encode($seasons_data, JSON_PRETTY_PRINT)) . '</textarea>';
}

// Save series meta data
function save_series_details($post_id) {
    if (!isset($_POST['series_details_nonce']) || !wp_verify_nonce($_POST['series_details_nonce'], 'save_series_details')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    $fields = array('poster_url', 'trailer_url', 'series_category');
    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
        }
    }
    
    // Handle seasons data
    if (isset($_POST['seasons_data'])) {
        $json_data = json_decode(stripslashes($_POST['seasons_data']), true);
        if (json_last_error() === JSON_ERROR_NONE) {
            update_post_meta($post_id, 'seasons_data', $json_data);
        }
    }
}
add_action('save_post', 'save_series_details');

// Create categories on theme activation
function create_default_categories() {
    $categories = array(
        'bangla-movies' => 'Bangla Movies',
        'hindi-movies' => 'Hindi Movies',
        'english-movies' => 'English Movies',
        'animated-movies' => 'Animated Movies',
        'series' => 'Series',
        'k-drama' => 'K-Drama',
        'c-drama' => 'C-Drama',
        'bangla-web-series' => 'Bangla Web Series',
        'anime-series' => 'Anime Series'
    );
    
    foreach ($categories as $slug => $name) {
        if (!term_exists($name, 'category')) {
            wp_insert_term($name, 'category', array('slug' => $slug));
        }
    }
}
add_action('after_switch_theme', 'create_default_categories');
?>