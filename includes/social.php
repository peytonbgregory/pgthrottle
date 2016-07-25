<?php $options=get_option( 'theme_settings' ); ?>
<div id="social-media">
    <ul class="social-sprite">
		<?php if(isset($options['facebook_url']) && $options['facebook_url']):?>
        	<li class="facebook"><a href="<?php echo $options['facebook_url']; ?>" target="_blank" title="Facebook" class="social-icon"></a></li>
        <?php endif?>  
        
        <?php if(isset($options['linkedin_url']) && $options['linkedin_url']):?>
        	<li class="linkedin"><a href="<?php echo $options['linkedin_url']; ?>" target="_blank" title="linkedin" class="social-icon"></a></li>
        <?php endif?> 
        
        <?php if(isset($options['twitter_url']) && $options['twitter_url']):?>
        	<li class="twitter"><a href="<?php echo $options['twitter_url']; ?>" target="_blank" title="Twitter" class="social-icon"></a></li>
        <?php endif?> 
        
        <?php if(isset($options['google_plus_url']) && $options['google_plus_url']):?>
        	<li class="googleplus"><a href="<?php echo $options['google_plus_url']; ?>" target="_blank" title="Facebook" class="social-icon"></a></li>
        <?php endif?> 
        
        <?php if(isset($options['youtube_url']) && $options['youtube_url']):?>
        	<li class="youtube"><a href="<?php echo $options['youtube_url']; ?>" target="_blank" title="YouTube" class="social-icon"></a></li>
        <?php endif?> 
        
        <?php if(isset($options['instagram_url']) && $options['instagram_url']):?>
        	<li class="instagram"><a href="<?php echo $options['instagram_url']; ?>" target="_blank" title="Instagram" class="social-icon"></a></li>
        <?php endif?> 
        
        <?php if(isset($options['pinterest_url']) && $options['pinterest_url']):?>
        	<li class="pinterest"><a href="<?php echo $options['pinterest_url']; ?>" target="_blank" title="Pintrest" class="social-icon"></a></li>
        <?php endif?>            
    </ul><!-- social sprite-->
</div><!-- #Social Media -->