<?php get_header(); ?>

<div class="post-container">
    <?php while (have_posts()) : the_post(); ?>
        
        <div class="post-header">
            <?php 
            $custom_tags = get_post_meta(get_the_ID(), 'custom_tags', true);
            if ($custom_tags): 
                $tags_array = explode(',', $custom_tags);
            ?>
                <div class="post-tags">
                    <?php foreach ($tags_array as $tag): ?>
                        <span class="post-tag"><?php echo trim(esc_html($tag)); ?></span>
                    <?php endforeach; ?>
                </div>
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
            $seasons = get_post_meta(get_the_ID(), 'seasons_data', true);
            if ($seasons && is_array($seasons)):
                foreach ($seasons as $season_num => $season_data):
            ?>
                <div class="season-section">
                    <div class="season-header">Season <?php echo esc_html($season_num); ?></div>
                    
                    <?php
                    // 4K Quality for this season
                    if (isset($season_data['4k']) && is_array($season_data['4k'])):
                    ?>
                        <div class="quality-section">
                            <div class="quality-header">4K Quality</div>
                            <div class="episodes-grid">
                                <?php foreach ($season_data['4k']['episodes'] as $ep_num => $ep_data): ?>
                                    <a href="<?php echo esc_url($ep_data['url']); ?>" class="episode-btn" target="_blank">
                                        Episode <?php echo esc_html($ep_num); ?>
                                        <?php if (isset($ep_data['size'])): ?>
                                            <span class="file-size">(<?php echo esc_html($ep_data['size']); ?>)</span>
                                        <?php endif; ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                            <?php if (isset($season_data['4k']['zip'])): ?>
                                <div class="zip-download">
                                    <a href="<?php echo esc_url($season_data['4k']['zip']['url']); ?>" class="download-btn" target="_blank">
                                        Download Season <?php echo esc_html($season_num); ?> 4K (ZIP)
                                        <?php if (isset($season_data['4k']['zip']['size'])): ?>
                                            <span class="file-size">(<?php echo esc_html($season_data['4k']['zip']['size']); ?>)</span>
                                        <?php endif; ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php
                    // 1080p Quality for this season
                    if (isset($season_data['1080p']) && is_array($season_data['1080p'])):
                    ?>
                        <div class="quality-section">
                            <div class="quality-header">1080p Quality</div>
                            <div class="episodes-grid">
                                <?php foreach ($season_data['1080p']['episodes'] as $ep_num => $ep_data): ?>
                                    <a href="<?php echo esc_url($ep_data['url']); ?>" class="episode-btn" target="_blank">
                                        Episode <?php echo esc_html($ep_num); ?>
                                        <?php if (isset($ep_data['size'])): ?>
                                            <span class="file-size">(<?php echo esc_html($ep_data['size']); ?>)</span>
                                        <?php endif; ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                            <?php if (isset($season_data['1080p']['zip'])): ?>
                                <div class="zip-download">
                                    <a href="<?php echo esc_url($season_data['1080p']['zip']['url']); ?>" class="download-btn" target="_blank">
                                        Download Season <?php echo esc_html($season_num); ?> 1080p (ZIP)
                                        <?php if (isset($season_data['1080p']['zip']['size'])): ?>
                                            <span class="file-size">(<?php echo esc_html($season_data['1080p']['zip']['size']); ?>)</span>
                                        <?php endif; ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php
                    // 720p Quality for this season
                    if (isset($season_data['720p']) && is_array($season_data['720p'])):
                    ?>
                        <div class="quality-section">
                            <div class="quality-header">720p Quality</div>
                            <div class="episodes-grid">
                                <?php foreach ($season_data['720p']['episodes'] as $ep_num => $ep_data): ?>
                                    <a href="<?php echo esc_url($ep_data['url']); ?>" class="episode-btn" target="_blank">
                                        Episode <?php echo esc_html($ep_num); ?>
                                        <?php if (isset($ep_data['size'])): ?>
                                            <span class="file-size">(<?php echo esc_html($ep_data['size']); ?>)</span>
                                        <?php endif; ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                            <?php if (isset($season_data['720p']['zip'])): ?>
                                <div class="zip-download">
                                    <a href="<?php echo esc_url($season_data['720p']['zip']['url']); ?>" class="download-btn" target="_blank">
                                        Download Season <?php echo esc_html($season_num); ?> 720p (ZIP)
                                        <?php if (isset($season_data['720p']['zip']['size'])): ?>
                                            <span class="file-size">(<?php echo esc_html($season_data['720p']['zip']['size']); ?>)</span>
                                        <?php endif; ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php
                    // 480p Quality for this season
                    if (isset($season_data['480p']) && is_array($season_data['480p'])):
                    ?>
                        <div class="quality-section">
                            <div class="quality-header">480p Quality</div>
                            <div class="episodes-grid">
                                <?php foreach ($season_data['480p']['episodes'] as $ep_num => $ep_data): ?>
                                    <a href="<?php echo esc_url($ep_data['url']); ?>" class="episode-btn" target="_blank">
                                        Episode <?php echo esc_html($ep_num); ?>
                                        <?php if (isset($ep_data['size'])): ?>
                                            <span class="file-size">(<?php echo esc_html($ep_data['size']); ?>)</span>
                                        <?php endif; ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                            <?php if (isset($season_data['480p']['zip'])): ?>
                                <div class="zip-download">
                                    <a href="<?php echo esc_url($season_data['480p']['zip']['url']); ?>" class="download-btn" target="_blank">
                                        Download Season <?php echo esc_html($season_num); ?> 480p (ZIP)
                                        <?php if (isset($season_data['480p']['zip']['size'])): ?>
                                            <span class="file-size">(<?php echo esc_html($season_data['480p']['zip']['size']); ?>)</span>
                                        <?php endif; ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php
                endforeach;
            endif;
            ?>
        </div>
        
        <!-- Comments Section -->
        <div class="comments-section">
            <h3>Comments</h3>
            
            <div class="comment-form">
                <h4>Leave a Comment</h4>
                <form id="commentForm" method="post">
                    <input type="text" name="comment_name" placeholder="Your Name" required>
                    <input type="email" name="comment_email" placeholder="Your Email" required>
                    <textarea name="comment_text" rows="4" placeholder="Your Comment" required></textarea>
                    <button type="submit" class="comment-submit">Post Comment</button>
                    <input type="hidden" name="post_id" value="<?php echo get_the_ID(); ?>">
                    <input type="hidden" name="action" value="submit_comment">
                </form>
            </div>
            
            <div class="comments-list">
                <?php
                $comments = get_post_meta(get_the_ID(), 'custom_comments', true);
                if ($comments && is_array($comments)):
                    foreach ($comments as $comment):
                ?>
                    <div class="comment-item">
                        <div class="comment-author"><?php echo esc_html($comment['name']); ?></div>
                        <div class="comment-date"><?php echo esc_html($comment['date']); ?></div>
                        <div class="comment-content"><?php echo esc_html($comment['text']); ?></div>
                    </div>
                <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>
        
        <div class="disclaimer">
            <strong>Disclaimer:</strong> We are not responsible for any content linked from this site. We do not host any files; all links lead to content hosted on third-party websites, which are independently sourced from the internet. We merely provide an index of these publicly available links.
        </div>
        
    <?php endwhile; ?>
</div>

<script>
document.getElementById('commentForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    
    fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Comment posted successfully!');
            location.reload();
        } else {
            alert('Error posting comment: ' + data.message);
        }
    });
});
</script>

<?php get_footer(); ?>
