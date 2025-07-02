<?php get_header(); ?>

<div class="main-content">
    <div class="category-header">
        <h1><?php single_term_title(); ?></h1>
        <p>Browse all series in this category</p>
    </div>
    
    <div class="content-grid">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
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
        else:
        ?>
            <p>No series found in this category.</p>
        <?php endif; ?>
    </div>
    
    <!-- Pagination -->
    <div class="pagination">
        <?php
        echo paginate_links(array(
            'prev_text' => '&laquo; Previous',
            'next_text' => 'Next &raquo;',
        ));
        ?>
    </div>
</div>

<?php get_footer(); ?>
