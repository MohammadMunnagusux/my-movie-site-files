<?php if ( get_theme_mod('entertainment_media_featured_movies_section_enable') ) : ?>

<div class="featured_movies py-5">
	<div class="container">
		<?php if ( get_theme_mod('entertainment_media_featured_movies_heading') ) : ?>
			<h3 class="pb-4"><?php echo esc_html(get_theme_mod('entertainment_media_featured_movies_heading')); ?></h3>
		<?php endif; ?>
        <?php $entertainment_media_args = array(
			'post_type' => 'post',
			'post_status' => 'publish',
			'category_name' =>  get_theme_mod('entertainment_media_featured_moviess_category'),
			'posts_per_page' => 9,
		); ?>
		<div class="row">
		    <?php $entertainment_media_arr_posts = new WP_Query( $entertainment_media_args );
		    	if ( $entertainment_media_arr_posts->have_posts() ) :
		      	while ( $entertainment_media_arr_posts->have_posts() ) :
		        $entertainment_media_arr_posts->the_post();
		        ?>
		        <div class="col-lg-3 col-md-6 col-sm-6">
		        	<div class="box mb-4 wow zoomIn">
		               <?php
				            if ( has_post_thumbnail() ) :
				              the_post_thumbnail();
				            else:
				              ?>
				              <div class="slider-alternate">
				                <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/banner.png'; ?>">
				              </div>
				              <?php
				            endif;
				          ?>
		                <div class="box-content">
	                        <h4 class="title"><?php the_title(); ?></h4>
	                        <p class="post"><?php echo wp_trim_words( get_the_content(), get_theme_mod('entertainment_media_post_excerpt_number',10) ); ?></p>
	                        <a class="icon" href="<?php the_permalink(); ?>"><?php esc_html_e('Play Now','entertainment-media'); ?></a>
		                </div>
		            </div>
			    </div>
		      	<?php
		    endwhile;
		    wp_reset_postdata();
		    endif; ?>
		</div>
	</div>
</div>

<?php endif; ?>
