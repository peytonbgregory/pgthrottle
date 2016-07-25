</div>
    <div class="container site-footer">
    	<div class="row">
        <div class="col-md-4">
        	<?php dynamic_sidebar('footer-left');?>
        </div>
        <div class="col-md-4">
			<?php dynamic_sidebar('footer-middle');?>
        </div>
        <div class="col-md-4">
            <?php dynamic_sidebar('footer-right');?>
        </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <footer>
                    <div class="row">
                        <div class="col-md-12">
                             <span class="sep"><?php bloginfo('name'); ?> &copy; <?php echo date("Y"); ?> | </span>
                             <?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
                        </div>           
                    </div>
                </footer>
            </div>
        </div>
    </div>

<script src="<?php bloginfo('template_url');?>/js/jquery-1.12.4.min.js"></script>
<script src="<?php bloginfo('template_url');?>/js/throttle.min.js"></script>
<script>
$(document).ready( function() {
$('.dropdown-toggle').dropdown();
});
</script>
<?php wp_footer(); ?>
</body>
</html>