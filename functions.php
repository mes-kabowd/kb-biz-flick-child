<?php
function kb_biz_flick_enqueue_styles() {
    // Charger le style parent.
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );


    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/assets/sass/styles.css', array( 'parent-style' ), null );
}
add_action( 'wp_enqueue_scripts', 'kb_biz_flick_enqueue_styles' );
?>