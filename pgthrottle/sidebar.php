<?php

 global $pgsidebarclass;

if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
<div class="sidebar col-12 col-sm-12 col-md-4 col-lg-3 <?php echo $pgsidebarclass; ?>" id="site-sidebar">
	<aside id="secondary" class="widget-area" role="complementary">	
		<?php dynamic_sidebar( 'sidebar-1' ); ?>	
	</aside><!-- #secondary -->
</div>
<?php endif; ?>