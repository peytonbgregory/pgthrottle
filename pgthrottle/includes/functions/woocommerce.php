<?php 
add_theme_support( 'woocommerce' );

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'pgthrottle_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'pgthrottle_wrapper_end', 10);

function pgthrottle_wrapper_start() {
  echo '<section class="woocommerce-wrapper" id="wooMain">';
}

function pgthrottle_wrapper_end() {
  echo '</section>';
}

?>
