<?php

// --- Chargement du textdomain pour la traduction ---
add_action( 'after_setup_theme', function() {
    load_child_theme_textdomain( 'blankslateKabowd', get_stylesheet_directory() . '/assets/lang' );
} );

// --- Chargement du thème enfant ---
add_action( 'after_setup_theme', 'blankslateKabowd_setup' );
function blankslateKabowd_setup() {
    add_theme_support( 'custom-logo' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'menus' );
    register_nav_menus( array(
        'main-menu'    => esc_html__( 'Menu principal', 'blankslateKabowd' ),
        'footer-menu'  => esc_html__( 'Menu pied de page', 'blankslateKabowd' ),
        'kabowd-filtre'=> esc_html__( 'Menu Filtre', 'blankslateKabowd' ),
    ) );
}

// --- Chargement des styles/scripts principaux ---
add_action( 'wp_enqueue_scripts', 'blankslateKabowd_enqueue' );
function blankslateKabowd_enqueue() {
    // Style principal du thème enfant
    wp_enqueue_style( 'blankslateKabowd-style', get_stylesheet_directory_uri() . '/style.css', array(), null );

    // Normalisation CSS
    wp_enqueue_style( 'normalize', get_stylesheet_directory_uri() . '/assets/css/normalize.css', array(), null );

    // CSS compilé principal
    wp_enqueue_style( 'blankslateKabowd-main', get_stylesheet_directory_uri() . '/assets/sass/styles.css', array(), null );

    // jQuery natif WP
    if ( !wp_script_is('jquery', 'enqueued') ) {
        wp_enqueue_script( 'jquery' );
    }

    // JS principal du thème
    wp_enqueue_script(
        'kabowd-main',
        get_stylesheet_directory_uri() . '/assets/js/main.js',
        array('jquery'),
        null,
        true
    );

    // JS de filtre blog si besoin
    if ( is_page_template('template-parts/page-blogs.php') || is_search() ) {
        wp_enqueue_script(
            'kabowd-filtre',
            get_stylesheet_directory_uri() . '/assets/js/Filtre.js',
            array('jquery'),
            null,
            true
        );
    }
}

// --- Accessibilité : lien "Aller au contenu" ---
add_action( 'wp_body_open', 'blankslateKabowd_skip_link', 5 );
function blankslateKabowd_skip_link() {
    echo '<a href="#content" class="skip-link screen-reader-text">' . esc_html__( 'Aller au contenu', 'blankslateKabowd' ) . '</a>';
}

// --- Lien retour en haut ---
add_action( 'wp_footer', 'blankslateKabowd_back_to_top_link' );
function blankslateKabowd_back_to_top_link() {
    echo '<a href="#top" class="back-to-top">' . esc_html__( 'Retour en haut', 'blankslateKabowd' ) . '</a>';
}

?>
