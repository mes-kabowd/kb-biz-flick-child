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

?>
