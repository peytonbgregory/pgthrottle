<?php
/*
Template Name: Page - Left Sidebar
*/
?>
<?php get_header();?>
<div class="container page-left-sidebar-wrap">
	<div class="row">
        <div class="col-md-4">
            <?php dynamic_sidebar ('sidebar-1');?>
        </div>
        <div class="col-md-8">
        	<?php get_template_part ('includes/content','page'); ?>
        </div>
    </div>
</div>
<?php get_footer();?>