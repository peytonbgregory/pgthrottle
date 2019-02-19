		<?php global $pgfooterclass; ?>

			</div><!-- #site-content -->

		</div> <!-- #site-wrapper -->

		<footer class="<?php echo $pgfooterclass ?>" id="site-footer">

			<div class="container pt-3">

				<?php if(is_active_sidebar('footer-left') || is_active_sidebar('footer-middle') || is_active_sidebar('footer-right')) { ?>

					<div class="row">
						<?php if(is_active_sidebar('footer-left')) {
						echo '<div class="col-12 col-sm">';
							dynamic_sidebar ('footer-left'); 
						echo '</div>';
						} ?>

						<?php if(is_active_sidebar('footer-middle')) {
						echo '<div class="col-12 col-sm">';
							dynamic_sidebar ('footer-middle'); 
						echo '</div>';
						} ?>

						<?php if(is_active_sidebar('footer-right')) {
						echo '<div class="col-12 col-sm">';
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

		<?php wp_footer(); ?>

	</body>

</html>