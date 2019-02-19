<?php class pgthrottle_social_widget extends WP_Widget {
 
    function __construct() {
 
        parent::__construct(
            'pgthrottle-social-icons',  // Base ID
            'PGThrottle Social Icons'   // Name
        );
 
        add_action( 'widgets_init', function() {
            register_widget( 'pgthrottle_social_widget' );
        });
 
    }
 
    public $args = array(
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
        'before_widget' => '<div class="widget-wrap">',
        'after_widget'  => '</div></div>'
    ); 
 
    public function widget( $args, $instance ) {
 
        echo $args['before_widget'];
 
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
 
        $options=get_option( 'theme_settings' ); 
echo '<div id="social-media">'; 
    echo '<ul class="social-sprite">'; 
		if(isset($options['facebook_url']) && $options['facebook_url']):?>
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
        <?php endif;         
    echo '</ul>';
echo '</div>'; 
		
        echo $args['after_widget'];
 
    }
 
    public function form( $instance ) {
 
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'pgthrottle' );
        $text = ! empty( $instance['text'] ) ? $instance['text'] : esc_html__( '', 'pgthrottle' );
      
                $options=get_option( 'theme_settings' ); 
echo '<div id="social-media">'; 
    echo '<ul class="social-sprite">'; 
		if(isset($options['facebook_url']) && $options['facebook_url']):?>
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
        <?php endif;         
    echo '</ul>';
echo '</div>'; 
     
 
    }
 
    public function update( $new_instance, $old_instance ) {
 
        $instance = array();
 
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['text'] = ( !empty( $new_instance['text'] ) ) ? $new_instance['text'] : '';
 
        return $instance;
    }
 
}
$my_widget = new pgthrottle_social_widget();
		
?>