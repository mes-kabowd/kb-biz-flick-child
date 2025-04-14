<?php

add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

//load child theme custom CSS

function kb_biz_flick_child_enqueue_styles() {
    // $parenthandle = 'biz-flick-style'; // This is 'style' for the Biz Flick theme.
    // é$theme = wp_get_theme();
    wp_enqeue_style( 'styles', get_stylesheet_directory_uri() . '/assets/sass/styles.css');
    // wp_enqueue_style( 'custom-style', get_stylesheet_uri());
}
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
add_action( 'wp_enqueue_scripts', 'kb_biz_flick_child_enqueue_styles' );
?>
