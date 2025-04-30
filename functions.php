<?php
/**
 * kb-biz-flick-child : Chargement des styles et scripts du thème enfant
 */

// Enqueue des feuilles de style et scripts
function kb_biz_flick_child_enqueue() {
    // Charger le style parent.
    // wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );


    // Normalize.css
    wp_enqueue_style(
        'kb-normalize',
        get_stylesheet_directory_uri() . '/assets/css/normalize.css',
        array(),
        filemtime( get_stylesheet_directory() . '/assets/css/normalize.css' )
    );
    
    // CSS principal compilé depuis les sources Sass
    wp_enqueue_style(
        'kb-child-style',
        get_stylesheet_directory_uri() . '/assets/sass/styles.css',
        array( 'kb-normalize' ),
        filemtime( get_stylesheet_directory() . '/assets/sass/styles.css' )
    );





    // JS de filtrage
    wp_enqueue_script(
        'kb-filtre',
        get_stylesheet_directory_uri() . '/assets/js/Filtre.js',
        array(),
        filemtime( get_stylesheet_directory() . '/assets/js/Filtre.js' ),
        true
    );
    // JS du formulaire
    wp_enqueue_script(
        'kb-formulaire',
        get_stylesheet_directory_uri() . '/assets/js/Formulaire.js',
        array(),
        filemtime( get_stylesheet_directory() . '/assets/js/Formulaire.js' ),
        true
    );
    // JS de changement de logo au scroll
    wp_enqueue_script(
        'kb-changelogo',
        get_stylesheet_directory_uri() . '/assets/js/ChangeLogo.js',
        array(),
        filemtime( get_stylesheet_directory() . '/assets/js/ChangeLogo.js' ),
        true
    );
}
add_action( 'wp_enqueue_scripts', 'kb_biz_flick_child_enqueue' );

// Déclaration des emplacements de menus
add_action( 'after_setup_theme', function() {
    register_nav_menus( array(
        'primary' => 'Menu principal',
        'footer'  => 'Menu pied de page',
    ) );
} );
