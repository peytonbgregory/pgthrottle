<?php $options=get_option( 'theme_settings' ); ?>

<div class="btn-group social-media-btn-group" role="group" aria-label="Social Media">
		<?php if(isset($options['facebook_url']) && $options['facebook_url']):?>
        	<a class="btn facebook" href="<?php echo $options['facebook_url']; ?>" target="_blank" title="Facebook" class="social-icon"><i class="fab fa-facebook"></i></a>
        <?php endif?>  
        
        <?php if(isset($options['linkedin_url']) && $options['linkedin_url']):?>
        	<a class="btn linkedin" href="<?php echo $options['linkedin_url']; ?>" target="_blank" title="linkedin" class="social-icon"><i class="fab fa-linkedin"></i></a>
        <?php endif?> 
        
        <?php if(isset($options['twitter_url']) && $options['twitter_url']):?>
        	<a class="btn twitter" href="<?php echo $options['twitter_url']; ?>" target="_blank" title="Twitter" class="social-icon"><i class="fab fa-twitter"></i></a>
        <?php endif?> 
        
        <?php if(isset($options['google_plus_url']) && $options['google_plus_url']):?>
        	<a class="btn googleplus" href="<?php echo $options['google_plus_url']; ?>" target="_blank" title="Facebook" class="social-icon"><i class="fab fa-google-plus-square"></i></a>
        <?php endif?> 
        
        <?php if(isset($options['youtube_url']) && $options['youtube_url']):?>
        	<a class="btn youtube" href="<?php echo $options['youtube_url']; ?>" target="_blank" title="YouTube" class="social-icon"><i class="fab fa-youtube"></i></a>
        <?php endif?> 
        
        <?php if(isset($options['instagram_url']) && $options['instagram_url']):?>
        	<a class="btn instagram" href="<?php echo $options['instagram_url']; ?>" target="_blank" title="Instagram" class="social-icon"><i class="fab fa-instagram"></i></a>
        <?php endif?> 
        
        <?php if(isset($options['pinterest_url']) && $options['pinterest_url']):?>
        	<a class="btn pinterest" href="<?php echo $options['pinterest_url']; ?>" target="_blank" title="Pintrest" class="social-icon"><i class="fab fa-pinterest"></i></a>
        <?php endif?>            
</div><!-- #Social Media -->
