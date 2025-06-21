<?php if ( get_theme_mod('entertainment_media_slider_box_enable', true) == true ) : ?>
<div id="slider">
  <div class="slider">
    <?php
    $entertainment_media_slider_image = get_theme_mod('entertainment_media_slider_counter','');
    for ( $i = 1; $i <= $entertainment_media_slider_image; $i++ ){ ?>
      <div class="slider-image-box wow zoomIn" data-dot-img="<?php echo esc_url(get_theme_mod('entertainment_media_slider_image'.$i)); ?>">
        <img src="<?php echo esc_url(get_theme_mod('entertainment_media_slider_image'.$i)); ?>" class="slide-image"/>
        <div class=" slider-content align-self-center">
          <?php if ( get_theme_mod('entertainment_media_slider_sub_heading'.$i) ) : ?>
            <h2 class=""><?php echo esc_html(get_theme_mod('entertainment_media_slider_sub_heading'.$i));?></h2>
          <?php endif; ?>
          <?php if ( get_theme_mod('entertainment_media_slider_main_heading'.$i) ) : ?>
            <h1 class="my-md-3"><?php echo esc_html(get_theme_mod('entertainment_media_slider_main_heading'.$i));?></h1>
          <?php endif; ?>
          <?php if ( get_theme_mod('entertainment_media_slider_text'.$i) ) : ?>
            <p class="mb-0"><?php echo esc_html(get_theme_mod('entertainment_media_slider_text'.$i));?></p>
          <?php endif; ?>
          <?php if ( get_theme_mod('entertainment_media_slider_button_url'.$i, true) == true || get_theme_mod('entertainment_media_slider_button_text'.$i, true) == true ) : ?>
          <div class="mt-lg-4">
            
              <a href="<?php echo esc_url(get_theme_mod('entertainment_media_slider_button_url'.$i));?>" class="button animate__animated animate__pulse"><?php echo esc_html(get_theme_mod('entertainment_media_slider_button_text'.$i));?><i class="fas fa-play ms-2"></i></a>
           
          </div>
           <?php endif; ?>
        </div>
      </div>
    <?php }?>
  </div>
</div>
<?php endif; ?>
