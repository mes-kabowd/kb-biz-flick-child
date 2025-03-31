<?php

add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

//load child theme custom CSS
add_action( 'wp_enqueue_scripts', 'kb_biz_flick_child_enqueue_styles' );
function kb_biz_flick_child_enqueue_styles() {
    $parenthandle = 'biz-flick-style'; // This is 'style' for the Biz Flick theme.
    $theme = wp_get_theme();
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', 
        array(), // if the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    );
    wp_enqueue_style( 'custom-style', get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('Version') // this only works if you have Version in the style header
    );
}

?>
