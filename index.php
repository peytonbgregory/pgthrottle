<?php
/*
Main Template File
*/
?>
<?php get_header();?>
<div class="container page-index-wrap">
	<div class="row">
        <div class="col-md-8">
        	<?php get_template_part ('includes/content','category'); ?> 
        </div>
        <div class="col-md-4">
            <?php dynamic_sidebar ('sidebar-1');?>
        </div>
    </div>
</div>
<?php get_footer();?>