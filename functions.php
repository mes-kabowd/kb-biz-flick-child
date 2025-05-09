<?php

// --- Chargement des traductions du thème enfant ---
add_action('after_setup_theme', 'blankslateKabowd_load_textdomain');
function blankslateKabowd_load_textdomain() {
    load_child_theme_textdomain('blankslateKabowd', get_stylesheet_directory() . '/assets/lang');
}

// --- Configuration du thème enfant (support des fonctionnalités WordPress) ---
add_action('after_setup_theme', 'blankslateKabowd_setup');
function blankslateKabowd_setup() {
    add_theme_support('custom-logo'); // Support des logos personnalisés
    add_theme_support('post-thumbnails'); // Support des images mises en avant
    add_theme_support('menus'); // Support des menus personnalisés
    add_theme_support('title-tag'); // Gestion automatique des balises <title>
    add_theme_support('automatic-feed-links'); // Flux RSS automatiques
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script']); // HTML5 pour certains éléments
    add_theme_support('align-wide'); // Alignement large pour l'éditeur de blocs
    add_theme_support('editor-styles'); // Support des styles pour l'éditeur
    add_editor_style('assets/sass/styles.css'); // Fichier de styles pour l'éditeur

    // Enregistrement des emplacements de menus
    register_nav_menus([
        'main-menu' => esc_html__('Menu principal', 'blankslateKabowd'),
        'footer-menu' => esc_html__('Menu pied de page', 'blankslateKabowd'),
        'kabowd-filtre' => esc_html__('Menu Filtre', 'blankslateKabowd'),
        'social-menu' => esc_html__('Menu Social', 'blankslateKabowd'),
    ]);
}

// --- Chargement des styles et scripts principaux ---
add_action('wp_enqueue_scripts', 'blankslateKabowd_enqueue');
function blankslateKabowd_enqueue() {
    $theme_version = wp_get_theme()->get('Version');

    // Styles principaux
    wp_enqueue_style('blankslateKabowd-style', get_stylesheet_directory_uri() . '/style.css', [], $theme_version);
    wp_enqueue_style('blankslateKabowd-normalize', get_stylesheet_directory_uri() . '/assets/css/normalize.css', [], $theme_version);
    wp_enqueue_style('blankslateKabowd-main', get_stylesheet_directory_uri() . '/assets/sass/styles.css', [], $theme_version);

    // Scripts principaux
    wp_enqueue_script('jquery'); // jQuery natif de WordPress
    wp_enqueue_script('kabowd-main', get_stylesheet_directory_uri() . '/assets/js/main.js', ['jquery'], $theme_version, true);

    // Script conditionnel pour les pages spécifiques
    if (is_page_template('template-parts/page-blogs.php') || is_search()) {
        wp_enqueue_script('kabowd-filtre', get_stylesheet_directory_uri() . '/assets/js/Filtre.js', ['jquery'], $theme_version, true);
    }
}

// --- Accessibilité : ajout d'un lien "Aller au contenu" ---
add_action('wp_body_open', 'blankslateKabowd_skip_link', 5);
function blankslateKabowd_skip_link() {
    echo '<a href="#content" class="skip-link screen-reader-text">' . esc_html__('Aller au contenu', 'blankslateKabowd') . '</a>';
}



// --- Customizer : personnalisation du header ---
function kabowd_customize_register($wp_customize) {
    $wp_customize->add_section('kabowd_header', [
        'title' => __('Header Kabowd', 'kabowd'),
        'priority' => 50,
    ]);

    // Logo principal
    $wp_customize->add_setting('kabowd_logo', ['default' => get_template_directory_uri() . '/assets/img/Logo Principal Couleur.png']);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'kabowd_logo', [
        'label' => __('Logo principal', 'kabowd'),
        'section' => 'kabowd_header',
        'settings' => 'kabowd_logo',
    ]));

    // Texte alternatif du logo
    $wp_customize->add_setting('kabowd_logo_alt', ['default' => 'Logo Kabowd']);
    $wp_customize->add_control('kabowd_logo_alt', [
        'label' => __('Texte alternatif du logo', 'kabowd'),
        'section' => 'kabowd_header',
        'type' => 'text',
    ]);

    // Logo mobile
    $wp_customize->add_setting('kabowd_logo_mb', ['default' => get_template_directory_uri() . '/assets/img/Logo Principal Couleur.png']);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'kabowd_logo_mb', [
        'label' => __('Logo mobile', 'kabowd'),
        'section' => 'kabowd_header',
        'settings' => 'kabowd_logo_mb',
    ]));

    // Texte alternatif du logo mobile
    $wp_customize->add_setting('kabowd_logo_mb_alt', ['default' => 'Logo Kabowd']);
    $wp_customize->add_control('kabowd_logo_mb_alt', [
        'label' => __('Texte alternatif du logo mobile', 'kabowd'),
        'section' => 'kabowd_header',
        'type' => 'text',
    ]);

    // Placeholder et bouton de recherche
    $wp_customize->add_setting('kabowd_search_placeholder', ['default' => 'Search...']);
    $wp_customize->add_control('kabowd_search_placeholder', [
        'label' => __('Placeholder de recherche', 'kabowd'),
        'section' => 'kabowd_header',
        'type' => 'text',
    ]);
    $wp_customize->add_setting('kabowd_search_button', ['default' => 'Go']);
    $wp_customize->add_control('kabowd_search_button', [
        'label' => __('Texte du bouton de recherche', 'kabowd'),
        'section' => 'kabowd_header',
        'type' => 'text',
    ]);

    // Réseaux sociaux
    $wp_customize->add_setting('kabowd_linkedin_url', ['default' => '#']);
    $wp_customize->add_control('kabowd_linkedin_url', [
        'label' => __('Lien Linkedin', 'kabowd'),
        'section' => 'kabowd_header',
        'type' => 'url',
    ]);
    $wp_customize->add_setting('kabowd_facebook_url', ['default' => '#']);
    $wp_customize->add_control('kabowd_facebook_url', [
        'label' => __('Lien Facebook', 'kabowd'),
        'section' => 'kabowd_header',
        'type' => 'url',
    ]);
    $wp_customize->add_setting('kabowd_github_url', ['default' => '#']);
    $wp_customize->add_control('kabowd_github_url', [
        'label' => __('Lien GitHub', 'kabowd'),
        'section' => 'kabowd_header',
        'type' => 'url',
    ]);
    $wp_customize->add_setting('kabowd_instagram_url', ['default' => '#']);
    $wp_customize->add_control('kabowd_instagram_url', [
        'label' => __('Lien Instagram', 'kabowd'),
        'section' => 'kabowd_header',
        'type' => 'url',
    ]);
    $wp_customize->add_setting('kabowd_youtube_url', ['default' => '#']);
    $wp_customize->add_control('kabowd_youtube_url', [
        'label' => __('Lien YouTube', 'kabowd'),
        'section' => 'kabowd_header',
        'type' => 'url',
    ]);
    $wp_customize->add_setting('kabowd_rdv_url', ['default' => home_url('/contact')]);
    $wp_customize->add_control('kabowd_rdv_url', [
        'label' => __('Lien du bouton RDV', 'kabowd'),
        'section' => 'kabowd_header',
        'type' => 'url',
    ]);
    $wp_customize->add_setting('kabowd_rdv_text', ['default' => 'Prenez un Rendez-vous']);
    $wp_customize->add_control('kabowd_rdv_text', [
        'label' => __('Texte du bouton RDV', 'kabowd'),
        'section' => 'kabowd_header',
        'type' => 'text',
    ]);
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

// --- Customizer : personnalisation des réseaux sociaux ---
function kabowd_customize_socials($wp_customize) {
    $wp_customize->add_section('kabowd_socials', array(
        'title'    => __('Réseaux sociaux', 'kabowd'),
        'priority' => 60, // déplacé plus bas
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

// --- Customizer : personnalisation du footer ---
function kabowd_customize_footer($wp_customize) {
    $wp_customize->add_section('kabowd_footer', array(
        'title'    => __('Pied de page (Footer)', 'kabowd'),
        'priority' => 70, // déplacé plus bas
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



// --- Customizer : personnalisation des pages et articles ---
function kabowd_customize_content($wp_customize) {
    // Section pour les pages
    $wp_customize->add_section('kabowd_page_content', array(
        'title'    => __('Contenu des pages', 'kabowd'),
        'priority' => 80, // déplacé plus bas
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
        'priority' => 90, // déplacé plus bas
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

// --- Customizer : personnalisation de la page d'accueil ---
function kabowd_customize_homepage($wp_customize) {
    $wp_customize->add_section('kabowd_homepage', array(
        'title'    => __('Page d\'accueil personnalisée', 'kabowd'),
        'priority' => 10, // tout en haut après identité du site
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
        'priority' => 40, // après Secteur Unité
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
        'priority' => 20, // après accueil
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

    // Bouton 1
    $wp_customize->add_setting('kabowd_apropos_btn1_text', array('default' => 'Bouton 1'));
    $wp_customize->add_control('kabowd_apropos_btn1_text', array(
        'label' => __('Texte du bouton 1', 'kabowd'),
        'section' => 'kabowd_apropos',
        'type' => 'text',
    ));
    // Sélecteur de page ou article pour bouton 1
    $posts = get_posts(array('numberposts' => -1, 'post_type' => array('page', 'post'), 'orderby' => 'title', 'order' => 'ASC'));
    $post_choices = array('' => __('-- Sélectionner une page ou un article --', 'kabowd'));
    foreach ($posts as $post) {
        $post_choices[$post->ID] = $post->post_title . ' (' . get_post_type($post) . ')';
    }
    $wp_customize->add_setting('kabowd_apropos_btn1_post', array('default' => ''));
    $wp_customize->add_control('kabowd_apropos_btn1_post', array(
        'label' => __('Page/Article cible du bouton 1', 'kabowd'),
        'section' => 'kabowd_apropos',
        'type' => 'select',
        'choices' => $post_choices,
    ));
    // Champ URL personnalisée pour bouton 1
    $wp_customize->add_setting('kabowd_apropos_btn1_url', array('default' => ''));
    $wp_customize->add_control('kabowd_apropos_btn1_url', array(
        'label' => __('URL personnalisée du bouton 1 (prioritaire si renseignée)', 'kabowd'),
        'section' => 'kabowd_apropos',
        'type' => 'url',
    ));

    // Bouton 2
    $wp_customize->add_setting('kabowd_apropos_btn2_text', array('default' => 'Bouton 2'));
    $wp_customize->add_control('kabowd_apropos_btn2_text', array(
        'label' => __('Texte du bouton 2', 'kabowd'),
        'section' => 'kabowd_apropos',
        'type' => 'text',
    ));
    $wp_customize->add_setting('kabowd_apropos_btn2_post', array('default' => ''));
    $wp_customize->add_control('kabowd_apropos_btn2_post', array(
        'label' => __('Page/Article cible du bouton 2', 'kabowd'),
        'section' => 'kabowd_apropos',
        'type' => 'select',
        'choices' => $post_choices,
    ));
    $wp_customize->add_setting('kabowd_apropos_btn2_url', array('default' => ''));
    $wp_customize->add_control('kabowd_apropos_btn2_url', array(
        'label' => __('URL personnalisée du bouton 2 (prioritaire si renseignée)', 'kabowd'),
        'section' => 'kabowd_apropos',
        'type' => 'url',
    ));

    // Carrousel-Infini : images multiples (stockées sous forme de liste d'IDs séparés par des virgules)
    $wp_customize->add_setting('kabowd_apropos_carrousel_infini_ids', array(
        'default' => '',
        'sanitize_callback' => function($value) {
            // Nettoie la liste d'IDs (ex: "1,2,3")
            return implode(',', array_filter(array_map('intval', explode(',', $value))));
        }
    ));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'kabowd_apropos_carrousel_infini_ids',
        array(
            'label' => __('Images du Carrousel Infini (IDs séparés par des virgules)', 'kabowd'),
            'description' => __('Sélectionnez les images via la médiathèque (voir ci-dessous)', 'kabowd'),
            'section' => 'kabowd_apropos',
            'type' => 'text',
        )
    ));
}
add_action('customize_register', 'kabowd_customize_apropos');

// Utilitaire pour récupérer les IDs d'images du carrousel infini
function kabowd_apropos_carrousel_infini_ids() {
    $ids = get_theme_mod('kabowd_apropos_carrousel_infini_ids', '');
    if (!$ids) return [];
    return array_filter(array_map('intval', explode(',', $ids)));
}

// Ajoute un champ de sélection multiple d'images dans la médiathèque pour le Customizer (JS)
// (Ce JS ne s'affiche que dans le Customizer)
add_action('customize_controls_enqueue_scripts', function() {
    ?>
    <script>
    (function($){
        wp.customize.bind('ready', function() {
            // Ajoute un bouton pour ouvrir la médiathèque à côté du champ texte
            var $input = $('#customize-control-kabowd_apropos_carrousel_infini_ids input[type="text"]');
            if ($input.length && $('#kabowd-carrousel-infini-media-btn').length === 0) {
                var $btn = $('<button type="button" id="kabowd-carrousel-infini-media-btn" class="button" style="margin-left:10px;"><?php echo esc_js(__('Choisir des images', 'kabowd')); ?></button>');
                $input.after($btn);
                $btn.on('click', function(e){
                    e.preventDefault();
                    var frame = wp.media({
                        title: '<?php echo esc_js(__('Choisir des images pour le carrousel infini', 'kabowd')); ?>',
                        multiple: true,
                        library: { type: 'image' }
                    });
                    frame.on('select', function(){
                        var selection = frame.state().get('selection');
                        var ids = [];
                        selection.each(function(attachment){
                            ids.push(attachment.id);
                        });
                        $input.val(ids.join(',')).trigger('change');
                    });
                    frame.open();
                });
            }
        });
    })(jQuery);
    </script>
    <?php
});

// JS pour le Customizer : bouton de sélection multiple d'images pour le carrousel infini
add_action('customize_controls_print_footer_scripts', function() {
    ?>
    <script>
    (function($){
        wp.customize.bind('ready', function() {
            var $control = $('#customize-control-kabowd_apropos_carrousel_infini_ids');
            if ($control.length && $control.find('.kabowd-multi-image-btn').length === 0) {
                var $input = $control.find('input[type="text"]');
                var $btn = $('<button type="button" class="button kabowd-multi-image-btn" style="margin-left:10px;"><?php echo esc_js(__('Sélectionner des images', 'kabowd')); ?></button>');
                $input.after($btn);
                $btn.on('click', function(e){
                    e.preventDefault();
                    var frame = wp.media({
                        title: '<?php echo esc_js(__('Choisir des images pour le carrousel infini', 'kabowd')); ?>',
                        multiple: true,
                        library: { type: 'image' }
                    });
                    frame.on('select', function(){
                        var selection = frame.state().get('selection');
                        var ids = [];
                        selection.each(function(attachment){
                            ids.push(attachment.id);
                        });
                        $input.val(ids.join(',')).trigger('change');
                    });
                    frame.open();
                });
            }
        });
    })(jQuery);
    </script>
    <?php
});

// Utilitaire pour obtenir l'URL finale d'un bouton (priorité URL personnalisée, sinon page/article)
function kabowd_apropos_btn_url($btn = 1) {
    $url = trim(get_theme_mod("kabowd_apropos_btn{$btn}_url", ''));
    if (!empty($url)) return $url;
    $post_id = get_theme_mod("kabowd_apropos_btn{$btn}_post", '');
    if (!empty($post_id) && get_permalink($post_id)) return get_permalink($post_id);
    return '#';
}




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

// --- Activation des catégories, étiquettes et extraits pour les pages ---
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

// Afficher la metabox "Champs personnalisés" par défaut pour les pages
add_action('admin_init', function() {
    $screen = get_current_screen();
    if ($screen && $screen->post_type === 'page') {
        add_post_type_support('page', 'custom-fields');
    }
});


// Metabox avancée pour chaque section .Block-Main du template page-a-propos.php (images via médiathèque)
add_action('add_meta_boxes', function() {
    add_meta_box(
        'kabowd_apropos_sections',
        __('Sections personnalisées (À propos)', 'blankslateKabowd'),
        function($post) {
            $template = get_post_meta($post->ID, '_wp_page_template', true);
            if ($template !== 'templates/page-a-propos.php') {
                echo '<p>' . __('Cette metabox s’affiche uniquement pour le template À propos.', 'blankslateKabowd') . '</p>';
                return;
            }
            // Champs principaux
            $titre = get_post_meta($post->ID, 'kabowd_apropos_titre', true);
            $sous_titre = get_post_meta($post->ID, 'kabowd_apropos_sous_titre', true);
            $logo_id = get_post_meta($post->ID, 'kabowd_apropos_logo_id', true);
            $paragraphe = get_post_meta($post->ID, 'kabowd_apropos_paragraphe', true);
            $btn1 = get_post_meta($post->ID, 'kabowd_apropos_btn1', true);
            $btn1_url = get_post_meta($post->ID, 'kabowd_apropos_btn1_url', true);
            $btn2 = get_post_meta($post->ID, 'kabowd_apropos_btn2', true);
            $btn2_url = get_post_meta($post->ID, 'kabowd_apropos_btn2_url', true);

            // Champs formulaires
            $contact_titre = get_post_meta($post->ID, 'kabowd_apropos_contact_titre', true);
            $contact_form_titre = get_post_meta($post->ID, 'kabowd_apropos_contact_form_titre', true);
            $contact_form_btn = get_post_meta($post->ID, 'kabowd_apropos_contact_form_btn', true);

            $team_form_titre = get_post_meta($post->ID, 'kabowd_apropos_team_form_titre', true);
            $team_form_btn = get_post_meta($post->ID, 'kabowd_apropos_team_form_btn', true);

            $collab_form_titre = get_post_meta($post->ID, 'kabowd_apropos_collab_form_titre', true);
            $collab_form_btn = get_post_meta($post->ID, 'kabowd_apropos_collab_form_btn', true);

            // Carrousel images (tableau d'IDs)
            $carousel_ids = get_post_meta($post->ID, 'kabowd_apropos_carousel_ids', true);
            if (!is_array($carousel_ids)) $carousel_ids = [];

            ?>
            <h4><?php _e('Section 1 : Bloc titre', 'blankslateKabowd'); ?></h4>
            <p>
                <label><strong><?php _e('Titre principal', 'blankslateKabowd'); ?></strong></label><br>
                <input type="text" name="kabowd_apropos_titre" value="<?php echo esc_attr($titre); ?>" style="width:100%;">
            </p>
            <p>
                <label><strong><?php _e('Sous-titre', 'blankslateKabowd'); ?></strong></label><br>
                <input type="text" name="kabowd_apropos_sous_titre" value="<?php echo esc_attr($sous_titre); ?>" style="width:100%;">
            </p>
            <p>
                <label><strong><?php _e('Logo (image)', 'blankslateKabowd'); ?></strong></label><br>
                <input type="hidden" id="kabowd_apropos_logo_id" name="kabowd_apropos_logo_id" value="<?php echo esc_attr($logo_id); ?>">
                <button type="button" class="button kabowd-media-upload" data-target="kabowd_apropos_logo_id"><?php _e('Choisir une image', 'blankslateKabowd'); ?></button>
                <span class="kabowd-media-preview">
                    <?php if ($logo_id && wp_attachment_is_image($logo_id)) echo wp_get_attachment_image($logo_id, 'thumbnail'); ?>
                </span>
            </p>
            <p>
                <label><strong><?php _e('Paragraphe principal', 'blankslateKabowd'); ?></strong></label><br>
                <textarea name="kabowd_apropos_paragraphe" style="width:100%;height:60px;"><?php echo esc_textarea($paragraphe); ?></textarea>
            </p>
            <p>
                <label><strong><?php _e('Texte bouton 1', 'blankslateKabowd'); ?></strong></label><br>
                <input type="text" name="kabowd_apropos_btn1" value="<?php echo esc_attr($btn1); ?>" style="width:100%;">
            </p>
            <p>
                <label><strong><?php _e('Lien bouton 1 (URL ou ID page/article)', 'blankslateKabowd'); ?></strong></label><br>
                <input type="text" name="kabowd_apropos_btn1_url" value="<?php echo esc_attr($btn1_url); ?>" style="width:100%;">
                <em><?php _e('Collez une URL ou l\'ID d\'une page/article.', 'blankslateKabowd'); ?></em>
            </p>
            <p>
                <label><strong><?php _e('Texte bouton 2', 'blankslateKabowd'); ?></strong></label><br>
                <input type="text" name="kabowd_apropos_btn2" value="<?php echo esc_attr($btn2); ?>" style="width:100%;">
            </p>
            <p>
                <label><strong><?php _e('Lien bouton 2 (URL ou ID page/article)', 'blankslateKabowd'); ?></strong></label><br>
                <input type="text" name="kabowd_apropos_btn2_url" value="<?php echo esc_attr($btn2_url); ?>" style="width:100%;">
                <em><?php _e('Collez une URL ou l\'ID d\'une page/article.', 'blankslateKabowd'); ?></em>
            </p>
            <hr>
            <h4><?php _e('Section 2 : Bloc contact', 'blankslateKabowd'); ?></h4>
            <p>
                <label><strong><?php _e('Titre section contact', 'blankslateKabowd'); ?></strong></label><br>
                <input type="text" name="kabowd_apropos_contact_titre" value="<?php echo esc_attr($contact_titre); ?>" style="width:100%;">
            </p>
            <p>
                <label><strong><?php _e('Titre formulaire contact', 'blankslateKabowd'); ?></strong></label><br>
                <input type="text" name="kabowd_apropos_contact_form_titre" value="<?php echo esc_attr($contact_form_titre); ?>" style="width:100%;">
            </p>
            <p>
                <label><strong><?php _e('Texte bouton formulaire contact', 'blankslateKabowd'); ?></strong></label><br>
                <input type="text" name="kabowd_apropos_contact_form_btn" value="<?php echo esc_attr($contact_form_btn); ?>" style="width:100%;">
            </p>
            <hr>
            <h4><?php _e('Section 3 : Bloc équipe', 'blankslateKabowd'); ?></h4>
            <p>
                <label><strong><?php _e('Titre formulaire équipe', 'blankslateKabowd'); ?></strong></label><br>
                <input type="text" name="kabowd_apropos_team_form_titre" value="<?php echo esc_attr($team_form_titre); ?>" style="width:100%;">
            </p>
            <p>
                <label><strong><?php _e('Texte bouton formulaire équipe', 'blankslateKabowd'); ?></strong></label><br>
                <input type="text" name="kabowd_apropos_team_form_btn" value="<?php echo esc_attr($team_form_btn); ?>" style="width:100%;">
            </p>
            <hr>
            <h4><?php _e('Section 4 : Bloc collaboration', 'blankslateKabowd'); ?></h4>
            <p>
                <label><strong><?php _e('Titre formulaire collaboration', 'blankslateKabowd'); ?></strong></label><br>
                <input type="text" name="kabowd_apropos_collab_form_titre" value="<?php echo esc_attr($collab_form_titre); ?>" style="width:100%;">
            </p>
            <p>
                <label><strong><?php _e('Texte bouton formulaire collaboration', 'blankslateKabowd'); ?></strong></label><br>
                <input type="text" name="kabowd_apropos_collab_form_btn" value="<?php echo esc_attr($collab_form_btn); ?>" style="width:100%;">
            </p>
            <hr>
            <h4><?php _e('Section 5 : Carrousel d\'images', 'blankslateKabowd'); ?></h4>
            <p>
                <label><strong><?php _e('Images du carrousel', 'blankslateKabowd'); ?></strong></label><br>
                <input type="hidden" id="kabowd_apropos_carousel_ids" name="kabowd_apropos_carousel_ids" value="<?php echo esc_attr(implode(',', $carousel_ids)); ?>">
                <button type="button" class="button kabowd-media-multi-upload" data-target="kabowd_apropos_carousel_ids"><?php _e('Choisir des images', 'blankslateKabowd'); ?></button>
                <span class="kabowd-media-preview">
                    <?php
                    foreach ($carousel_ids as $img_id) {
                        if (wp_attachment_is_image($img_id)) echo wp_get_attachment_image($img_id, 'thumbnail', false, ['style'=>'margin:2px;']);
                    }
                    ?>
                </span>
            </p>
            <p style="color:#666;font-size:0.95em;">
                <?php _e('Pour voir le rendu, cliquez sur "Aperçu" ou "Voir la page" après avoir enregistré.', 'blankslateKabowd'); ?>
            </p>
            <?php
            wp_nonce_field('kabowd_apropos_sections_nonce', 'kabowd_apropos_sections_nonce_field');
        },
        'page',
        'side',
        'high'
    );
});

// JS pour la sélection d'images via la médiathèque (logo + carrousel)
add_action('admin_footer', function() {
    global $post;
    if (!isset($post) || get_post_meta($post->ID, '_wp_page_template', true) !== 'templates/page-a-propos.php') return;
    ?>
    <script>
    jQuery(document).ready(function($){
        // Image simple
        $('.kabowd-media-upload').click(function(e){
            e.preventDefault();
            var button = $(this);
            var target = $('#' + button.data('target'));
            var preview = button.siblings('.kabowd-media-preview');
            var frame = wp.media({ title: 'Choisir une image', multiple: false, library: { type: 'image' } });
            frame.on('select', function(){
                var attachment = frame.state().get('selection').first().toJSON();
                target.val(attachment.id);
                preview.html('<img src="'+attachment.sizes.thumbnail.url+'" style="max-width:80px;">');
            });
            frame.open();
        });
        // Images multiples
        $('.kabowd-media-multi-upload').click(function(e){
            e.preventDefault();
            var button = $(this);
            var target = $('#' + button.data('target'));
            var preview = button.siblings('.kabowd-media-preview');
            var frame = wp.media({ title: 'Choisir des images', multiple: true, library: { type: 'image' } });
            frame.on('select', function(){
                var selection = frame.state().get('selection');
                var ids = [];
                var html = '';
                selection.each(function(attachment){
                    ids.push(attachment.id);
                    html += '<img src="'+attachment.attributes.sizes.thumbnail.url+'" style="max-width:60px;margin:2px;">';
                });
                target.val(ids.join(','));
                preview.html(html);
            });
            frame.open();
        });
    });
    </script>
    <?php
});

// Sauvegarde des champs personnalisés pour chaque section (avec images)
add_action('save_post_page', function($post_id) {
    if (!isset($_POST['kabowd_apropos_sections_nonce_field']) || !wp_verify_nonce($_POST['kabowd_apropos_sections_nonce_field'], 'kabowd_apropos_sections_nonce')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_page', $post_id)) return;
    $fields = [
        'kabowd_apropos_titre',
        'kabowd_apropos_sous_titre',
        'kabowd_apropos_logo_id',
        'kabowd_apropos_paragraphe',
        'kabowd_apropos_btn1',
        'kabowd_apropos_btn1_url',
        'kabowd_apropos_btn2',
        'kabowd_apropos_btn2_url',
        'kabowd_apropos_contact_titre',
        'kabowd_apropos_contact_form_titre',
        'kabowd_apropos_contact_form_btn',
        'kabowd_apropos_team_form_titre',
        'kabowd_apropos_team_form_btn',
        'kabowd_apropos_collab_form_titre',
        'kabowd_apropos_collab_form_btn',
    ];
    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
        }
    }
    // Carrousel d'images (tableau d'IDs)
    if (isset($_POST['kabowd_apropos_carousel_ids'])) {
        $ids = array_filter(array_map('intval', explode(',', $_POST['kabowd_apropos_carousel_ids'])));
        update_post_meta($post_id, 'kabowd_apropos_carousel_ids', $ids);
    }
});



// Forcer l'utilisation du modèle 404.php pour les erreurs 404
add_action('template_redirect', function() {
    if (is_404()) {
        status_header(404);
        include get_template_directory() . '/404.php';
        exit;
    }
});

// Ajouter une section pour personnaliser la page 404 dans le Customizer
function kabowd_customize_404($wp_customize) {
    $wp_customize->add_section('kabowd_404', array(
        'title'    => __('Page d\'erreur 404', 'kabowd'),
        'priority' => 80,
    ));

    // Titre principal
    $wp_customize->add_setting('kabowd_404_title', array(
        'default'           => __('Erreur 404', 'kabowd'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('kabowd_404_title', array(
        'label'    => __('Titre principal', 'kabowd'),
        'section'  => 'kabowd_404',
        'type'     => 'text',
    ));

    // Sous-titre
    $wp_customize->add_setting('kabowd_404_subtitle', array(
        'default'           => __('Page non trouvée', 'kabowd'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('kabowd_404_subtitle', array(
        'label'    => __('Sous-titre', 'kabowd'),
        'section'  => 'kabowd_404',
        'type'     => 'text',
    ));

    // Message d'erreur
    $wp_customize->add_setting('kabowd_404_message', array(
        'default'           => __('La page que vous cherchez n’existe pas ou a été déplacée.', 'kabowd'),
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('kabowd_404_message', array(
        'label'    => __('Message d\'erreur', 'kabowd'),
        'section'  => 'kabowd_404',
        'type'     => 'textarea',
    ));

    // Image d'illustration (URL ou médiathèque)
    $wp_customize->add_setting('kabowd_404_image', array(
        'default'           => get_template_directory_uri() . '/assets/img/404-default.png',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('kabowd_404_image', array(
        'label'    => __('Image d\'illustration (URL)', 'kabowd'),
        'section'  => 'kabowd_404',
        'type'     => 'url',
    ));

    // Boutons de redirection
    for ($i = 1; $i <= 10; $i++) {
        $wp_customize->add_setting("kabowd_404_button_text_$i", array(
            'default'           => $i === 1 ? __('Accueil', 'kabowd') : '',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("kabowd_404_button_text_$i", array(
            'label'    => sprintf(__('Texte du bouton %d', 'kabowd'), $i),
            'section'  => 'kabowd_404',
            'type'     => 'text',
        ));

        $wp_customize->add_setting("kabowd_404_button_url_$i", array(
            'default'           => $i === 1 ? home_url('/') : '',
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control("kabowd_404_button_url_$i", array(
            'label'    => sprintf(__('URL personnalisée du bouton %d', 'kabowd'), $i),
            'section'  => 'kabowd_404',
            'type'     => 'url',
        ));

        $wp_customize->add_setting("kabowd_404_button_page_$i", array(
            'default'           => '',
            'sanitize_callback' => 'absint',
        ));
        $wp_customize->add_control("kabowd_404_button_page_$i", array(
            'label'    => sprintf(__('Page ou article cible du bouton %d', 'kabowd'), $i),
            'section'  => 'kabowd_404',
            'type'     => 'dropdown-pages',
        ));
    }
}
add_action('customize_register', 'kabowd_customize_404');

// Utilitaire pour obtenir l'URL finale d'un bouton (priorité à la page/article, sinon URL personnalisée)
function kabowd_404_get_button_url($index) {
    $page_id = get_theme_mod("kabowd_404_button_page_$index", '');
    if ($page_id) {
        return get_permalink($page_id);
    }
    return get_theme_mod("kabowd_404_button_url_$index", '#');
}

// Recherchez des fonctions comme celles-ci :
// print_r($widget_data); // Supprimez ou commentez cette ligne
// var_dump($widget_data); // Supprimez ou commentez cette ligne

// Ajout des options pour la page Services
function kabowd_customize_services($wp_customize) {
    $wp_customize->add_section('kabowd_services', array(
        'title'    => __('Page Services', 'kabowd'),
        'priority' => 30,
    ));

    // Titre principal
    $wp_customize->add_setting('kabowd_services_title', array('default' => ''));
    $wp_customize->add_control('kabowd_services_title', array(
        'label' => __('Titre principal', 'kabowd'),
        'section' => 'kabowd_services',
        'type' => 'text',
    ));

    // Sous-titre
    $wp_customize->add_setting('kabowd_services_subtitle', array('default' => ''));
    $wp_customize->add_control('kabowd_services_subtitle', array(
        'label' => __('Sous-titre', 'kabowd'),
        'section' => 'kabowd_services',
        'type' => 'text',
    ));

    // Logo
    $wp_customize->add_setting('kabowd_services_logo', array('default' => get_template_directory_uri() . '/assets/img/Icon Logo Principal Blanc.png'));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'kabowd_services_logo', array(
        'label' => __('Logo', 'kabowd'),
        'section' => 'kabowd_services',
        'settings' => 'kabowd_services_logo',
    )));

    // Paragraphe
    $wp_customize->add_setting('kabowd_services_paragraph', array('default' => ''));
    $wp_customize->add_control('kabowd_services_paragraph', array(
        'label' => __('Paragraphe', 'kabowd'),
        'section' => 'kabowd_services',
        'type' => 'textarea',
    ));

    // Description des statistiques
    $wp_customize->add_setting('kabowd_services_stats_desc', array('default' => ''));
    $wp_customize->add_control('kabowd_services_stats_desc', array(
        'label' => __('Description des statistiques', 'kabowd'),
        'section' => 'kabowd_services',
        'type' => 'textarea',
    ));

    // Statistiques (valeurs et labels)
    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting("kabowd_services_stat_value_$i", array('default' => '00%'));
        $wp_customize->add_control("kabowd_services_stat_value_$i", array(
            'label' => __("Valeur Statistique $i", 'kabowd'),
            'section' => 'kabowd_services',
            'type' => 'text',
        ));

        $wp_customize->add_setting("kabowd_services_stat_label_$i", array('default' => "Statistique $i"));
        $wp_customize->add_control("kabowd_services_stat_label_$i", array(
            'label' => __("Label Statistique $i", 'kabowd'),
            'section' => 'kabowd_services',
            'type' => 'text',
        ));
    }

    // Titre du carrousel
    $wp_customize->add_setting('kabowd_services_carousel_title', array('default' => __('Nos Services', 'kabowd')));
    $wp_customize->add_control('kabowd_services_carousel_title', array(
        'label' => __('Titre du carrousel', 'kabowd'),
        'section' => 'kabowd_services',
        'type' => 'text',
    ));

    // Texte supplémentaire
    $wp_customize->add_setting('kabowd_services_extra_text', array('default' => ''));
    $wp_customize->add_control('kabowd_services_extra_text', array(
        'label' => __('Texte supplémentaire', 'kabowd'),
        'section' => 'kabowd_services',
        'type' => 'textarea',
    ));

    // Images du carrousel infini (IDs)
    $wp_customize->add_setting('kabowd_services_infinite_carousel_ids', array(
        'default' => '',
        'sanitize_callback' => function($value) {
            return implode(',', array_filter(array_map('intval', explode(',', $value))));
        }
    ));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'kabowd_services_infinite_carousel_ids',
        array(
            'label' => __('Images du Carrousel Infini (IDs séparés par des virgules)', 'kabowd'),
            'description' => __('Sélectionnez les images via la médiathèque (voir ci-dessous)', 'kabowd'),
            'section' => 'kabowd_services',
            'type' => 'text',
        )
    ));

    // Titre du carrousel
    $wp_customize->add_setting('kabowd_services_carousel_title', array('default' => __('Nos Services', 'kabowd')));
    $wp_customize->add_control('kabowd_services_carousel_title', array(
        'label' => __('Titre du carrousel', 'kabowd'),
        'section' => 'kabowd_services',
        'type' => 'text',
    ));

    // Description du carrousel
    $wp_customize->add_setting('kabowd_services_carousel_desc', array('default' => ''));
    $wp_customize->add_control('kabowd_services_carousel_desc', array(
        'label' => __('Description du carrousel', 'kabowd'),
        'section' => 'kabowd_services',
        'type' => 'textarea',
    ));

    // Catégorie de pages à afficher
    $categories = get_categories(array('hide_empty' => false));
    $cat_choices = array('' => __('-- Sélectionner --', 'kabowd'));
    foreach ($categories as $cat) {
        $cat_choices[$cat->slug] = $cat->name;
    }
    $wp_customize->add_setting('kabowd_services_carousel_cat', array('default' => ''));
    $wp_customize->add_control('kabowd_services_carousel_cat', array(
        'label' => __('Catégorie de pages à afficher', 'kabowd'),
        'section' => 'kabowd_services',
        'type' => 'select',
        'choices' => $cat_choices,
    ));

    // Page cible du titre du carrousel
    $pages = get_pages(array('sort_column' => 'post_title', 'sort_order' => 'asc'));
    $page_choices = array('' => __('-- Sélectionner une page --', 'kabowd'));
    foreach ($pages as $page) {
        $page_choices[$page->ID] = $page->post_title;
    }
    $wp_customize->add_setting('kabowd_services_carousel_page', array('default' => ''));
    $wp_customize->add_control('kabowd_services_carousel_page', array(
        'label' => __('Page cible du titre du carrousel', 'kabowd'),
        'section' => 'kabowd_services',
        'type' => 'select',
        'choices' => $page_choices,
    ));

    // URL personnalisée du titre du carrousel
    $wp_customize->add_setting('kabowd_services_carousel_url', array('default' => ''));
    $wp_customize->add_control('kabowd_services_carousel_url', array(
        'label' => __('URL personnalisée du titre du carrousel (prioritaire si renseignée)', 'kabowd'),
        'section' => 'kabowd_services',
        'type' => 'url',
    ));
}
add_action('customize_register', 'kabowd_customize_services');

// Utilitaire pour récupérer les IDs d'images du carrousel infini pour la page Services
function kabowd_services_carrousel_infini_ids() {
    $ids = get_theme_mod('kabowd_services_infinite_carousel_ids', '');
    if (!$ids) return [];
    return array_filter(array_map('intval', explode(',', $ids)));
}

// Ajoute un champ de sélection multiple d'images dans la médiathèque pour le Customizer (JS)
add_action('customize_controls_enqueue_scripts', function() {
    ?>
    <script>
    (function($){
        wp.customize.bind('ready', function() {
            var $input = $('#customize-control-kabowd_services_infinite_carousel_ids input[type="text"]');
            if ($input.length && $('#kabowd-services-carrousel-infini-media-btn').length === 0) {
                var $btn = $('<button type="button" id="kabowd-services-carrousel-infini-media-btn" class="button" style="margin-left:10px;"><?php echo esc_js(__('Choisir des images', 'kabowd')); ?></button>');
                $input.after($btn);
                $btn.on('click', function(e){
                    e.preventDefault();
                    var frame = wp.media({
                        title: '<?php echo esc_js(__('Choisir des images pour le carrousel infini', 'kabowd')); ?>',
                        multiple: true,
                        library: { type: 'image' }
                    });
                    frame.on('select', function(){
                        var selection = frame.state().get('selection');
                        var ids = [];
                        selection.each(function(attachment){
                            ids.push(attachment.id);
                        });
                        $input.val(ids.join(',')).trigger('change');
                    });
                    frame.open();
                });
            }
        });
    })(jQuery);
    </script>
    <?php
});

// Ajoute un champ de sélection multiple d'images dans la médiathèque pour le Customizer (JS)
add_action('customize_controls_enqueue_scripts', function() {
    ?>
    <script>
    (function($){
        wp.customize.bind('ready', function() {
            // Ajoute un bouton pour ouvrir la médiathèque à côté des champs texte contenant des IDs d'images
            var selectors = [
                '#customize-control-kabowd_services_infinite_carousel_ids input[type="text"]',
                '#customize-control-kabowd_apropos_carrousel_infini_ids input[type="text"]'
            ];
            selectors.forEach(function(selector) {
                var $input = $(selector);
                if ($input.length && $input.siblings('.kabowd-media-btn').length === 0) {
                    var $btn = $('<button type="button" class="button kabowd-media-btn" style="margin-left:10px;"><?php echo esc_js(__('Choisir des images', 'kabowd')); ?></button>');
                    $input.after($btn);
                    $btn.on('click', function(e){
                        e.preventDefault();
                        var frame = wp.media({
                            title: '<?php echo esc_js(__('Choisir des images', 'kabowd')); ?>',
                            multiple: true,
                            library: { type: 'image' }
                        });
                        frame.on('select', function(){
                            var selection = frame.state().get('selection');
                            var ids = [];
                            selection.each(function(attachment){
                                ids.push(attachment.id);
                            });
                            $input.val(ids.join(',')).trigger('change');
                        });
                        frame.open();
                    });
                }
            });
        });
    })(jQuery);
    </script>
    <?php
});

// Ajoute un style CSS pour s'assurer que les boutons sont bien visibles
add_action('customize_controls_print_styles', function() {
    ?>
    <style>
        .kabowd-media-btn {
            margin-top: 5px;
        }
    </style>
    <?php
});

?>
