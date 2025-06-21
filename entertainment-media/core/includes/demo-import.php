<?php
if (isset($_GET['import-demo']) && $_GET['import-demo'] == true) {
    class EntertainmentMediaDemoImporter {

        public function entertainment_media_customizer_primary_menu() {
            // Create Primary Menu
            $entertainment_media_themename = 'Entertainment Media'; // Define the theme name
            $entertainment_media_menuname = $entertainment_media_themename . 'Main Menus';
            $entertainment_media_bpmenulocation = 'main-menu';
            $entertainment_media_menu_exists = wp_get_nav_menu_object($entertainment_media_menuname);

            if (!$entertainment_media_menu_exists) {
                $entertainment_media_menu_id = wp_create_nav_menu($entertainment_media_menuname);

                wp_update_nav_menu_item($entertainment_media_menu_id, 0, array(
                    'menu-item-title' => __('Home', 'entertainment-media'),
                    'menu-item-classes' => 'home',
                    'menu-item-url' => home_url('/'),
                    'menu-item-status' => 'publish',
                ));

                wp_update_nav_menu_item($entertainment_media_menu_id, 0, array(
                    'menu-item-title' => __('Movies', 'entertainment-media'),
                    'menu-item-classes' => 'movies',
                    'menu-item-url' => get_permalink(get_page_id_by_title('Movies')),
                    'menu-item-status' => 'publish',
                ));

                wp_update_nav_menu_item($entertainment_media_menu_id, 0, array(
                    'menu-item-title' => __('TV Shows', 'entertainment-media'),
                    'menu-item-classes' => 'tv-shows',
                    'menu-item-url' => get_permalink(get_page_id_by_title('TV Shows')),
                    'menu-item-status' => 'publish',
                ));

                wp_update_nav_menu_item($entertainment_media_menu_id, 0, array(
                    'menu-item-title' => __('Web Series', 'entertainment-media'),
                    'menu-item-classes' => 'web-series',
                    'menu-item-url' => get_permalink(get_page_id_by_title('Web Series')),
                    'menu-item-status' => 'publish',
                ));

                wp_update_nav_menu_item($entertainment_media_menu_id, 0, array(
                    'menu-item-title' => __('Blogs', 'entertainment-media'),
                    'menu-item-classes' => 'blogs',
                    'menu-item-url' => get_permalink(get_page_id_by_title('Blogs')),
                    'menu-item-status' => 'publish',
                ));

                wp_update_nav_menu_item($entertainment_media_menu_id, 0, array(
                    'menu-item-title' => __('Contact', 'entertainment-media'),
                    'menu-item-classes' => 'contact',
                    'menu-item-url' => get_permalink(get_page_id_by_title('Contact')),
                    'menu-item-status' => 'publish',
                ));

                if (!has_nav_menu($entertainment_media_bpmenulocation)) {
                    $locations = get_theme_mod('nav_menu_locations');
                    $locations[$entertainment_media_bpmenulocation] = $entertainment_media_menu_id;
                    set_theme_mod('nav_menu_locations', $locations);
                }
            }
        }

        public function setup_widgets() {

        $entertainment_media_home_id='';
        $entertainment_media_home_content = '';
        $entertainment_media_home_title = 'Home';
        $entertainment_media_home = array(
            'post_type' => 'page',
            'post_title' => $entertainment_media_home_title,
            'post_content' => $entertainment_media_home_content,
            'post_status' => 'publish',
            'post_author' => 1,
            'post_slug' => 'home'
        );
        $entertainment_media_home_id = wp_insert_post($entertainment_media_home);

        add_post_meta( $entertainment_media_home_id, '_wp_page_template', 'frontpage.php' );

        update_option( 'page_on_front', $entertainment_media_home_id );
        update_option( 'show_on_front', 'page' );

                        // Create a Posts Page
            $entertainment_media_blog_title = 'Movies';
            $entertainment_media_blog_check = get_page_id_by_title($entertainment_media_blog_title);

            if ($entertainment_media_blog_check == 1) {
                $entertainment_media_blog = array(
                    'post_type' => 'page',
                    'post_title' => $entertainment_media_blog_title,
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_name' => 'movies',
                    'post_content' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."',
                );
                $entertainment_media_blog_id = wp_insert_post($entertainment_media_blog);

                if (!is_wp_error($entertainment_media_blog_id)) {
                    // update_option('page_for_posts', $entertainment_media_blog_id);
                }
            }

                        // Create a Posts Page
            $entertainment_media_blog_title = 'TV Shows';
            $entertainment_media_blog_check = get_page_id_by_title($entertainment_media_blog_title);

            if ($entertainment_media_blog_check  == 1) {
                $entertainment_media_blog = array(
                    'post_type' => 'page',
                    'post_title' => $entertainment_media_blog_title,
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_name' => 'tv-shows',
                    'post_content' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."',
                );
                $entertainment_media_blog_id = wp_insert_post($entertainment_media_blog);

                if (!is_wp_error($entertainment_media_blog_id)) {
                    // update_option('page_for_posts', $entertainment_media_blog_id);
                }
            }

                        // Create a Posts Page
            $entertainment_media_blog_title = 'Web Series';
            $entertainment_media_blog_check = get_page_id_by_title($entertainment_media_blog_title);

            if ($entertainment_media_blog_check  == 1) {
                $entertainment_media_blog = array(
                    'post_type' => 'page',
                    'post_title' => $entertainment_media_blog_title,
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_name' => 'web-series',
                    'post_content' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."',
                );
                $entertainment_media_blog_id = wp_insert_post($entertainment_media_blog);

                if (!is_wp_error($entertainment_media_blog_id)) {
                    // update_option('page_for_posts', $entertainment_media_blog_id);
                }
            }

                        // Create a Posts Page
            $entertainment_media_blog_title = 'Blogs';
            $entertainment_media_blog_check = get_page_id_by_title($entertainment_media_blog_title);

            if ($entertainment_media_blog_check  == 1) {
                $entertainment_media_blog = array(
                    'post_type' => 'page',
                    'post_title' => $entertainment_media_blog_title,
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_name' => 'blogs',
                    'post_content' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."',
                );
                $entertainment_media_blog_id = wp_insert_post($entertainment_media_blog);

                if (!is_wp_error($entertainment_media_blog_id)) {
                    // update_option('page_for_posts', $entertainment_media_blog_id);
                }
            }
                                                 // Create a Posts Page
            $entertainment_media_blog_title = 'Contact';
            $entertainment_media_blog_check = get_page_id_by_title($entertainment_media_blog_title);

            if ($entertainment_media_blog_check  == 1) {
                $entertainment_media_blog = array(
                    'post_type' => 'page',
                    'post_title' => $entertainment_media_blog_title,
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_name' => 'contact',
                    'post_content' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."',
                );
                $entertainment_media_blog_id = wp_insert_post($entertainment_media_blog);

                if (!is_wp_error($entertainment_media_blog_id)) {
                    // update_option('page_for_posts', $entertainment_media_blog_id);
                }
            }

		//---Header--//

        set_theme_mod( 'entertainment_media_sign_in_btn_text', 'Sign In');
        set_theme_mod( 'entertainment_media_sign_in_btn_link', '#');

        set_theme_mod('entertainment_media_search_box_enable', true);
        set_theme_mod('entertainment_media_header_google_translator', true);

		set_theme_mod('entertainment_media_social_links_settings', array(
            array(
                "link_text" => "fab fa-instagram",
                "link_url" => "#"
            ),
            array(
                "link_text" => "fab fa-twitter",
                "link_url" => "#"
            ),
            array(
                "link_text" => "fab fa-youtube",
                "link_url" => "#"
            ),
            array(
                "link_text" => "fab fa-linkedin-in",
                "link_url" => "#"
            )
        ));

		//-----Slider-----//

	set_theme_mod('entertainment_media_slider_box_enable', true);

	set_theme_mod('entertainment_media_slider_counter', '3');

	$slider_extra_title = array('DIRECTING BY JOHN DOE','DIRECTING BY MICHEAL ROCHERS','DIRECTING BY DAVID MILAN');

	$slider_title = array('Suspecious','Horror','Comic Role');

	for ($i = 1; $i <= 3; $i++) {
	    set_theme_mod('entertainment_media_slider_image' . $i, get_template_directory_uri() . '/assets/images/slider' . $i . '.png');

	    set_theme_mod('entertainment_media_slider_sub_heading' . $i, $slider_extra_title[$i - 1]);
	    set_theme_mod('entertainment_media_slider_main_heading' . $i, $slider_title[$i - 1]);
        set_theme_mod('entertainment_media_slider_text' . $i, 'Nullam imperdiet, sem at fringilla lobortis, sem nibh fringilla nibh, id gravidrus sit amet erat. Aenean nec nisi...');
	    
	    set_theme_mod('entertainment_media_slider_button_text' . $i, 'Play Now');
	    set_theme_mod('entertainment_media_slider_button_url' . $i, '#');
	}

		//-----Featured movie sections-----//

    set_theme_mod('entertainment_media_featured_movies_section_enable', true);

    set_theme_mod('entertainment_media_featured_movies_heading', '3');

        /*--- Blog Start---*/

        set_theme_mod( 'entertainment_media_featured_movies_section_enable', true);

        set_theme_mod( 'entertainment_media_featured_movies_heading', 'Featured Movies' );

        $entertainment_media_latest_post_category = wp_create_category('Featured Movies');
            set_theme_mod( 'entertainment_media_featured_moviess_category', 'Featured Movies' ); 

        $content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.';

        for($i=1; $i<=4; $i++) {

            $title=array('Beauty Nature','The Hangover','Allergen Buster','Total Tidy');

            // Create post object
            $entertainment_media_my_post = array(
                'post_title'    => wp_strip_all_tags($title[$i-1]),
                'post_content'  => $content,
                'post_status'   => 'publish',
                'post_type'     => 'post',
                'post_category' => array($entertainment_media_latest_post_category) 
            );

            // Insert the post into the database
            $entertainment_media_post_id = wp_insert_post( $entertainment_media_my_post );

            $entertainment_media_image_url = get_template_directory_uri().'/assets/images/movie' . $i . '.png';

            $entertainment_media_image_name= 'movie'.$i.'.png';
            $entertainment_media_upload_dir = wp_upload_dir(); 
            // Set upload folder
            $entertainment_media_image_data = file_get_contents($entertainment_media_image_url); 
             
            // Get image data
            $entertainment_media_unique_file_name = wp_unique_filename( $entertainment_media_upload_dir['path'], $entertainment_media_image_name ); 
            // Generate unique name
            $filename= basename( $entertainment_media_unique_file_name ); 
            // Create image file name
            // Check folder permission and define file location
            if( wp_mkdir_p( $entertainment_media_upload_dir['path'] ) ) {
                $file = $entertainment_media_upload_dir['path'] . '/' . $filename;
            } else {
                $file = $entertainment_media_upload_dir['basedir'] . '/' . $filename;
            }

            // Create the image  file on the server
            if ( ! function_exists( 'WP_Filesystem' ) ) {
                require_once( ABSPATH . 'wp-admin/includes/file.php' );
            }

            WP_Filesystem();
            global $wp_filesystem;

            if ( ! $wp_filesystem->put_contents( $file, $entertainment_media_image_data, FS_CHMOD_FILE ) ) {
                wp_die( 'Error saving file!' );
            }

            $entertainment_media_wp_filetype = wp_check_filetype( $filename, null );
            $entertainment_media_attachment = array(
                'post_mime_type' => $entertainment_media_wp_filetype['type'],
                'post_title'     => sanitize_file_name( $filename ),
                'post_content'   => '',
                'post_type'     => 'post',
                'post_status'    => 'inherit'
            );
            $entertainment_media_attach_id = wp_insert_attachment( $entertainment_media_attachment, $file, $entertainment_media_post_id );
            require_once(ABSPATH . 'wp-admin/includes/image.php');
            $entertainment_media_attach_data = wp_generate_attachment_metadata( $entertainment_media_attach_id, $file );
                wp_update_attachment_metadata( $entertainment_media_attach_id, $entertainment_media_attach_data );
                set_post_thumbnail( $entertainment_media_post_id, $entertainment_media_attach_id );
        }

        /*--- Blog End---*/



    }
    }

	// Instantiate the class and call its methods
    $demo_importer = new EntertainmentMediaDemoImporter();
    $demo_importer->setup_widgets();
    $demo_importer->entertainment_media_customizer_primary_menu();

		
	}
?>