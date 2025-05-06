<?php
    
    
    
    // --- Chargement du thème enfant ---
    
    add_action( 'after_setup_theme', 'blankslate_setup' );
    function blankslate_setup() {
        // Support du logo personnalisé
        add_theme_support( 'custom-logo' );
        // Support des images mises en avant (post thumbnails)
        add_theme_support( 'post-thumbnails' );
        // Support des menus de navigation
        add_theme_support( 'menus' );
    
        // Déclare les menus utilisés dans le thème enfant
        register_nav_menus( array(
            'main-menu'    => esc_html__( 'Menu principal', 'blankslateKabowd' ),
            'footer-menu'  => esc_html__( 'Menu pied de page', 'blankslateKabowd' ),
            'kabowd-filtre'=> esc_html__( 'Menu Filtre', 'blankslateKabowd' ),
        ) );
    }
    
    
    // --- Chargement des styles/scripts principaux ---
    add_action( 'wp_enqueue_scripts', 'blankslate_enqueue' );
    function blankslate_enqueue() {
        // Style de base du thème
        wp_enqueue_style( 'blankslate-feuille', get_template_directory_uri() . '/style.css', array(), null );
    
        // Normalisation CSS (si besoin)
        wp_enqueue_style( 'normalize', get_template_directory_uri() . '/assets/css/normalize.css', array(), null );
        
        // CSS compilé principal (si vous utilisez un SCSS compilé)
        wp_enqueue_style( 'blankslate-main', get_template_directory_uri() . '/assets/sass/styles.css', array(), null );
    
        // jQuery natif WP (évite le double chargement)
        if (!wp_script_is('jquery', 'enqueued')) {
            wp_enqueue_script( 'jquery' );
        }
    
        // JS principal du thème
        wp_enqueue_script(
            'kabowd-main',
            get_template_directory_uri() . '/assets/js/main.js',
            array('jquery'),
            null,
            true
        );
        
        // JS de filtre blog si besoin
        if ( is_page_template('template-parts/page-blogs.php') || is_search() ) {
            wp_enqueue_script(
                'kabowd-filtre',
                get_template_directory_uri() . '/assets/js/Filtre.js',
                array('jquery'),
                null,
                true
            );
        }
    }
    
    // --- Accessibilité : lien "Aller au contenu" ---
    add_action( 'wp_body_open', 'blankslate_skip_link', 5 );
    function blankslate_skip_link() {
        // Utiliser le textdomain du thème enfant pour la traduction
        echo '<a href="#content" class="skip-link screen-reader-text">' . esc_html__( 'Aller au contenu', 'blankslateKabowd' ) . '</a>';
    }
?>


