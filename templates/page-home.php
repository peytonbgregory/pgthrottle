<?php
/*
Template Name: Page - Home
*/
get_header(); ?>
<div class="container-fluid slideshow-container">
	<div class="row">
		<div class="slideshow">
			<?php dynamic_sidebar ('slideshow'); ?>
		</div>
	</div>
</div>
<div class="container-fluid page-content-container">
	<div class="row">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-8 col-xs-12">
					<?php get_template_part ('includes/content','home'); ?>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-12">
					<?php dynamic_sidebar ('sidebar-1');?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid parallax-container">
	<div class="row">
		<div class="parallax-window parallax" data-parallax="scroll" data-image-src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img1.jpg">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<?php dynamic_sidebar ('parallax-overlay'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid home-widget-container">
	<div class="row">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-12">
					<?php dynamic_sidebar ('home-left'); ?>
				</div>

				<div class="col-md-4 col-sm-4 col-xs-12">
					<?php dynamic_sidebar ('home-middle'); ?>
				</div>

				<div class="col-md-4 col-sm-4 col-xs-12">
					<?php dynamic_sidebar ('home-right'); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer();?>