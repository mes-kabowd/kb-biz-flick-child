<?php

// --- Chargement du textdomain pour la traduction ---
add_action( 'after_setup_theme', 'blankslateKabowd_load_textdomain' );
function blankslateKabowd_load_textdomain() {
    load_child_theme_textdomain( 'blankslateKabowd', get_stylesheet_directory() . '/assets/lang' );
}

// --- Configuration du thème enfant ---
add_action( 'after_setup_theme', 'blankslateKabowd_setup' );
function blankslateKabowd_setup() {
    add_theme_support( 'custom-logo' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'menus' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
    add_theme_support( 'align-wide' );
    add_theme_support( 'editor-styles' );
    add_editor_style( 'assets/sass/styles.css' );
    register_nav_menus( array(
        'main-menu'    => esc_html__( 'Menu principal', 'blankslateKabowd' ),
        'footer-menu'  => esc_html__( 'Menu pied de page', 'blankslateKabowd' ),
        'kabowd-filtre'=> esc_html__( 'Menu Filtre', 'blankslateKabowd' ),
    ) );
}

// --- Chargement des styles/scripts principaux ---
add_action( 'wp_enqueue_scripts', 'blankslateKabowd_enqueue' );
function blankslateKabowd_enqueue() {
    $theme_version = wp_get_theme()->get( 'Version' );

    // Style principal du thème enfant
    wp_enqueue_style(
        'blankslateKabowd-style',
        get_stylesheet_directory_uri() . '/style.css',
        array(),
        $theme_version
    );

    // Normalisation CSS
    wp_enqueue_style(
        'blankslateKabowd-normalize',
        get_stylesheet_directory_uri() . '/assets/css/normalize.css',
        array(),
        $theme_version
    );

    // CSS compilé principal
    wp_enqueue_style(
        'blankslateKabowd-main',
        get_stylesheet_directory_uri() . '/assets/sass/styles.css',
        array(),
        $theme_version
    );

    // jQuery natif WP
    wp_enqueue_script( 'jquery' );

    // JS principal du thème
    wp_enqueue_script(
        'kabowd-main',
        get_stylesheet_directory_uri() . '/assets/js/main.js',
        array('jquery'),
        $theme_version,
        true
    );

    // JS de filtre blog si besoin
    if ( is_page_template('template-parts/page-blogs.php') || is_search() ) {
        wp_enqueue_script(
            'kabowd-filtre',
            get_stylesheet_directory_uri() . '/assets/js/Filtre.js',
            array('jquery'),
            $theme_version,
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
