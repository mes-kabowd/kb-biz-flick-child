<?php
    // Enqueue styles and scripts.
    function kb_biz_flick_enqueue_assets() {
        
        // Charger le style du thème parent.
        wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
        
        // Charger le CSS compilé du thème enfant.
        wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/assets/css/style.css', array('parent-style'), '1.0' );
        
        // Charger le JavaScript du thème enfant.
        wp_enqueue_script( 'child-script', get_stylesheet_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0', true );
    }
    add_action( 'wp_enqueue_scripts', 'kb_biz_flick_enqueue_assets' );

    // Configurer les supports du thème.
    function kb_biz_flick_setup() {
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'custom-logo' );
    }
    add_action( 'after_setup_theme', 'kb_biz_flick_setup' );

        // Enregistrer les menus dynamiques.
    function kb_biz_flick_register_menus() {
        register_nav_menus( array(
            'header-menu' => __( 'Menu Principal', 'kb-biz-flick' ),
            'footer-menu' => __( 'Menu Pied de Page', 'kb-biz-flick' ),
        ) );
    }
    add_action( 'after_setup_theme', 'kb_biz_flick_register_menus' );


    // Enregistrer une zone widget.
    function kb_biz_flick_widgets_init() {
        register_sidebar( array(
            'name'          => __( 'Sidebar Principale', 'kb-biz-flick' ),
            'id'            => 'sidebar-1',
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ) );
    }
    add_action( 'widgets_init', 'kb_biz_flick_widgets_init' );

    // Inclure les fichiers complémentaires.
    require_once get_stylesheet_directory() . '/inc/custom-post-types.php';
    require_once get_stylesheet_directory() . '/inc/customizer.php';

    
?>
