<!DOCTYPE html><html <?php language_attributes(); ?>>	<head>		<meta charset="<?php bloginfo( 'charset' ); ?>">		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">		<link rel="profile" href="http://gmpg.org/xfn/11">		<?php wp_head(); ?>	</head><body <?php body_class(); ?>>		<header id="site-header">			<div class="container">				<div class="row">					<div class="col-12">						<a href="<?php echo get_bloginfo('url'); ?>" target="_self" title="<?php echo get_bloginfo('site_title'); ?>"><h1><?php bloginfo('site_title'); ?></h1></a>					</div>										</div> <!-- row -->			</div> <!-- top-nav -->		</header>				<section id="site-navigation">			<div class="container">				<div class="row">					<div class="col-12">						<nav class="navbar navbar-expand-lg px-0" role="navigation">														<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#pg-navbar-collapse" aria-controls="pg-navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">								<span class="navbar-toggler-icon"></span>							</button>							<?php wp_nav_menu( array(								'theme_location'    => 'primary-menu',								'depth'             => 2,								'container'         => 'div',								'container_class'   => 'collapse navbar-collapse',								'container_id'      => 'pg-navbar-collapse',								'menu_class'        => 'nav navbar-nav',								'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',								'walker'            => new WP_Bootstrap_Navwalker(),							) ); ?>														</nav>					</div>				</div>			</div>		</section>			<div id="content"> 