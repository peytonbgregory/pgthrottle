<?php /* * The Header for our theme. */?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Cache-control" content="public">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>
</head>
<?php global $pgoptions, $pgphonenumber, $pgphoneurl, $pgcustom_logo_id, $pglogo, $pgbodyclass, $pgnavclass, $pgheaderclass, $pgcontentclass, $pgfooterclass, $pgsitenotice, $pgnoticeclass, $pgresourceclass; ?>

<body <?php body_class($pgbodyclass); ?>>
	
<div id="site-wrapper">
	
	<header class="<?php echo $pgheaderclass ?>" id="site-header">
		
		<?php echo apply_filters('pgthrottile_sitenotice', ''); ?>

		<div class="<?php echo $pgresourceclass ?>" id="site-resources">
			
			<div class="container">
				
				<div class="row">
					
					<div class="col pg-social-media">
						
						<?php get_template_part ('includes/social'); ?> 
						
					</div>
					
					<?php if (!$pgphonenumber == '') { ?>
					
						<div class="col pg-phone-number">
							
							<a class="phone-number btn-link btn" href="tel:<?php echo $pgphoneurl ?>"><?php echo $pgphonenumber ?></a>	
							
						</div>
					
					<?php } ?>
					
				</div>
				
			</div>
			
		</div>

		<nav class="navbar <?php echo $pgnavclass ?> navbar-expand-lg navbar-light bg-light" id="site-navigation">
			
			<div class="container">
				
				<?php echo apply_filters('pgthrottile_sitetitle', ''); ?>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>

				<?php
					wp_nav_menu( array(
					'menu'              => 'primary-menu',
					'theme_location'    => 'primary-menu',
					'depth'             => 2,
					'container'         => 'div',
					'container_class'   => 'collapse navbar-collapse',
					'container_id'      => 'navbarSupportedContent',
					'menu_class'        => 'ml-auto navbar-nav',
					'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
					'walker'            => new wp_bootstrap_navwalker())
				);
				?>
				
			</div>
			
		</nav>

	</header>
	
<div class="<?php echo $pgcontentclass ?>" id="site-content"> 