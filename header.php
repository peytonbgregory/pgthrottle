<?php /* * The Header for our theme. */?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Cache-control" content="public">
    <title><?php wp_title(); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link href="<?php echo get_stylesheet_uri(); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo esc_url( get_template_directory_uri() );?>/stylesheets/screen.css" rel="stylesheet" type="text/css" />
    <!--[if IE]>
        <link href="/stylesheets/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
    <![endif]-->
    <?php wp_head(); ?>
</head>
<?php $options=get_option( 'theme_settings' ); ?>
<?php flush(); ?><body <?php body_class(); ?>>
<?php do_action( 'before' ); ?>
<div class="page-wrap">
    
   	 <div class="container-fluid header-container">
    	<div class="row">
    <header>
    	<div class="container">
       	
        	<div class="row"> 
                <div class="col-md-2 col-sm-2 col-xs-12"> 
                    <a class="main-logo-link" href="<?php echo home_url(); ?>" rel="home" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                        <img src="<?php echo $options['main_logo']; ?>" class="img-responsive main-logo" width="<?php echo $options['main_logo_width']; ?>" />
                    </a>
                </div>
                <div class="col-md-10 col-sm-10 col-xs-12">
                	<div class="row">
                <div class="col-md-12 col-xs-12">
                <a class="phone-number" href="tel:<?php echo $options['phone_number_url']; ?>"><?php echo $options['phone_number']; ?></a>
                	
				</div>
					</div>
                  <div class="row">
                <div class="col-md-12 col-xs-12">
                  <?php get_template_part ('includes/social'); ?> 
					  </div>
					</div>
                   
                    
                    
                </div>
        	</div>
        	<div class="row">
                        <div class="col-md-12"> 
                            <div class="navbar">
                                <?php
                                        wp_nav_menu( array(
                                        'menu'              => 'header-menu',
                                        'theme_location'    => 'header-menu',
                                        'depth'             => 2,
                                        'container'         => 'div',
                                        'container_class'   => 'collapse ',
                                        'container_id'      => 'bs-example-navbar-collapse-1',
                                        'menu_class'        => 'nav navbar-nav',
                                        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                                        'walker'            => new wp_bootstrap_navwalker())
                                    );
                                ?>
                                <?php // get_search_form (); ?>
                            </div>
                        </div>
                    </div>   	
        </div>
    </header>
		</div>
	</div>
	