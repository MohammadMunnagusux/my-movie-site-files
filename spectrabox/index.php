<?php get_header(); ?>

<div class="main-content">
    <div class="content-grid">
        <?php
        // Get movies and series
        $args = array(
            'post_type' => array('movie', 'series'),
            'posts_per_page' => 16,
            'post_status' => 'publish'
        );
        
        $query = new WP_Query($args);
        
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                $poster = get_post_meta(get_the_ID(), 'poster_url', true);
                $custom_tags = get_post_meta(get_the_ID(), 'custom_tags', true);
        ?>
            <div class="movie-card" onclick="location.href='<?php the_permalink(); ?>'">
                <?php if ($poster): ?>
                    <img src="<?php echo esc_url($poster); ?>" alt="<?php the_title(); ?>" class="movie-poster">
                <?php else: ?>
                    <img src="/placeholder.svg?height=300&width=250" alt="<?php the_title(); ?>" class="movie-poster">
                <?php endif; ?>
                <div class="movie-info">
                    <h3 class="movie-title"><?php the_title(); ?></h3>
                    <?php if ($custom_tags): 
                        $tags_array = explode(',', $custom_tags);
                        $first_tag = trim($tags_array[0]);
                    ?>
                        <span class="movie-category"><?php echo esc_html($first_tag); ?></span>
                    <?php endif; ?>
                </div>
            </div>
        <?php
            endwhile;
            wp_reset_postdata();
        else:
        ?>
            <p>No movies or series found. Please add some content.</p>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
