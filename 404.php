<?php
/*
The template for displaying 404 pages (not found)
*/
?>
<?php get_header();?>
<div class="container page-404-wrap not-found">
	<div class="row">
        <div class="col-md-8">
        	<header class="page-header">
					<h1 class="page-title"><?php _e( 'Oh no! That page can&rsquo;t be found.', 'pgthrottle' ); ?></h1>
				</header><!-- .page-header -->
				<div class="page-content">
					<p><?php _e( 'It looks like nothing was found... Maybe try a search?', 'pgthrottle' ); ?></p>

					<?php get_search_form(); ?>

				</div><!-- .page-content -->
        </div>
        <div class="col-md-4">
            <?php dynamic_sidebar ('sidebar-1');?>
        </div>
    </div>
</div>
<?php get_footer();