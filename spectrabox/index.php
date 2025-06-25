<?php get_header(); ?>

<main class="main-content">
    <div class="content-grid">
        <?php
        $args = array(
            'post_type' => array('movie', 'series'),
            'posts_per_page' => 16,
            'paged' => get_query_var('paged') ? get_query_var('paged') : 1
        );
        
        $query = new WP_Query($args);
        
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                $poster = get_post_meta(get_the_ID(), 'poster_url', true);
                $category = get_post_meta(get_the_ID(), 'movie_category', true);
        ?>
                <div class="movie-card" onclick="location.href='<?php the_permalink(); ?>'">
                    <?php if ($poster): ?>
                        <img src="<?php echo esc_url($poster); ?>" alt="<?php the_title(); ?>" class="movie-poster">
                    <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/placeholder.jpg" alt="<?php the_title(); ?>" class="movie-poster">
                    <?php endif; ?>
                    
                    <div class="movie-info">
                        <h3 class="movie-title"><?php the_title(); ?></h3>
                        <?php if ($category): ?>
                            <span class="movie-category"><?php echo esc_html($category); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
        <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </div>
    
    <?php
    // Pagination
    echo paginate_links(array(
        'total' => $query->max_num_pages,
        'current' => max(1, get_query_var('paged')),
        'prev_text' => '&laquo; Previous',
        'next_text' => 'Next &raquo;'
    ));
    ?>
    
    <div class="disclaimer">
        <strong>Disclaimer:</strong> We are not responsible for any content linked from this site. We do not host any files; all links lead to content hosted on third-party websites, which are independently sourced from the internet. We merely provide an index of these publicly available links.
    </div>
</main>

<?php get_footer(); ?>