<?php get_template_part('includes/section-google-map'); ?>

<?php global $pgfooterclass; ?>
</div><!-- #site-content -->

</div> <!-- #site-wrapper -->

<footer class="<?php echo $pgfooterclass ?>" id="site-footer">

    <div class="container">

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

        <div class="row py-3 flex-row align-items-center small justify-content-between">

            <div class="col-12 col-sm-12 col-md-12 py-3">
                <?php echo '&copy; ' . date('Y') . ' ' .get_bloginfo('name') . ', All Rights Reserved.	'; ?>
            </div>

        </div>

    </div>

</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>

</html>
