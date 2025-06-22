<?php get_header(); ?>

<?php while (have_posts()) : the_post(); 
    $rating = get_field('rating');
    $year = get_field('year');
    $quality = get_field('quality');
    $audio = get_field('audio_languages');
    $file_size = get_field('file_size');
    $genre = get_field('genre');
    $views = get_field('views');
    $poster = get_field('poster_image');
    $backdrop = get_field('backdrop_image');
    $download_links = get_field('download_links');
?>

<div style="min-height: 100vh; background: linear-gradient(135deg, #1a1a2e 0%, #000000 50%, #1a1a2e 100%); position: relative; overflow: hidden;">
    <!-- Animated Background -->
    <div style="position: fixed; top: -200px; right: -200px; width: 400px; height: 400px; background: radial-gradient(circle, rgba(147, 51, 234, 0.1) 0%, transparent 70%); border-radius: 50%; animation: pulse 4s ease-in-out infinite; z-index: -1;"></div>
    <div style="position: fixed; bottom: -200px; left: -200px; width: 400px; height: 400px; background: radial-gradient(circle, rgba(59, 130, 246, 0.1) 0%, transparent 70%); border-radius: 50%; animation: pulse 4s ease-in-out infinite 2s; z-index: -1;"></div>

    <!-- Hero Section -->
    <section style="position: relative; overflow: hidden; padding: 80px 0;">
        <?php if ($backdrop): ?>
            <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(to right, rgba(0,0,0,0.8), rgba(0,0,0,0.4)); z-index: 1;"></div>
            <img src="<?php echo esc_url($backdrop['url']); ?>" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; opacity: 0.3; z-index: 0;" alt="<?php the_title(); ?>">
        <?php endif; ?>
        
        <div style="position: relative; z-index: 2; max-width: 1400px; margin: 0 auto; padding: 0 24px;">
            <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 48px; align-items: center;">
                <div>
                    <?php if ($poster): ?>
                        <img src="<?php echo esc_url($poster['url']); ?>" style="width: 100%; max-width: 400px; border-radius: 24px; box-shadow: 0 25px 50px rgba(0,0,0,0.5);" alt="<?php the_title(); ?>">
                    <?php endif; ?>
                </div>

                <div>
                    <div style="display: flex; flex-wrap: wrap; gap: 12px; margin-bottom: 24px;">
                        <span style="background: linear-gradient(135deg, #ef4444, #ec4899); color: white; padding: 8px 16px; border-radius: 50px; font-size: 12px; font-weight: 700;">Featured Movie</span>
                        <span style="background: linear-gradient(135deg, #10b981, #059669); color: white; padding: 8px 16px; border-radius: 50px; font-size: 12px; font-weight: 700;">4K Available</span>
                    </div>

                    <h1 style="font-size: 64px; font-weight: 900; color: white; margin-bottom: 16px; line-height: 1.1;"><?php the_title(); ?></h1>
                    <p style="font-size: 20px; color: #d1d5db; margin-bottom: 32px; line-height: 1.6;"><?php the_content(); ?></p>

                    <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 24px; margin-bottom: 32px;">
                        <?php if ($rating): ?>
                        <div style="text-align: center; padding: 16px; background: rgba(255,255,255,0.1); border-radius: 16px; backdrop-filter: blur(10px);">
                            <div style="color: #fbbf24; font-size: 24px; margin-bottom: 8px;">⭐</div>
                            <div style="font-size: 32px; font-weight: 900; color: white;"><?php echo esc_html($rating); ?></div>
                            <div style="font-size: 12px; color: #9ca3af;">Rating</div>
                        </div>
                        <?php endif; ?>
                        
                        <?php if ($year): ?>
                        <div style="text-align: center; padding: 16px; background: rgba(255,255,255,0.1); border-radius: 16px; backdrop-filter: blur(10px);">
                            <div style="color: #60a5fa; font-size: 24px; margin-bottom: 8px;">📅</div>
                            <div style="font-size: 32px; font-weight: 900; color: white;"><?php echo esc_html($year); ?></div>
                            <div style="font-size: 12px; color: #9ca3af;">Year</div>
                        </div>
                        <?php endif; ?>
                        
                        <?php if ($views): ?>
                        <div style="text-align: center; padding: 16px; background: rgba(255,255,255,0.1); border-radius: 16px; backdrop-filter: blur(10px);">
                            <div style="color: #a855f7; font-size: 24px; margin-bottom: 8px;">👁️</div>
                            <div style="font-size: 32px; font-weight: 900; color: white;"><?php echo esc_html($views); ?></div>
                            <div style="font-size: 12px; color: #9ca3af;">Views</div>
                        </div>
                        <?php endif; ?>
                        
                        <div style="text-align: center; padding: 16px; background: rgba(255,255,255,0.1); border-radius: 16px; backdrop-filter: blur(10px);">
                            <div style="color: #ec4899; font-size: 24px; margin-bottom: 8px;">❤️</div>
                            <div style="font-size: 32px; font-weight: 900; color: white;">8.2K</div>
                            <div style="font-size: 12px; color: #9ca3af;">Likes</div>
                        </div>
                    </div>

                    <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 32px;">
                        <a href="#download" style="background: linear-gradient(135deg, #9333ea, #06b6d4); color: white; padding: 16px 32px; border-radius: 50px; text-decoration: none; font-weight: 700; font-size: 18px; display: flex; align-items: center; gap: 8px; box-shadow: 0 8px 25px rgba(147, 51, 234, 0.3);">
                            ⬇️ Download Now
                        </a>
                        <a href="#" style="border: 1px solid rgba(255,255,255,0.3); color: white; padding: 16px 32px; border-radius: 50px; text-decoration: none; font-weight: 700; font-size: 18px; display: flex; align-items: center; gap: 8px;">
                            ▶️ Watch Trailer
                        </a>
                    </div>

                    <?php if ($genre): ?>
                    <div style="margin-bottom: 16px;">
                        <h4 style="color: white; font-weight: 700; margin-bottom: 8px;">Genre:</h4>
                        <p style="color: #d1d5db;"><?php echo esc_html($genre); ?></p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Download Section -->
    <section id="download" style="padding: 80px 0;">
        <div style="max-width: 1000px; margin: 0 auto; padding: 0 24px;">
            <div style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 24px; padding: 48px; backdrop-filter: blur(10px);">
                <h2 style="font-size: 48px; font-weight: 900; color: white; text-align: center; margin-bottom: 32px;">
                    Download <?php the_title(); ?> (<?php echo esc_html($year); ?>)
                </h2>

                <?php if ($download_links): ?>
                    <?php foreach ($download_links as $link): ?>
                    <div style="border: 1px solid rgba(255,255,255,0.2); border-radius: 16px; padding: 32px; margin-bottom: 24px; background: linear-gradient(135deg, rgba(255,255,255,0.05), rgba(255,255,255,0.1)); backdrop-filter: blur(10px);">
                        <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 24px;">
                            <div>
                                <h4 style="font-size: 24px; font-weight: 700; color: white; margin-bottom: 12px;">
                                    <?php the_title(); ?> (<?php echo esc_html($link['quality']); ?>)
                                </h4>
                                <div style="display: flex; gap: 16px;">
                                    <span style="background: linear-gradient(135deg, #10b981, #059669); color: white; padding: 8px 16px; border-radius: 50px; font-size: 12px; font-weight: 700;"><?php echo esc_html($link['quality']); ?></span>
                                    <span style="background: linear-gradient(135deg, #3b82f6, #06b6d4); color: white; padding: 8px 16px; border-radius: 50px; font-size: 12px; font-weight: 700;"><?php echo esc_html($link['type']); ?></span>
                                </div>
                            </div>
                            <div style="text-align: right;">
                                <div style="font-size: 32px; font-weight: 900; color: white;"><?php echo esc_html($link['size']); ?></div>
                                <div style="font-size: 12px; color: #9ca3af;">File Size</div>
                            </div>
                        </div>

                        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; margin-bottom: 24px;">
                            <div>
                                <span style="color: #9ca3af; display: block; margin-bottom: 8px; font-weight: 600;">Format:</span>
                                <span style="color: white; font-weight: 700; font-size: 18px;"><?php echo esc_html($link['format']); ?></span>
                            </div>
                            <div>
                                <span style="color: #9ca3af; display: block; margin-bottom: 8px; font-weight: 600;">Audio:</span>
                                <span style="color: white; font-weight: 700; font-size: 18px;"><?php echo esc_html($link['audio']); ?></span>
                            </div>
                            <div>
                                <span style="color: #9ca3af; display: block; margin-bottom: 8px; font-weight: 600;">Subtitles:</span>
                                <span style="color: white; font-weight: 700; font-size: 18px;"><?php echo esc_html($link['subtitles']); ?></span>
                            </div>
                        </div>

                        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px;">
                            <a href="<?php echo esc_url($link['google_drive']); ?>" style="background: linear-gradient(135deg, #9333ea, #3b82f6); color: white; padding: 16px; border-radius: 50px; text-decoration: none; font-weight: 700; text-align: center; display: flex; align-items: center; justify-content: center; gap: 8px;">
                                ⬇️ Google Drive
                            </a>
                            <a href="<?php echo esc_url($link['mega']); ?>" style="background: linear-gradient(135deg, #10b981, #14b8a6); color: white; padding: 16px; border-radius: 50px; text-decoration: none; font-weight: 700; text-align: center; display: flex; align-items: center; justify-content: center; gap: 8px;">
                                ⬇️ Mega
                            </a>
                            <a href="<?php echo esc_url($link['mediafire']); ?>" style="background: linear-gradient(135deg, #ef4444, #ec4899); color: white; padding: 16px; border-radius: 50px; text-decoration: none; font-weight: 700; text-align: center; display: flex; align-items: center; justify-content: center; gap: 8px;">
                                ⬇️ MediaFire
                            </a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
</div>

<?php endwhile; ?>

<?php get_footer(); ?>
