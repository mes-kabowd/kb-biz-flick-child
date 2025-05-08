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
        'social-menu'  => esc_html__( 'Menu Social', 'blankslateKabowd' ),
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

// --- Customizer : options de personnalisation du header ---
function kabowd_customize_register($wp_customize) {
    $wp_customize->add_section('kabowd_header', array(
        'title' => __('Header Kabowd', 'kabowd'),
        'priority' => 30,
    ));
    $wp_customize->add_setting('kabowd_logo', array('default' => get_template_directory_uri() . '/assets/img/Logo Principal Couleur.png'));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'kabowd_logo', array(
        'label' => __('Logo principal', 'kabowd'),
        'section' => 'kabowd_header',
        'settings' => 'kabowd_logo',
    )));
    $wp_customize->add_setting('kabowd_logo_alt', array('default' => 'Logo Kabowd'));
    $wp_customize->add_control('kabowd_logo_alt', array(
        'label' => __('Texte alternatif du logo', 'kabowd'),
        'section' => 'kabowd_header',
        'type' => 'text',
    ));
    $wp_customize->add_setting('kabowd_logo_mb', array('default' => get_template_directory_uri() . '/assets/img/Logo Principal Couleur.png'));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'kabowd_logo_mb', array(
        'label' => __('Logo mobile', 'kabowd'),
        'section' => 'kabowd_header',
        'settings' => 'kabowd_logo_mb',
    )));
    $wp_customize->add_setting('kabowd_logo_mb_alt', array('default' => 'Logo Kabowd'));
    $wp_customize->add_control('kabowd_logo_mb_alt', array(
        'label' => __('Texte alternatif du logo mobile', 'kabowd'),
        'section' => 'kabowd_header',
        'type' => 'text',
    ));
    $wp_customize->add_setting('kabowd_search_placeholder', array('default' => 'Search...'));
    $wp_customize->add_control('kabowd_search_placeholder', array(
        'label' => __('Placeholder de recherche', 'kabowd'),
        'section' => 'kabowd_header',
        'type' => 'text',
    ));
    $wp_customize->add_setting('kabowd_search_button', array('default' => 'Go'));
    $wp_customize->add_control('kabowd_search_button', array(
        'label' => __('Texte du bouton de recherche', 'kabowd'),
        'section' => 'kabowd_header',
        'type' => 'text',
    ));
    $wp_customize->add_setting('kabowd_login_text', array('default' => 'Connexion'));
    $wp_customize->add_control('kabowd_login_text', array(
        'label' => __('Texte du lien de connexion', 'kabowd'),
        'section' => 'kabowd_header',
        'type' => 'text',
    ));
    $wp_customize->add_setting('kabowd_linkedin_url', array('default' => '#'));
    $wp_customize->add_control('kabowd_linkedin_url', array(
        'label' => __('Lien Linkedin', 'kabowd'),
        'section' => 'kabowd_header',
        'type' => 'url',
    ));
    $wp_customize->add_setting('kabowd_facebook_url', array('default' => '#'));
    $wp_customize->add_control('kabowd_facebook_url', array(
        'label' => __('Lien Facebook', 'kabowd'),
        'section' => 'kabowd_header',
        'type' => 'url',
    ));
    $wp_customize->add_setting('kabowd_github_url', array('default' => '#'));
    $wp_customize->add_control('kabowd_github_url', array(
        'label' => __('Lien GitHub', 'kabowd'),
        'section' => 'kabowd_header',
        'type' => 'url',
    ));
    $wp_customize->add_setting('kabowd_instagram_url', array('default' => '#'));
    $wp_customize->add_control('kabowd_instagram_url', array(
        'label' => __('Lien Instagram', 'kabowd'),
        'section' => 'kabowd_header',
        'type' => 'url',
    ));
    $wp_customize->add_setting('kabowd_youtube_url', array('default' => '#'));
    $wp_customize->add_control('kabowd_youtube_url', array(
        'label' => __('Lien YouTube', 'kabowd'),
        'section' => 'kabowd_header',
        'type' => 'url',
    ));
    $wp_customize->add_setting('kabowd_rdv_url', array('default' => home_url('/contact')));
    $wp_customize->add_control('kabowd_rdv_url', array(
        'label' => __('Lien du bouton RDV', 'kabowd'),
        'section' => 'kabowd_header',
        'type' => 'url',
    ));
    $wp_customize->add_setting('kabowd_rdv_text', array('default' => 'Prenez un Rendez-vous'));
    $wp_customize->add_control('kabowd_rdv_text', array(
        'label' => __('Texte du bouton RDV', 'kabowd'),
        'section' => 'kabowd_header',
        'type' => 'text',
    ));
    // Réseaux sociaux : affichage
    $wp_customize->add_setting('kabowd_show_linkedin', array('default' => true, 'sanitize_callback' => 'wp_validate_boolean'));
    $wp_customize->add_control('kabowd_show_linkedin', array(
        'label' => __('Afficher Linkedin', 'kabowd'),
        'section' => 'kabowd_header',
        'type' => 'checkbox',
    ));
    $wp_customize->add_setting('kabowd_show_facebook', array('default' => true, 'sanitize_callback' => 'wp_validate_boolean'));
    $wp_customize->add_control('kabowd_show_facebook', array(
        'label' => __('Afficher Facebook', 'kabowd'),
        'section' => 'kabowd_header',
        'type' => 'checkbox',
    ));
    $wp_customize->add_setting('kabowd_show_github', array('default' => true, 'sanitize_callback' => 'wp_validate_boolean'));
    $wp_customize->add_control('kabowd_show_github', array(
        'label' => __('Afficher GitHub', 'kabowd'),
        'section' => 'kabowd_header',
        'type' => 'checkbox',
    ));
    $wp_customize->add_setting('kabowd_show_instagram', array('default' => true, 'sanitize_callback' => 'wp_validate_boolean'));
    $wp_customize->add_control('kabowd_show_instagram', array(
        'label' => __('Afficher Instagram', 'kabowd'),
        'section' => 'kabowd_header',
        'type' => 'checkbox',
    ));
    $wp_customize->add_setting('kabowd_show_youtube', array('default' => true, 'sanitize_callback' => 'wp_validate_boolean'));
    $wp_customize->add_control('kabowd_show_youtube', array(
        'label' => __('Afficher YouTube', 'kabowd'),
        'section' => 'kabowd_header',
        'type' => 'checkbox',
    ));
}
add_action('customize_register', 'kabowd_customize_register');

// --- Customizer : options de personnalisation des réseaux sociaux ---
function kabowd_customize_socials($wp_customize) {
    $wp_customize->add_section('kabowd_socials', array(
        'title'    => __('Réseaux sociaux', 'kabowd'),
        'priority' => 35,
    ));

    // Champ textarea pour réseaux sociaux personnalisés (JSON)
    $wp_customize->add_setting('kabowd_socials_custom', array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('kabowd_socials_custom', array(
        'label'    => __('Réseaux sociaux personnalisés (JSON)', 'kabowd'),
        'section'  => 'kabowd_socials',
        'type'     => 'textarea',
        'description' => __('Format : [{"name":"Nom","url":"https://...","icon":"URL de l\'icône"}]', 'kabowd'),
    ));

    $socials = array(
        'facebook'  => 'Facebook',
        'instagram' => 'Instagram',
        'youtube'   => 'YouTube',
        'discord'   => 'Discord',
        'github'    => 'GitHub',
        'linkedin'  => 'LinkedIn',
    );

    foreach ($socials as $slug => $label) {
        $wp_customize->add_setting("kabowd_social_{$slug}_url", array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control("kabowd_social_{$slug}_url", array(
            'label'    => __("URL $label", 'kabowd'),
            'section'  => 'kabowd_socials',
            'type'     => 'url',
        ));

        $wp_customize->add_setting("kabowd_social_{$slug}_show", array(
            'default'           => true,
            'sanitize_callback' => 'wp_validate_boolean',
        ));
        $wp_customize->add_control("kabowd_social_{$slug}_show", array(
            'label'    => __("Afficher $label", 'kabowd'),
            'section'  => 'kabowd_socials',
            'type'     => 'checkbox',
        ));
    }
}
add_action('customize_register', 'kabowd_customize_socials');

// --- Customizer : options de personnalisation du footer ---
function kabowd_customize_footer($wp_customize) {
    $wp_customize->add_section('kabowd_footer', array(
        'title'    => __('Pied de page (Footer)', 'kabowd'),
        'priority' => 40,
    ));

    // Texte de crédit
    $wp_customize->add_setting('kabowd_footer_credit', array(
        'default'           => '© ' . date('Y') . ' Kabowd. Tous droits réservés.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('kabowd_footer_credit', array(
        'label'    => __('Texte de crédit', 'kabowd'),
        'section'  => 'kabowd_footer',
        'type'     => 'text',
    ));

    // Téléphone
    $wp_customize->add_setting('kabowd_footer_phone', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('kabowd_footer_phone', array(
        'label'    => __('Numéro de téléphone', 'kabowd'),
        'section'  => 'kabowd_footer',
        'type'     => 'text',
    ));

    // Adresse
    $wp_customize->add_setting('kabowd_footer_address', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('kabowd_footer_address', array(
        'label'    => __('Adresse', 'kabowd'),
        'section'  => 'kabowd_footer',
        'type'     => 'text',
    ));

    // Courriel
    $wp_customize->add_setting('kabowd_footer_email', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('kabowd_footer_email', array(
        'label'    => __('Courriel', 'kabowd'),
        'section'  => 'kabowd_footer',
        'type'     => 'email',
    ));

    // Couleur de fond du footer
    $wp_customize->add_setting('kabowd_footer_bgcolor', array(
        'default'           => '#0f1426',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'kabowd_footer_bgcolor', array(
        'label'    => __('Couleur de fond du footer', 'kabowd'),
        'section'  => 'kabowd_footer',
        'settings' => 'kabowd_footer_bgcolor',
    )));
}
add_action('customize_register', 'kabowd_customize_footer');

// --- Customizer : options de personnalisation du contenu des pages et articles ---
function kabowd_customize_content($wp_customize) {
    // Section pour les pages
    $wp_customize->add_section('kabowd_page_content', array(
        'title'    => __('Contenu des pages', 'kabowd'),
        'priority' => 50,
    ));
    $wp_customize->add_setting('kabowd_page_title', array('default' => ''));
    $wp_customize->add_control('kabowd_page_title', array(
        'label' => __('Titre personnalisé (pages)', 'kabowd'),
        'section' => 'kabowd_page_content',
        'type' => 'text',
    ));
    $wp_customize->add_setting('kabowd_page_subtitle', array('default' => ''));
    $wp_customize->add_control('kabowd_page_subtitle', array(
        'label' => __('Sous-titre personnalisé (pages)', 'kabowd'),
        'section' => 'kabowd_page_content',
        'type' => 'text',
    ));
    $wp_customize->add_setting('kabowd_page_image', array('default' => ''));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'kabowd_page_image', array(
        'label' => __('Image principale (pages)', 'kabowd'),
        'section' => 'kabowd_page_content',
        'settings' => 'kabowd_page_image',
    )));
    $wp_customize->add_setting('kabowd_page_media', array('default' => ''));
    $wp_customize->add_control('kabowd_page_media', array(
        'label' => __('Lien média (vidéo, audio, etc.)', 'kabowd'),
        'section' => 'kabowd_page_content',
        'type' => 'url',
    ));
    $wp_customize->add_setting('kabowd_page_color', array('default' => '#361fdb', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'kabowd_page_color', array(
        'label' => __('Couleur de fond personnalisée (pages)', 'kabowd'),
        'section' => 'kabowd_page_content',
        'settings' => 'kabowd_page_color',
    )));

    // Section pour les articles
    $wp_customize->add_section('kabowd_post_content', array(
        'title'    => __('Contenu des articles', 'kabowd'),
        'priority' => 51,
    ));
    $wp_customize->add_setting('kabowd_post_title', array('default' => ''));
    $wp_customize->add_control('kabowd_post_title', array(
        'label' => __('Titre personnalisé (articles)', 'kabowd'),
        'section' => 'kabowd_post_content',
        'type' => 'text',
    ));
    $wp_customize->add_setting('kabowd_post_subtitle', array('default' => ''));
    $wp_customize->add_control('kabowd_post_subtitle', array(
        'label' => __('Sous-titre personnalisé (articles)', 'kabowd'),
        'section' => 'kabowd_post_content',
        'type' => 'text',
    ));
    $wp_customize->add_setting('kabowd_post_image', array('default' => ''));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'kabowd_post_image', array(
        'label' => __('Image principale (articles)', 'kabowd'),
        'section' => 'kabowd_post_content',
        'settings' => 'kabowd_post_image',
    )));
    $wp_customize->add_setting('kabowd_post_media', array('default' => ''));
    $wp_customize->add_control('kabowd_post_media', array(
        'label' => __('Lien média (vidéo, audio, etc.)', 'kabowd'),
        'section' => 'kabowd_post_content',
        'type' => 'url',
    ));
    $wp_customize->add_setting('kabowd_post_color', array('default' => '#db701f', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'kabowd_post_color', array(
        'label' => __('Couleur de fond personnalisée (articles)', 'kabowd'),
        'section' => 'kabowd_post_content',
        'settings' => 'kabowd_post_color',
    )));
}
add_action('customize_register', 'kabowd_customize_content');

// --- Customizer : options de personnalisation de la page d'accueil ---
function kabowd_customize_homepage($wp_customize) {
    $wp_customize->add_section('kabowd_homepage', array(
        'title'    => __('Page d\'accueil personnalisée', 'kabowd'),
        'priority' => 20,
    ));
    $wp_customize->add_setting('kabowd_homepage_title', array('default' => ''));
    $wp_customize->add_control('kabowd_homepage_title', array(
        'label' => __('Titre principal', 'kabowd'),
        'section' => 'kabowd_homepage',
        'type' => 'text',
    ));
    $wp_customize->add_setting('kabowd_homepage_subtitle', array('default' => ''));
    $wp_customize->add_control('kabowd_homepage_subtitle', array(
        'label' => __('Sous-titre', 'kabowd'),
        'section' => 'kabowd_homepage',
        'type' => 'text',
    ));
    $wp_customize->add_setting('kabowd_homepage_logo', array('default' => ''));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'kabowd_homepage_logo', array(
        'label' => __('Image principale', 'kabowd'),
        'section' => 'kabowd_homepage',
        'settings' => 'kabowd_homepage_logo',
    )));
    $wp_customize->add_setting('kabowd_homepage_bgcolor', array('default' => '', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'kabowd_homepage_bgcolor', array(
        'label' => __('Couleur de fond', 'kabowd'),
        'section' => 'kabowd_homepage',
        'settings' => 'kabowd_homepage_bgcolor',
    )));
}
add_action('customize_register', 'kabowd_customize_homepage');

function kabowd_customize_homepage_stats($wp_customize) {
    $wp_customize->add_setting('kabowd_homepage_stats_title', array('default' => ''));
    $wp_customize->add_control('kabowd_homepage_stats_title', array(
        'label' => __('Titre section Statistiques', 'kabowd'),
        'section' => 'kabowd_homepage',
        'type' => 'text',
    ));
    $wp_customize->add_setting('kabowd_homepage_stats_text', array('default' => ''));
    $wp_customize->add_control('kabowd_homepage_stats_text', array(
        'label' => __('Texte section Statistiques', 'kabowd'),
        'section' => 'kabowd_homepage',
        'type' => 'textarea',
    ));
    $wp_customize->add_setting('kabowd_homepage_stats_img', array('default' => ''));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'kabowd_homepage_stats_img', array(
        'label' => __('Image Statistiques', 'kabowd'),
        'section' => 'kabowd_homepage',
        'settings' => 'kabowd_homepage_stats_img',
    )));
    $wp_customize->add_setting('kabowd_homepage_stats_values', array('default' => ''));
    $wp_customize->add_control('kabowd_homepage_stats_values', array(
        'label' => __('Valeurs Statistiques (JSON)', 'kabowd'),
        'section' => 'kabowd_homepage',
        'type' => 'textarea',
        'description' => __('Format : [{"value":"00%","label":"Type de Statistiques"},...]', 'kabowd'),
    ));
}
add_action('customize_register', 'kabowd_customize_homepage_stats');

function kabowd_customize_homepage_stats_simple($wp_customize) {
    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting("kabowd_homepage_stats_value_$i", array('default' => ''));
        $wp_customize->add_control("kabowd_homepage_stats_value_$i", array(
            'label' => __("Valeur Statistique ( % ) $i", 'kabowd'),
            'section' => 'kabowd_homepage',
            'type' => 'text',
        ));
        $wp_customize->add_setting("kabowd_homepage_stats_label_$i", array('default' => ''));
        $wp_customize->add_control("kabowd_homepage_stats_label_$i", array(
            'label' => __("Label Statistique (texte) $i", 'kabowd'),
            'section' => 'kabowd_homepage',
            'type' => 'text',
        ));
    }
}
add_action('customize_register', 'kabowd_customize_homepage_stats_simple');

function kabowd_customize_homepage_carrousel($wp_customize) {
    $wp_customize->add_setting('kabowd_homepage_carrousel_title', array('default' => 'Services'));
    $wp_customize->add_control('kabowd_homepage_carrousel_title', array(
        'label' => __('Titre du carrousel', 'kabowd'),
        'section' => 'kabowd_homepage',
        'type' => 'text',
    ));
    $wp_customize->add_setting('kabowd_homepage_carrousel_url', array('default' => '#'));
    $wp_customize->add_control('kabowd_homepage_carrousel_url', array(
        'label' => __('URL du titre du carrousel', 'kabowd'),
        'section' => 'kabowd_homepage',
        'type' => 'url',
    ));
    $wp_customize->add_setting('kabowd_homepage_carrousel_desc', array('default' => ''));
    $wp_customize->add_control('kabowd_homepage_carrousel_desc', array(
        'label' => __('Description du carrousel', 'kabowd'),
        'section' => 'kabowd_homepage',
        'type' => 'textarea',
    ));
    // Liste déroulante des catégories
    $categories = get_categories(array('hide_empty' => false));
    $cat_choices = array('' => __('-- Sélectionner --', 'kabowd'));
    foreach ($categories as $cat) {
        $cat_choices[$cat->slug] = $cat->name;
    }
    $wp_customize->add_setting('kabowd_homepage_carrousel_cat', array('default' => ''));
    $wp_customize->add_control('kabowd_homepage_carrousel_cat', array(
        'label' => __('Catégorie de pages à afficher', 'kabowd'),
        'section' => 'kabowd_homepage',
        'type' => 'select',
        'choices' => $cat_choices,
    ));

    // Sélecteur de page pour le lien du titre du carrousel
    $pages = get_pages(array('sort_column' => 'post_title', 'sort_order' => 'asc'));
    $page_choices = array('' => __('-- Sélectionner une page --', 'kabowd'));
    foreach ($pages as $page) {
        $page_choices[$page->ID] = $page->post_title;
    }
    $wp_customize->add_setting('kabowd_homepage_carrousel_page', array('default' => ''));
    $wp_customize->add_control('kabowd_homepage_carrousel_page', array(
        'label' => __('Page cible du titre du carrousel', 'kabowd'),
        'section' => 'kabowd_homepage',
        'type' => 'select',
        'choices' => $page_choices,
    ));

    // (Optionnel) On garde l'URL libre pour compatibilité
    $wp_customize->add_setting('kabowd_homepage_carrousel_url', array('default' => ''));
    $wp_customize->add_control('kabowd_homepage_carrousel_url', array(
        'label' => __('URL personnalisée du titre du carrousel (prioritaire si renseignée)', 'kabowd'),
        'section' => 'kabowd_homepage',
        'type' => 'url',
    ));
}
add_action('customize_register', 'kabowd_customize_homepage_carrousel');

function kabowd_customize_homepage_carrousel2($wp_customize) {
    $wp_customize->add_setting('kabowd_homepage_carrousel2_title', array('default' => 'Secteurs'));
    $wp_customize->add_control('kabowd_homepage_carrousel2_title', array(
        'label' => __('Titre du carrousel 2', 'kabowd'),
        'section' => 'kabowd_homepage',
        'type' => 'text',
    ));
    // Sélecteur de page pour le lien du titre du carrousel 2
    $pages = get_pages(array('sort_column' => 'post_title', 'sort_order' => 'asc'));
    $page_choices = array('' => __('-- Sélectionner une page --', 'kabowd'));
    foreach ($pages as $page) {
        $page_choices[$page->ID] = $page->post_title;
    }
    $wp_customize->add_setting('kabowd_homepage_carrousel2_page', array('default' => ''));
    $wp_customize->add_control('kabowd_homepage_carrousel2_page', array(
        'label' => __('Page cible du titre du carrousel 2', 'kabowd'),
        'section' => 'kabowd_homepage',
        'type' => 'select',
        'choices' => $page_choices,
    ));
    $wp_customize->add_setting('kabowd_homepage_carrousel2_url', array('default' => ''));
    $wp_customize->add_control('kabowd_homepage_carrousel2_url', array(
        'label' => __('URL personnalisée du titre du carrousel 2 (prioritaire si renseignée)', 'kabowd'),
        'section' => 'kabowd_homepage',
        'type' => 'url',
    ));
    $wp_customize->add_setting('kabowd_homepage_carrousel2_desc', array('default' => ''));
    $wp_customize->add_control('kabowd_homepage_carrousel2_desc', array(
        'label' => __('Description du carrousel 2', 'kabowd'),
        'section' => 'kabowd_homepage',
        'type' => 'textarea',
    ));
    // Liste déroulante des catégories
    $categories = get_categories(array('hide_empty' => false));
    $cat_choices = array('' => __('-- Sélectionner --', 'kabowd'));
    foreach ($categories as $cat) {
        $cat_choices[$cat->slug] = $cat->name;
    }
    $wp_customize->add_setting('kabowd_homepage_carrousel2_cat', array('default' => ''));
    $wp_customize->add_control('kabowd_homepage_carrousel2_cat', array(
        'label' => __('Catégorie de pages à afficher (carrousel 2)', 'kabowd'),
        'section' => 'kabowd_homepage',
        'type' => 'select',
        'choices' => $cat_choices,
    ));
}
add_action('customize_register', 'kabowd_customize_homepage_carrousel2');

// --- Customizer : visibilité des sections page d'accueil ---
function kabowd_customize_homepage_blocks($wp_customize) {
    $wp_customize->add_section('kabowd_homepage_blocks', array(
        'title'    => __('Affichage des sections Accueil', 'kabowd'),
        'priority' => 25,
    ));
    $blocks = array(
        'titre'      => 'Bloc Titre',
        'stats'      => 'Bloc Statistiques',
        'services'   => 'Bloc Services',
        'secteurs'   => 'Bloc Secteurs',
        'blog'       => 'Bloc Blog',
    );
    foreach ($blocks as $slug => $label) {
        $wp_customize->add_setting("kabowd_homepage_show_$slug", array(
            'default'           => true,
            'sanitize_callback' => 'wp_validate_boolean',
        ));
        $wp_customize->add_control("kabowd_homepage_show_$slug", array(
            'label'    => __("Afficher $label", 'kabowd'),
            'section'  => 'kabowd_homepage_blocks',
            'type'     => 'checkbox',
        ));
    }
}
add_action('customize_register', 'kabowd_customize_homepage_blocks');

// Utilitaire pour la visibilité
function kabowd_homepage_show_block($slug) {
    $val = get_theme_mod("kabowd_homepage_show_$slug", true);
    return $val;
}

// --- Customizer : options de personnalisation pour la page À Propos ---
function kabowd_customize_apropos($wp_customize) {
    $wp_customize->add_section('kabowd_apropos', array(
        'title'    => __('Page À Propos personnalisée', 'kabowd'),
        'priority' => 21,
    ));
    $wp_customize->add_setting('kabowd_apropos_title', array('default' => ''));
    $wp_customize->add_control('kabowd_apropos_title', array(
        'label' => __('Titre principal', 'kabowd'),
        'section' => 'kabowd_apropos',
        'type' => 'text',
    ));
    $wp_customize->add_setting('kabowd_apropos_subtitle', array('default' => ''));
    $wp_customize->add_control('kabowd_apropos_subtitle', array(
        'label' => __('Sous-titre', 'kabowd'),
        'section' => 'kabowd_apropos',
        'type' => 'text',
    ));
    $wp_customize->add_setting('kabowd_apropos_logo', array('default' => ''));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'kabowd_apropos_logo', array(
        'label' => __('Image principale', 'kabowd'),
        'section' => 'kabowd_apropos',
        'settings' => 'kabowd_apropos_logo',
    )));
    $wp_customize->add_setting('kabowd_apropos_paragraph', array('default' => ''));
    $wp_customize->add_control('kabowd_apropos_paragraph', array(
        'label' => __('Paragraphe principal', 'kabowd'),
        'section' => 'kabowd_apropos',
        'type' => 'textarea',
    ));
}
add_action('customize_register', 'kabowd_customize_apropos');

// --- Customizer : options de personnalisation pour la page Secteur Unité ---
function kabowd_customize_secteur_unite($wp_customize) {
    $wp_customize->add_section('kabowd_secteur_unite', array(
        'title'    => __('Page Secteur Unité personnalisée', 'kabowd'),
        'priority' => 22,
    ));
    $wp_customize->add_setting('kabowd_secteur_unite_title', array('default' => ''));
    $wp_customize->add_control('kabowd_secteur_unite_title', array(
        'label' => __('Titre principal', 'kabowd'),
        'section' => 'kabowd_secteur_unite',
        'type' => 'text',
    ));
    $wp_customize->add_setting('kabowd_secteur_unite_subtitle', array('default' => ''));
    $wp_customize->add_control('kabowd_secteur_unite_subtitle', array(
        'label' => __('Sous-titre', 'kabowd'),
        'section' => 'kabowd_secteur_unite',
        'type' => 'text',
    ));
    $wp_customize->add_setting('kabowd_secteur_unite_logo', array('default' => ''));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'kabowd_secteur_unite_logo', array(
        'label' => __('Image principale', 'kabowd'),
        'section' => 'kabowd_secteur_unite',
        'settings' => 'kabowd_secteur_unite_logo',
    )));
}
add_action('customize_register', 'kabowd_customize_secteur_unite');

// Utilitaires pour récupérer les valeurs customizer des templates
function kabowd_apropos_customizer($key, $default = '') {
    $val = get_theme_mod('kabowd_apropos_' . $key, '');
    return $val !== '' ? $val : $default;
}
function kabowd_secteur_unite_customizer($key, $default = '') {
    $val = get_theme_mod('kabowd_secteur_unite_' . $key, '');
    return $val !== '' ? $val : $default;
}

// Utilitaire pour récupérer la valeur customizer ou fallback
function kabowd_homepage_customizer($key, $default = '') {
    $val = get_theme_mod('kabowd_homepage_' . $key, '');
    return $val !== '' ? $val : $default;
}

// Utilitaires pour récupérer les options personnalisées
function kabowd_get_customizer($key, $default = '', $type = 'page') {
    if ($type === 'post' && is_single()) {
        $val = get_theme_mod('kabowd_post_' . $key, '');
        return $val !== '' ? $val : $default;
    }
    if ($type === 'page' && is_page()) {
        $val = get_theme_mod('kabowd_page_' . $key, '');
        return $val !== '' ? $val : $default;
    }
    return $default;
}

// Génère la liste des réseaux sociaux à afficher
function kabowd_get_social_networks() {
    $output = array();

    // 1. Réseaux sociaux personnalisés (JSON)
    $custom_json = get_theme_mod('kabowd_socials_custom', '');
    if ($custom_json) {
        $custom = json_decode($custom_json, true);
        if (is_array($custom)) {
            foreach ($custom as $social) {
                if (!empty($social['name']) && !empty($social['url']) && !empty($social['icon'])) {
                    $output[] = array(
                        'name' => $social['name'],
                        'url'  => $social['url'],
                        'icon' => $social['icon'],
                    );
                }
            }
        }
    }

    // 2. Réseaux sociaux prédéfinis
    $img_path = get_stylesheet_directory_uri() . '/assets/img/';
    $socials = array(
        array(
            'slug' => 'facebook',
            'name' => 'Facebook',
            'icon' => $img_path . 'Facebook.png',
        ),
        array(
            'slug' => 'instagram',
            'name' => 'Instagram',
            'icon' => $img_path . 'Instagram.png',
        ),
        array(
            'slug' => 'youtube',
            'name' => 'YouTube',
            'icon' => $img_path . 'YouTube.png',
        ),
        array(
            'slug' => 'discord',
            'name' => 'Discord',
            'icon' => $img_path . 'Discord.png',
        ),
        array(
            'slug' => 'github',
            'name' => 'GitHub',
            'icon' => $img_path . 'GitHub.png',
        ),
        array(
            'slug' => 'linkedin',
            'name' => 'LinkedIn',
            'icon' => $img_path . 'Linkedin.png',
        ),
    );

    foreach ($socials as $social) {
        $show = get_theme_mod("kabowd_social_{$social['slug']}_show", true);
        $url  = get_theme_mod("kabowd_social_{$social['slug']}_url", '');
        if ($show && !empty($url)) {
            $output[] = array(
                'name' => $social['name'],
                'url'  => $url,
                'icon' => $social['icon'],
            );
        }
    }

    return $output;
}

// --- Activer catégories, étiquettes et extraits pour les pages ---
add_action('init', function() {
    // Catégories et étiquettes pour les pages
    register_taxonomy_for_object_type('category', 'page');
    register_taxonomy_for_object_type('post_tag', 'page');
    // Extrait pour les pages
    add_post_type_support('page', 'excerpt');
});

// (Optionnel) Afficher les métaboxes catégories/étiquettes dans l'admin pour les pages
add_action('admin_head', function() {
    echo '<style>
    .page-categories-div, .tagsdiv-page_tag { display:block !important; }
    </style>';
});

?>
