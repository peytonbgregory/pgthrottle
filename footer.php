		<?php global $pgfooterclass; ?>

			</div><!-- #site-content -->

		</div> <!-- #site-wrapper -->

		<footer class="<?php echo $pgfooterclass ?>" id="site-footer">

			<div class="container pt-3">

				<?php if(is_active_sidebar('footer-left') || is_active_sidebar('footer-middle') || is_active_sidebar('footer-right')) { ?>

					<div class="row">
						<?php if(is_active_sidebar('footer-left')) {
						echo '<div class="col-12 col-sm-12 col-md-4">';
							dynamic_sidebar ('footer-left'); 
						echo '</div>';
						} ?>

						<?php if(is_active_sidebar('footer-middle')) {
						echo '<div class="col-12 col-sm-12 col-md-4">';
							dynamic_sidebar ('footer-middle'); 
						echo '</div>';
						} ?>

						<?php if(is_active_sidebar('footer-right')) {
						echo '<div class="col-12 col-sm-12 col-md-4">';
							dynamic_sidebar ('footer-right'); 
						echo '</div>';
						} ?>

					</div> <!-- row -->

				<?php } ?>

				<div class="row flex-row align-items-center justify-content-between">

					<div class="d-flex small p-3">

					 	<?php echo '&copy; ' . date('Y') . ' ' .get_bloginfo('name') . ', All Rights Reserved.	'; ?>

					</div>

				</div>

			</div>

		</footer><!-- #colophon -->

		<script type="text/javascript">
			// ADA Compliance
			jQuery('a').filter(function() {
		    return this.hostname && this.hostname !== location.hostname;
		  }).click(function(e) {
		       if(!confirm("You are about to proceed to an external website."))
		       {
			    // if user clicks 'no' then dont proceed to link.
			    e.preventDefault();
		       };
		  });
		</script> 

		<?php wp_footer(); ?>

	</body>

</html>
