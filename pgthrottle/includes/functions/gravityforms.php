<?php //Gravity Forms Custom Button
add_filter( 'gform_submit_button', 'add_custom_css_classes', 10, 2 );
function add_custom_css_classes( $button, $form ) {
    $dom = new DOMDocument();
    $dom->loadHTML( $button );
    $input = $dom->getElementsByTagName( 'input' )->item(0);
    $classes = $input->getAttribute( 'class' );
    $classes .= "btn btn btn-primary ";
    $input->setAttribute( 'class', $classes );
    return $dom->saveHtml( $input );
}
?>
