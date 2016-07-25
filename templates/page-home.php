<?php
/*
Template Name: Page - Home
*/
?>
<?php get_header();?>
<div class="slideshow container">
	<?php dynamic_sidebar('slideshow'); ?>
</div>
<div class="container page-home-wrap">
    <div class="row">
		<div class="col-md-8">
			<?php get_template_part ('includes/content','home'); ?>
        </div>
        <div class="col-md-4">
        	<?php get_sidebar(); ?>
        </div>
    </div>
    
    
</div>

<?php get_footer();?>