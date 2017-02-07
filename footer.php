</div>
  </div>
	<footer class="site-footer">
		<div class="container-fluid site-footer">
			<div class="row">
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-sm-4 col-sx-12">
							<?php dynamic_sidebar('footer-left');?>
						</div>
						<div class="col-md-4 col-sm-4 col-sx-12">
							<?php dynamic_sidebar('footer-middle');?>
						</div>
						<div class="col-md-4 col-sm-4 col-sx-12">
							<?php dynamic_sidebar('footer-right');?>
						</div>
					</div>
				<div class="row">
					<div class="col-md-12 menu-footer-margin">
						<span class="sep"><?php bloginfo('name'); ?> &copy; <?php echo date("Y"); ?> </span>
						<?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
					</div>
				</div>
				</div>
			</div>
		</div>
	</footer>
<script src="<?php echo esc_url( get_template_directory_uri() ) ?>/js/jquery-1.12.4.min.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ) ?>/js/throttle.min.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ) ?>/js/parallax.js"></script>
<script>
$(document).ready( function() {
$('.dropdown-toggle').dropdown();
});
</script>
<?php wp_footer(); ?>
</body>
</html>