<?php
// Theme setup
function spectrabox_setup() {
    // Add theme support
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => 'Primary Menu (Desktop - 4-5 items)',
        'mobile' => 'Mobile Menu (All items)',
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
            'rewrite' => array('slug' => '%movie_category%', 'with_front' => false),
            'taxonomies' => array('movie_category'),
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
            'rewrite' => array('slug' => '%series_category%', 'with_front' => false),
            'taxonomies' => array('series_category'),
        )
    );
}
add_action('init', 'create_series_post_type');

// Register custom taxonomies
function create_movie_taxonomy() {
    register_taxonomy('movie_category', 'movie', array(
        'labels' => array(
            'name' => 'Movie Categories',
            'singular_name' => 'Movie Category',
            'add_new_item' => 'Add New Movie Category',
            'edit_item' => 'Edit Movie Category',
            'update_item' => 'Update Movie Category',
            'view_item' => 'View Movie Category',
            'search_items' => 'Search Movie Categories',
        ),
        'public' => true,
        'hierarchical' => true,
        'rewrite' => array('slug' => '', 'with_front' => false),
        'show_admin_column' => true,
    ));
}
add_action('init', 'create_movie_taxonomy');

function create_series_taxonomy() {
    register_taxonomy('series_category', 'series', array(
        'labels' => array(
            'name' => 'Series Categories',
            'singular_name' => 'Series Category',
            'add_new_item' => 'Add New Series Category',
            'edit_item' => 'Edit Series Category',
            'update_item' => 'Update Series Category',
            'view_item' => 'View Series Category',
            'search_items' => 'Search Series Categories',
        ),
        'public' => true,
        'hierarchical' => true,
        'rewrite' => array('slug' => '', 'with_front' => false),
        'show_admin_column' => true,
    ));
}
add_action('init', 'create_series_taxonomy');

// Custom permalink structure
function custom_post_link($post_link, $post) {
    if ($post->post_type == 'movie') {
        $terms = wp_get_object_terms($post->ID, 'movie_category');
        if ($terms && !is_wp_error($terms)) {
            $post_link = str_replace('%movie_category%', $terms[0]->slug, $post_link);
        } else {
            $post_link = str_replace('%movie_category%', 'uncategorized', $post_link);
        }
    }
    
    if ($post->post_type == 'series') {
        $terms = wp_get_object_terms($post->ID, 'series_category');
        if ($terms && !is_wp_error($terms)) {
            $post_link = str_replace('%series_category%', $terms[0]->slug, $post_link);
        } else {
            $post_link = str_replace('%series_category%', 'uncategorized', $post_link);
        }
    }
    
    return $post_link;
}
add_filter('post_type_link', 'custom_post_link', 1, 2);

// Custom rewrite rules
function custom_rewrite_rules() {
    // Movie category rules
    $movie_terms = get_terms(array('taxonomy' => 'movie_category', 'hide_empty' => false));
    foreach ($movie_terms as $term) {
        add_rewrite_rule(
            '^' . $term->slug . '/([^/]+)/?$',
            'index.php?movie=$matches[1]',
            'top'
        );
        add_rewrite_rule(
            '^' . $term->slug . '/?$',
            'index.php?movie_category=' . $term->slug,
            'top'
        );
    }
    
    // Series category rules
    $series_terms = get_terms(array('taxonomy' => 'series_category', 'hide_empty' => false));
    foreach ($series_terms as $term) {
        add_rewrite_rule(
            '^' . $term->slug . '/([^/]+)/?$',
            'index.php?series=$matches[1]',
            'top'
        );
        add_rewrite_rule(
            '^' . $term->slug . '/?$',
            'index.php?series_category=' . $term->slug,
            'top'
        );
    }
}
add_action('init', 'custom_rewrite_rules');

// Create default categories on theme activation
function create_default_categories() {
    // Movie categories
    $movie_categories = array(
        'bangla-movies' => 'Bangla Movies',
        'hindi-movies' => 'Hindi Movies',
        'english-movies' => 'English Movies',
        'animated-movies' => 'Animated Movies',
        'other-movies' => 'Other Movies'
    );
    
    foreach ($movie_categories as $slug => $name) {
        if (!term_exists($name, 'movie_category')) {
            wp_insert_term($name, 'movie_category', array('slug' => $slug));
        }
    }
    
    // Series categories
    $series_categories = array(
        'bangla-series' => 'Bangla Series',
        'hindi-series' => 'Hindi Series',
        'english-series' => 'English Series',
        'animated-series' => 'Animated Series',
        'k-drama' => 'K-Drama',
        'c-drama' => 'C-Drama',
        'other-series' => 'Other Series'
    );
    
    foreach ($series_categories as $slug => $name) {
        if (!term_exists($name, 'series_category')) {
            wp_insert_term($name, 'series_category', array('slug' => $slug));
        }
    }
    
    // Flush rewrite rules
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'create_default_categories');

// Add meta boxes for movies
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
    $custom_tags = get_post_meta($post->ID, 'custom_tags', true);
    
    echo '<table class="form-table">';
    echo '<tr><th><label for="custom_tags">Custom Tags (comma separated):</label></th>';
    echo '<td><input type="text" id="custom_tags" name="custom_tags" value="' . esc_attr($custom_tags) . '" style="width:100%;" placeholder="e.g., Action, Thriller, 2024" /></td></tr>';
    
    echo '<tr><th><label for="poster_url">Poster URL:</label></th>';
    echo '<td><input type="url" id="poster_url" name="poster_url" value="' . esc_attr($poster_url) . '" style="width:100%;" /></td></tr>';
    
    echo '<tr><th><label for="trailer_url">Trailer URL (YouTube Embed):</label></th>';
    echo '<td><input type="url" id="trailer_url" name="trailer_url" value="' . esc_attr($trailer_url) . '" style="width:100%;" /></td></tr>';
    echo '</table>';
    
    echo '<h4>Download Links with File Sizes</h4>';
    echo '<p><em>Add download links in JSON format with file sizes. Example:</em></p>';
    echo '<pre>[{"label": "4K HDR", "url": "https://example.com/download1", "size": "19.08 GB"}, {"label": "4K DV", "url": "https://example.com/download2", "size": "22.15 GB"}]</pre>';
    
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
    
    $fields = array('poster_url', 'trailer_url', 'custom_tags');
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

// Add series meta boxes
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
    $custom_tags = get_post_meta($post->ID, 'custom_tags', true);
    
    echo '<table class="form-table">';
    echo '<tr><th><label for="custom_tags">Custom Tags (comma separated):</label></th>';
    echo '<td><input type="text" id="custom_tags" name="custom_tags" value="' . esc_attr($custom_tags) . '" style="width:100%;" placeholder="e.g., Drama, K-Drama, 2024" /></td></tr>';
    
    echo '<tr><th><label for="poster_url">Poster URL:</label></th>';
    echo '<td><input type="url" id="poster_url" name="poster_url" value="' . esc_attr($poster_url) . '" style="width:100%;" /></td></tr>';
    
    echo '<tr><th><label for="trailer_url">Trailer URL (YouTube Embed):</label></th>';
    echo '<td><input type="url" id="trailer_url" name="trailer_url" value="' . esc_attr($trailer_url) . '" style="width:100%;" /></td></tr>';
    echo '</table>';
    
    echo '<h4>Seasons Data with File Sizes</h4>';
    echo '<p><em>Add seasons data in JSON format with file sizes. Example structure:</em></p>';
    echo '<pre>{
  "1": {
    "4k": {
      "episodes": {
        "1": {"url": "url1", "size": "998.07 MB"}, 
        "2": {"url": "url2", "size": "1.02 GB"}
      },
      "zip": {"url": "zip_url", "size": "40.58 GB"}
    },
    "1080p": {
      "episodes": {
        "1": {"url": "url1", "size": "450 MB"}, 
        "2": {"url": "url2", "size": "465 MB"}
      },
      "zip": {"url": "zip_url", "size": "18.5 GB"}
    }
  }
}</pre>';
    
    $seasons_data = get_post_meta($post->ID, 'seasons_data', true);
    echo '<textarea id="seasons_data" name="seasons_data" rows="15" style="width:100%;">' . esc_textarea(json_encode($seasons_data, JSON_PRETTY_PRINT)) . '</textarea>';
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
    
    $fields = array('poster_url', 'trailer_url', 'custom_tags');
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

// Handle comment submission
add_action('wp_ajax_submit_comment', 'handle_comment_submission');
add_action('wp_ajax_nopriv_submit_comment', 'handle_comment_submission');

function handle_comment_submission() {
    $post_id = intval($_POST['post_id']);
    $name = sanitize_text_field($_POST['comment_name']);
    $email = sanitize_email($_POST['comment_email']);
    $text = sanitize_textarea_field($_POST['comment_text']);
    
    $comment = array(
        'name' => $name,
        'email' => $email,
        'text' => $text,
        'date' => current_time('mysql'),
        'ip' => $_SERVER['REMOTE_ADDR']
    );
    
    $existing_comments = get_post_meta($post_id, 'custom_comments', true);
    if (!is_array($existing_comments)) {
        $existing_comments = array();
    }
    
    $existing_comments[] = $comment;
    update_post_meta($post_id, 'custom_comments', $existing_comments);
    
    wp_send_json_success('Comment posted successfully');
}

// Custom search functionality
function custom_search_filter($query) {
    if (!is_admin() && $query->is_main_query()) {
        if ($query->is_search()) {
            $query->set('post_type', array('movie', 'series'));
        }
    }
}
add_action('pre_get_posts', 'custom_search_filter');

// Add custom image size for movie posters
add_action('after_setup_theme', 'spectrabox_image_sizes');
function spectrabox_image_sizes() {
    add_image_size('movie-poster', 300, 450, true);
}

// Flush rewrite rules on theme activation
function flush_rewrite_rules_on_activation() {
    create_movie_post_type();
    create_series_post_type();
    create_movie_taxonomy();
    create_series_taxonomy();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'flush_rewrite_rules_on_activation');
?>
