<?php get_header(); ?>

<div class="post-container">
    <?php while (have_posts()) : the_post(); ?>
        
        <div class="post-header">
            <?php 
            $category = get_post_meta(get_the_ID(), 'movie_category', true);
            if ($category): 
            ?>
                <span class="post-category"><?php echo esc_html($category); ?></span>
            <?php endif; ?>
            
            <h1 class="post-title"><?php the_title(); ?></h1>
            
            <?php 
            $poster = get_post_meta(get_the_ID(), 'poster_url', true);
            if ($poster): 
            ?>
                <img src="<?php echo esc_url($poster); ?>" alt="<?php the_title(); ?>" class="post-poster">
            <?php endif; ?>
        </div>
        
        <div class="storyline">
            <h3>Storyline:</h3>
            <?php the_content(); ?>
        </div>
        
        <?php 
        $trailer = get_post_meta(get_the_ID(), 'trailer_url', true);
        if ($trailer): 
        ?>
            <div class="trailer-section">
                <h3>Trailer:</h3>
                <iframe class="trailer-video" src="<?php echo esc_url($trailer); ?>" frameborder="0" allowfullscreen></iframe>
            </div>
        <?php endif; ?>
        
        <div class="download-section">
            <h3>Download Links:</h3>
            
            <?php
            // 4K Section
            $downloads_4k = get_post_meta(get_the_ID(), 'downloads_4k', true);
            if ($downloads_4k && is_array($downloads_4k)):
            ?>
                <div class="quality-section">
                    <div class="quality-header">4K Quality</div>
                    <div class="download-buttons">
                        <?php foreach ($downloads_4k as $download): ?>
                            <a href="<?php echo esc_url($download['url']); ?>" class="download-btn" target="_blank">
                                <?php echo esc_html($download['label']); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
            
            <?php
            // 1080p Section
            $downloads_1080p = get_post_meta(get_the_ID(), 'downloads_1080p', true);
            if ($downloads_1080p && is_array($downloads_1080p)):
            ?>
                <div class="quality-section">
                    <div class="quality-header">1080p Quality</div>
                    <div class="download-buttons">
                        <?php foreach ($downloads_1080p as $download): ?>
                            <a href="<?php echo esc_url($download['url']); ?>" class="download-btn" target="_blank">
                                <?php echo esc_html($download['label']); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
            
            <?php
            // 720p Section
            $downloads_720p = get_post_meta(get_the_ID(), 'downloads_720p', true);
            if ($downloads_720p && is_array($downloads_720p)):
            ?>
                <div class="quality-section">
                    <div class="quality-header">720p Quality</div>
                    <div class="download-buttons">
                        <?php foreach ($downloads_720p as $download): ?>
                            <a href="<?php echo esc_url($download['url']); ?>" class="download-btn" target="_blank">
                                <?php echo esc_html($download['label']); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
            
            <?php
            // 480p Section
            $downloads_480p = get_post_meta(get_the_ID(), 'downloads_480p', true);
            if ($downloads_480p && is_array($downloads_480p)):
            ?>
                <div class="quality-section">
                    <div class="quality-header">480p Quality</div>
                    <div class="download-buttons">
                        <?php foreach ($downloads_480p as $download): ?>
                            <a href="<?php echo esc_url($download['url']); ?>" class="download-btn" target="_blank">
                                <?php echo esc_html($download['label']); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        
        <div class="disclaimer">
            <strong>Disclaimer:</strong> We are not responsible for any content linked from this site. We do not host any files; all links lead to content hosted on third-party websites, which are independently sourced from the internet. We merely provide an index of these publicly available links.
        </div>
        
    <?php endwhile; ?>
</div>

<?php get_footer(); ?>