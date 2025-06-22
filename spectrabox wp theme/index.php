<?php get_header(); ?>

<!-- Hero Section -->
<section class="spectra-hero">
    <div class="hero-container">
        <div class="hero-badges">
            <span class="spectra-badge badge-trending">
                🔥 #1 Trending Now
            </span>
            <span class="spectra-badge badge-premium">
                👑 Premium Quality
            </span>
        </div>
        <h1 class="hero-title">
            Download
            <span class="gradient-text">Premium Content</span>
        </h1>
        <p class="hero-description">
            Experience the ultimate entertainment destination with 4K movies, premium series, and exclusive content in multiple languages.
        </p>
        <div class="hero-buttons">
            <a href="#movies" class="spectra-btn btn-primary btn-large">
                ⬇️ Start Downloading
            </a>
            <a href="#" class="spectra-btn btn-outline btn-large">
                ▶️ Watch Trailer
            </a>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="spectra-stats">
    <div class="stats-container">
        <div class="stat-item">
            <div class="stat-number">2.5K+</div>
            <div class="stat-label">Movies</div>
        </div>
        <div class="stat-item">
            <div class="stat-number">850+</div>
            <div class="stat-label">TV Series</div>
        </div>
        <div class="stat-item">
            <div class="stat-number">4K UHD</div>
            <div class="stat-label">Quality</div>
        </div>
        <div class="stat-item">
            <div class="stat-number">24/7</div>
            <div class="stat-label">Updates</div>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="spectra-content" id="movies">
    <div class="content-container">
        <div class="section-header">
            <div>
                <h2 class="section-title">Latest Releases</h2>
                <p class="section-subtitle">Discover the newest movies and series</p>
            </div>
            <a href="<?php echo home_url('/movies'); ?>" class="spectra-btn btn-outline">
                View All →
            </a>
        </div>

        <!-- Movies Grid -->
        <div class="movies-grid">
            <?php
            // Sample movies data (you can replace this with actual WordPress posts)
            $sample_movies = array(
                array(
                    'title' => 'Final Destination Bloodlines',
                    'year' => '2025',
                    'rating' => '7.2',
                    'size' => '3.2GB',
                    'genres' => array('Horror', 'Thriller'),
                    'audio' => array('Hindi', 'English', 'Tamil'),
                    'quality' => '4K UHD',
                    'views' => '127K',
                    'image' => 'https://via.placeholder.com/400x600/1a1a2e/ffffff?text=Final+Destination'
                ),
                array(
                    'title' => 'Good Boy',
                    'year' => '2025',
                    'rating' => '8.1',
                    'size' => '1.8GB',
                    'genres' => array('Comedy', 'Drama'),
                    'audio' => array('Hindi', 'English', 'Korean'),
                    'quality' => '1080p',
                    'views' => '89K',
                    'image' => 'https://via.placeholder.com/400x600/1a1a2e/ffffff?text=Good+Boy'
                ),
                array(
                    'title' => 'Poker Face',
                    'year' => '2023',
                    'rating' => '7.8',
                    'size' => '3.2GB',
                    'genres' => array('Crime', 'Drama'),
                    'audio' => array('Hindi', 'English'),
                    'quality' => '4K UHD',
                    'views' => '156K',
                    'image' => 'https://via.placeholder.com/400x600/1a1a2e/ffffff?text=Poker+Face'
                ),
                array(
                    'title' => 'The Monkey',
                    'year' => '2025',
                    'rating' => '6.9',
                    'size' => '2.1GB',
                    'genres' => array('Horror', 'Thriller'),
                    'audio' => array('Hindi', 'English'),
                    'quality' => '4K UHD',
                    'views' => '92K',
                    'image' => 'https://via.placeholder.com/400x600/1a1a2e/ffffff?text=The+Monkey'
                ),
                array(
                    'title' => 'Peaky Blinders',
                    'year' => '2013-2022',
                    'rating' => '8.8',
                    'size' => '15.2GB',
                    'genres' => array('Crime', 'Drama'),
                    'audio' => array('Hindi', 'English'),
                    'quality' => '4K UHD',
                    'views' => '2.8M',
                    'image' => 'https://via.placeholder.com/400x600/1a1a2e/ffffff?text=Peaky+Blinders'
                ),
                array(
                    'title' => 'October Sky',
                    'year' => '1999',
                    'rating' => '7.8',
                    'size' => '1.3GB',
                    'genres' => array('Drama', 'Biography'),
                    'audio' => array('English', 'Hindi'),
                    'quality' => '1080p',
                    'views' => '67K',
                    'image' => 'https://via.placeholder.com/400x600/1a1a2e/ffffff?text=October+Sky'
                ),
                array(
                    'title' => 'Breaking Bad',
                    'year' => '2008-2013',
                    'rating' => '9.5',
                    'size' => '45.2GB',
                    'genres' => array('Crime', 'Drama'),
                    'audio' => array('Hindi', 'English'),
                    'quality' => '4K UHD',
                    'views' => '5.2M',
                    'image' => 'https://via.placeholder.com/400x600/1a1a2e/ffffff?text=Breaking+Bad'
                ),
                array(
                    'title' => 'Dune: Part Two',
                    'year' => '2024',
                    'rating' => '8.5',
                    'size' => '4.8GB',
                    'genres' => array('Sci-Fi', 'Adventure'),
                    'audio' => array('Hindi', 'English'),
                    'quality' => '4K UHD',
                    'views' => '892K',
                    'image' => 'https://via.placeholder.com/400x600/1a1a2e/ffffff?text=Dune+Part+Two'
                )
            );

            foreach ($sample_movies as $index => $movie) :
            ?>
            
            <article class="movie-card">
                <div class="movie-poster">
                    <img src="<?php echo esc_url($movie['image']); ?>" alt="<?php echo esc_attr($movie['title']); ?>">
                    
                    <div class="movie-overlay">
                        <div class="movie-actions">
                            <a href="<?php echo home_url('/movie/' . sanitize_title($movie['title'])); ?>" class="spectra-btn btn-primary">
                                ⬇️ Download
                            </a>
                            <div>
                                <button class="spectra-btn btn-outline" style="padding: 8px;">❤️</button>
                                <button class="spectra-btn btn-outline" style="padding: 8px;">📤</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="movie-badges">
                        <span class="spectra-badge badge-premium"><?php echo esc_html($movie['quality']); ?></span>
                        <?php if ($index < 3) : ?>
                            <span class="spectra-badge badge-trending">🔥 HOT</span>
                        <?php endif; ?>
                    </div>
                    
                    <div class="movie-rating">
                        ⭐ <span><?php echo esc_html($movie['rating']); ?></span>
                    </div>
                    
                    <div class="movie-views">
                        👁️ <span><?php echo esc_html($movie['views']); ?></span>
                    </div>
                </div>
                
                <div class="movie-info">
                    <h3 class="movie-title">
                        <a href="<?php echo home_url('/movie/' . sanitize_title($movie['title'])); ?>">
                            <?php echo esc_html($movie['title']); ?>
                        </a>
                    </h3>
                    
                    <div class="movie-meta">
                        <span class="movie-year"><?php echo esc_html($movie['year']); ?></span>
                        <span class="movie-size"><?php echo esc_html($movie['size']); ?></span>
                    </div>
                    
                    <div class="movie-genres">
                        <?php foreach (array_slice($movie['genres'], 0, 2) as $genre) : ?>
                            <span class="genre-tag"><?php echo esc_html($genre); ?></span>
                        <?php endforeach; ?>
                    </div>
                    
                    <div class="movie-audio">
                        <?php foreach (array_slice($movie['audio'], 0, 3) as $lang) : ?>
                            <span class="audio-tag"><?php echo esc_html($lang); ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </article>
            
            <?php endforeach; ?>
        </div>

        <!-- Load More -->
        <div class="load-more">
            <button class="btn-load-more" onclick="loadMoreMovies()">
                Load More Content ⚡
            </button>
        </div>
    </div>
</section>

<script>
function loadMoreMovies() {
    alert('Load more functionality will be implemented with WordPress AJAX!');
}
</script>

<?php get_footer(); ?>
