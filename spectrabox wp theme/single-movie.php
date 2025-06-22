<?php get_header(); ?>

<?php while (have_posts()) : the_post(); 
    $rating = get_post_meta(get_the_ID(), '_movie_rating', true);
    $year = get_post_meta(get_the_ID(), '_movie_year', true);
    $quality = get_post_meta(get_the_ID(), '_movie_quality', true);
    $audio = get_post_meta(get_the_ID(), '_movie_audio', true);
    $file_size = get_post_meta(get_the_ID(), '_movie_size', true);
    $genre = get_post_meta(get_the_ID(), '_movie_genre', true);
    $views = get_post_meta(get_the_ID(), '_movie_views', true);
    $download_links = get_post_meta(get_the_ID(), '_download_links', true);
    $poster = get_the_post_thumbnail_url(get_the_ID(), 'full');
?>

<div style="min-height: 100vh; background: linear-gradient(135deg, #1a1a2e 0%, #000000 50%, #1a1a2e 100%); position: relative; overflow: hidden;">
    <!-- Animated Background -->
    <div style="position: fixed; top: -200px; right: -200px; width: 400px; height: 400px; background: radial-gradient(circle, rgba(147, 51, 234, 0.1) 0%, transparent 70%); border-radius: 50%; animation: pulse 4s ease-in-out infinite; z-index: -1;"></div>
    <div style="position: fixed; bottom: -200px; left: -200px; width: 400px; height: 400px; background: radial-gradient(circle, rgba(59, 130, 246, 0.1) 0%, transparent 70%); border-radius: 50%; animation: pulse 4s ease-in-out infinite 2s; z-index: -1;"></div>

    <!-- Back Button -->
    <div style="padding: 20px 0; background: rgba(0,0,0,0.3); backdrop-filter: blur(10px);">
        <div style="max-width: 1400px; margin: 0 auto; padding: 0 24px;">
            <a href="<?php echo home_url(); ?>" style="display: inline-flex; align-items: center; gap: 8px; color: #d1d5db; text-decoration: none; font-weight: 600; transition: color 0.3s ease;">
                ← Back to Home
            </a>
        </div>
    </div>

    <!-- Hero Section -->
    <section style="position: relative; overflow: hidden; padding: 60px 0;">
        <div style="position: relative; z-index: 2; max-width: 1400px; margin: 0 auto; padding: 0 24px;">
            <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 48px; align-items: start;">
                
                <!-- Movie Poster -->
                <div style="text-align: center;">
                    <?php if ($poster): ?>
                        <img src="<?php echo esc_url($poster); ?>" style="width: 100%; max-width: 400px; border-radius: 24px; box-shadow: 0 25px 50px rgba(0,0,0,0.5);" alt="<?php the_title(); ?>">
                    <?php else: ?>
                        <div style="width: 100%; max-width: 400px; height: 600px; background: linear-gradient(135deg, #9333ea, #06b6d4); border-radius: 24px; display: flex; align-items: center; justify-content: center; color: white; font-size: 24px; font-weight: bold; margin: 0 auto;">
                            <?php echo esc_html(get_the_title()); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Movie Details -->
                <div>
                    <div style="display: flex; flex-wrap: wrap; gap: 12px; margin-bottom: 24px;">
                        <span style="background: linear-gradient(135deg, #ef4444, #ec4899); color: white; padding: 8px 16px; border-radius: 50px; font-size: 12px; font-weight: 700;">Featured Movie</span>
                        <?php if ($quality && strpos($quality, '4K') !== false): ?>
                            <span style="background: linear-gradient(135deg, #10b981, #059669); color: white; padding: 8px 16px; border-radius: 50px; font-size: 12px; font-weight: 700;">4K Available</span>
                        <?php endif; ?>
                    </div>

                    <h1 style="font-size: 48px; font-weight: 900; color: white; margin-bottom: 16px; line-height: 1.1;"><?php the_title(); ?></h1>
                    
                    <?php if (get_the_content()): ?>
                        <p style="font-size: 18px; color: #d1d5db; margin-bottom: 32px; line-height: 1.6;"><?php echo wp_trim_words(get_the_content(), 30); ?></p>
                    <?php else: ?>
                        <p style="font-size: 18px; color: #d1d5db; margin-bottom: 32px; line-height: 1.6;">Experience this amazing movie in high quality with multiple download options available.</p>
                    <?php endif; ?>

                    <!-- Stats Grid -->
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(120px, 1fr)); gap: 16px; margin-bottom: 32px;">
                        <?php if ($rating): ?>
                        <div style="text-align: center; padding: 16px; background: rgba(255,255,255,0.1); border-radius: 16px; backdrop-filter: blur(10px);">
                            <div style="color: #fbbf24; font-size: 20px; margin-bottom: 8px;">⭐</div>
                            <div style="font-size: 24px; font-weight: 900; color: white;"><?php echo esc_html($rating); ?></div>
                            <div style="font-size: 10px; color: #9ca3af;">Rating</div>
                        </div>
                        <?php endif; ?>
                        
                        <?php if ($year): ?>
                        <div style="text-align: center; padding: 16px; background: rgba(255,255,255,0.1); border-radius: 16px; backdrop-filter: blur(10px);">
                            <div style="color: #60a5fa; font-size: 20px; margin-bottom: 8px;">📅</div>
                            <div style="font-size: 24px; font-weight: 900; color: white;"><?php echo esc_html($year); ?></div>
                            <div style="font-size: 10px; color: #9ca3af;">Year</div>
                        </div>
                        <?php endif; ?>
                        
                        <?php if ($views): ?>
                        <div style="text-align: center; padding: 16px; background: rgba(255,255,255,0.1); border-radius: 16px; backdrop-filter: blur(10px);">
                            <div style="color: #a855f7; font-size: 20px; margin-bottom: 8px;">👁️</div>
                            <div style="font-size: 24px; font-weight: 900; color: white;"><?php echo esc_html($views); ?></div>
                            <div style="font-size: 10px; color: #9ca3af;">Views</div>
                        </div>
                        <?php endif; ?>
                        
                        <?php if ($file_size): ?>
                        <div style="text-align: center; padding: 16px; background: rgba(255,255,255,0.1); border-radius: 16px; backdrop-filter: blur(10px);">
                            <div style="color: #ec4899; font-size: 20px; margin-bottom: 8px;">💾</div>
                            <div style="font-size: 24px; font-weight: 900; color: white;"><?php echo esc_html($file_size); ?></div>
                            <div style="font-size: 10px; color: #9ca3af;">Size</div>
                        </div>
                        <?php endif; ?>
                    </div>

                    <!-- Action Buttons -->
                    <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 32px; flex-wrap: wrap;">
                        <a href="#download" style="background: linear-gradient(135deg, #9333ea, #06b6d4); color: white; padding: 16px 32px; border-radius: 50px; text-decoration: none; font-weight: 700; font-size: 16px; display: flex; align-items: center; gap: 8px; box-shadow: 0 8px 25px rgba(147, 51, 234, 0.3); transition: transform 0.3s ease;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
                            ⬇️ Download Now
                        </a>
                        <a href="#" style="border: 1px solid rgba(255,255,255,0.3); color: white; padding: 16px 32px; border-radius: 50px; text-decoration: none; font-weight: 700; font-size: 16px; display: flex; align-items: center; gap: 8px; transition: background 0.3s ease;" onmouseover="this.style.background='rgba(255,255,255,0.1)'" onmouseout="this.style.background='transparent'">
                            ▶️ Watch Trailer
                        </a>
                    </div>

                    <!-- Movie Info -->
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 24px;">
                        <?php if ($genre): ?>
                        <div>
                            <h4 style="color: white; font-weight: 700; margin-bottom: 8px; font-size: 14px;">Genre:</h4>
                            <p style="color: #d1d5db; margin: 0;"><?php echo esc_html($genre); ?></p>
                        </div>
                        <?php endif; ?>
                        
                        <?php if ($quality): ?>
                        <div>
                            <h4 style="color: white; font-weight: 700; margin-bottom: 8px; font-size: 14px;">Quality:</h4>
                            <p style="color: #d1d5db; margin: 0;"><?php echo esc_html($quality); ?></p>
                        </div>
                        <?php endif; ?>
                        
                        <?php if ($audio): ?>
                        <div>
                            <h4 style="color: white; font-weight: 700; margin-bottom: 8px; font-size: 14px;">Audio:</h4>
                            <p style="color: #d1d5db; margin: 0;"><?php echo esc_html($audio); ?></p>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Download Section -->
    <section id="download" style="padding: 60px 0; background: rgba(255,255,255,0.02);">
        <div style="max-width: 1000px; margin: 0 auto; padding: 0 24px;">
            <div style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 24px; padding: 48px; backdrop-filter: blur(10px);">
                <h2 style="font-size: 36px; font-weight: 900; color: white; text-align: center; margin-bottom: 32px;">
                    Download <?php the_title(); ?> <?php echo $year ? '(' . esc_html($year) . ')' : ''; ?>
                </h2>

                <!-- Download Options -->
                <div style="border: 1px solid rgba(255,255,255,0.2); border-radius: 16px; padding: 32px; background: linear-gradient(135deg, rgba(255,255,255,0.05), rgba(255,255,255,0.1)); backdrop-filter: blur(10px);">
                    <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 24px; flex-wrap: wrap; gap: 16px;">
                        <div>
                            <h4 style="font-size: 24px; font-weight: 700; color: white; margin-bottom: 12px;">
                                <?php the_title(); ?> <?php echo $quality ? '(' . esc_html(explode(',', $quality)[0]) . ')' : ''; ?>
                            </h4>
                            <div style="display: flex; gap: 12px; flex-wrap: wrap;">
                                <?php if ($quality): ?>
                                    <span style="background: linear-gradient(135deg, #10b981, #059669); color: white; padding: 8px 16px; border-radius: 50px; font-size: 12px; font-weight: 700;"><?php echo esc_html(explode(',', $quality)[0]); ?></span>
                                <?php endif; ?>
                                <span style="background: linear-gradient(135deg, #3b82f6, #06b6d4); color: white; padding: 8px 16px; border-radius: 50px; font-size: 12px; font-weight: 700;">WEB-DL</span>
                            </div>
                        </div>
                        <?php if ($file_size): ?>
                        <div style="text-align: right;">
                            <div style="font-size: 28px; font-weight: 900; color: white;"><?php echo esc_html($file_size); ?></div>
                            <div style="font-size: 12px; color: #9ca3af;">File Size</div>
                        </div>
                        <?php endif; ?>
                    </div>

                    <!-- Technical Details -->
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 24px; margin-bottom: 24px;">
                        <div>
                            <span style="color: #9ca3af; display: block; margin-bottom: 8px; font-weight: 600; font-size: 12px;">Format:</span>
                            <span style="color: white; font-weight: 700; font-size: 16px;">x264 BluRay</span>
                        </div>
                        <?php if ($audio): ?>
                        <div>
                            <span style="color: #9ca3af; display: block; margin-bottom: 8px; font-weight: 600; font-size: 12px;">Audio:</span>
                            <span style="color: white; font-weight: 700; font-size: 16px;"><?php echo esc_html($audio); ?></span>
                        </div>
                        <?php endif; ?>
                        <div>
                            <span style="color: #9ca3af; display: block; margin-bottom: 8px; font-weight: 600; font-size: 12px;">Subtitles:</span>
                            <span style="color: white; font-weight: 700; font-size: 16px;">ESubs</span>
                        </div>
                    </div>

                    <!-- Download Links -->
                    <div style="margin-bottom: 16px;">
                        <h5 style="color: white; font-weight: 700; margin-bottom: 16px; font-size: 16px;">Download Links:</h5>
                    </div>
                    
                    <?php if ($download_links): ?>
                        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 12px;">
                            <?php 
                            $links = explode("\n", $download_links);
                            $colors = array(
                                'google' => 'linear-gradient(135deg, #9333ea, #3b82f6)',
                                'mega' => 'linear-gradient(135deg, #10b981, #14b8a6)',
                                'mediafire' => 'linear-gradient(135deg, #ef4444, #ec4899)',
                                'default' => 'linear-gradient(135deg, #6b7280, #4b5563)'
                            );
                            
                            foreach ($links as $link) {
                                if (trim($link)) {
                                    $parts = explode(':', trim($link), 2);
                                    if (count($parts) == 2) {
                                        $server = trim($parts[0]);
                                        $url = trim($parts[1]);
                                        $server_lower = strtolower($server);
                                        
                                        $color = $colors['default'];
                                        if (strpos($server_lower, 'google') !== false || strpos($server_lower, 'drive') !== false) {
                                            $color = $colors['google'];
                                        } elseif (strpos($server_lower, 'mega') !== false) {
                                            $color = $colors['mega'];
                                        } elseif (strpos($server_lower, 'mediafire') !== false) {
                                            $color = $colors['mediafire'];
                                        }
                                        ?>
                                        <a href="<?php echo esc_url($url); ?>" target="_blank" style="background: <?php echo $color; ?>; color: white; padding: 14px 20px; border-radius: 50px; text-decoration: none; font-weight: 700; text-align: center; display: flex; align-items: center; justify-content: center; gap: 8px; transition: transform 0.3s ease;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
                                            ⬇️ <?php echo esc_html($server); ?>
                                        </a>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </div>
                    <?php else: ?>
                        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 12px;">
                            <a href="#" style="background: linear-gradient(135deg, #9333ea, #3b82f6); color: white; padding: 14px 20px; border-radius: 50px; text-decoration: none; font-weight: 700; text-align: center; display: flex; align-items: center; justify-content: center; gap: 8px; transition: transform 0.3s ease;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
                                ⬇️ Google Drive
                            </a>
                            <a href="#" style="background: linear-gradient(135deg, #10b981, #14b8a6); color: white; padding: 14px 20px; border-radius: 50px; text-decoration: none; font-weight: 700; text-align: center; display: flex; align-items: center; justify-content: center; gap: 8px; transition: transform 0.3s ease;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
                                ⬇️ Mega
                            </a>
                            <a href="#" style="background: linear-gradient(135deg, #ef4444, #ec4899); color: white; padding: 14px 20px; border-radius: 50px; text-decoration: none; font-weight: 700; text-align: center; display: flex; align-items: center; justify-content: center; gap: 8px; transition: transform 0.3s ease;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
                                ⬇️ MediaFire
                            </a>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Additional Info -->
                <div style="margin-top: 32px; padding: 24px; background: rgba(255,255,255,0.05); border-radius: 16px; text-align: center;">
                    <p style="color: #9ca3af; margin: 0; font-size: 14px;">
                        📱 <strong>Mobile Users:</strong> Use IDM+ or ADM for faster downloads<br>
                        💻 <strong>PC Users:</strong> Use IDM or Free Download Manager<br>
                        🔒 <strong>Note:</strong> All files are scanned and safe to download
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Movies -->
    <section style="padding: 60px 0;">
        <div style="max-width: 1400px; margin: 0 auto; padding: 0 24px;">
            <h3 style="font-size: 32px; font-weight: 900; color: white; text-align: center; margin-bottom: 48px;">Related Movies</h3>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 24px; max-width: 1000px; margin: 0 auto;">
                <?php
                // Get related movies
                $related_movies = new WP_Query(array(
                    'post_type' => 'movie',
                    'posts_per_page' => 4,
                    'post__not_in' => array(get_the_ID()),
                    'orderby' => 'rand'
                ));
                
                if ($related_movies->have_posts()) :
                    while ($related_movies->have_posts()) : $related_movies->the_post();
                        $related_poster = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                        $related_rating = get_post_meta(get_the_ID(), '_movie_rating', true);
                        $related_year = get_post_meta(get_the_ID(), '_movie_year', true);
                ?>
                <a href="<?php the_permalink(); ?>" style="text-decoration: none; color: white; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    <div style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 16px; overflow: hidden; backdrop-filter: blur(10px);">
                        <?php if ($related_poster): ?>
                            <img src="<?php echo esc_url($related_poster); ?>" style="width: 100%; height: 250px; object-fit: cover;" alt="<?php the_title(); ?>">
                        <?php else: ?>
                            <div style="width: 100%; height: 250px; background: linear-gradient(135deg, #9333ea, #06b6d4); display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; text-align: center; padding: 20px;">
                                <?php echo esc_html(get_the_title()); ?>
                            </div>
                        <?php endif; ?>
                        <div style="padding: 16px;">
                            <h4 style="font-size: 14px; font-weight: 700; margin-bottom: 8px; line-height: 1.3;"><?php the_title(); ?></h4>
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <?php if ($related_year): ?>
                                    <span style="color: #9ca3af; font-size: 12px;"><?php echo esc_html($related_year); ?></span>
                                <?php endif; ?>
                                <?php if ($related_rating): ?>
                                    <span style="color: #fbbf24; font-size: 12px;">⭐ <?php echo esc_html($related_rating); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </a>
                <?php 
                    endwhile; 
                    wp_reset_postdata();
                else: 
                ?>
                <div style="grid-column: 1 / -1; text-align: center; color: #9ca3af; padding: 40px;">
                    <p>No related movies found. <a href="<?php echo home_url(); ?>" style="color: #a855f7;">Browse all movies</a></p>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
</div>

<!-- Smooth Scroll Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
});
</script>

<?php endwhile; ?>

<?php get_footer(); ?>
