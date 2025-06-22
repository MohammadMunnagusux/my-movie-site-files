<footer class="spectra-footer">
    <div class="footer-container">
        <div class="footer-brand">
            <a href="<?php echo home_url(); ?>" class="footer-logo">
                <div class="logo-icon">✨</div>
                <div class="logo-text">
                    <h3 style="font-size: 32px; font-weight: 900; background: linear-gradient(135deg, #a855f7, #ec4899, #06b6d4); -webkit-background-clip: text; -webkit-text-fill-color: transparent; margin: 0;">SpectraBox</h3>
                    <p style="font-size: 10px; color: #9ca3af; font-weight: 600; letter-spacing: 2px; margin: 0;">PREMIUM DOWNLOADS</p>
                </div>
            </a>
            <p class="footer-description">
                Your ultimate destination for premium entertainment. Download the latest movies and TV series in stunning 4K quality with multi-language support.
            </p>
            <div class="footer-social">
                <a href="#" class="spectra-btn btn-primary">
                    📱 Telegram
                </a>
            </div>
        </div>
        
        <div>
            <h4 class="footer-title">Categories</h4>
            <ul class="footer-links">
                <li><a href="<?php echo home_url('/4k-movies'); ?>">4K Movies</a></li>
                <li><a href="<?php echo home_url('/1080p-movies'); ?>">1080p Movies</a></li>
                <li><a href="<?php echo home_url('/tv-series'); ?>">TV Series</a></li>
                <li><a href="<?php echo home_url('/dual-audio'); ?>">Dual Audio</a></li>
            </ul>
        </div>
        
        <div>
            <h4 class="footer-title">Genres</h4>
            <ul class="footer-links">
                <li><a href="<?php echo home_url('/genre/action'); ?>">Action</a></li>
                <li><a href="<?php echo home_url('/genre/comedy'); ?>">Comedy</a></li>
                <li><a href="<?php echo home_url('/genre/horror'); ?>">Horror</a></li>
                <li><a href="<?php echo home_url('/genre/thriller'); ?>">Thriller</a></li>
            </ul>
        </div>
    </div>
    
    <div class="footer-bottom">
        <p>&copy; 2025 SpectraBox. All rights reserved. Educational purposes only.</p>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
