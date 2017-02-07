<?php
/*
Template Name: Page - Right Sidebar
*/
?>
<?php get_header();?>
<div class="container page-right-sidebar-wrap">
	<div class="row">
        <div class="col-md-8">
        	<?php get_template_part ('includes/content','page'); ?>
        </div>
        <div class="col-md-4">
            <?php dynamic_sidebar ('sidebar-1');?>
        </div>
    </div>
</div>
<?php get_footer();?>