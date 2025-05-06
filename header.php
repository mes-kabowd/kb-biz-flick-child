<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header>
    <nav class="NavHeader">
        <div class="LogoMb">
            <a href="<?php echo esc_url( home_url('/') ); ?>">
                <img src="<?php echo esc_url( get_theme_mod('kabowd_logo_mb', get_template_directory_uri() . '/assets/img/Logo Principal Couleur.png') ); ?>" alt="<?php echo esc_attr( get_theme_mod('kabowd_logo_mb_alt', 'Logo Kabowd') ); ?>">
            </a>
        </div>
        <form onsubmit="event.preventDefault();" role="search" class="BarreRechercheMb">
            <input id="search" type="search" placeholder="<?php echo esc_attr( get_theme_mod('kabowd_search_placeholder', 'Search...') ); ?>" autofocus required />
            <button type="submit"><?php echo esc_html( get_theme_mod('kabowd_search_button', 'Go') ); ?></button>    
        </form>
        <input type="checkbox" class="menu" id="BtnBurger">
        <section class="ContenuHeader">
            <div class="Logo">
                <a href="<?php echo esc_url( home_url('/') ); ?>">
                    <img src="<?php echo esc_url( get_theme_mod('kabowd_logo', get_template_directory_uri() . '/assets/img/Logo Principal Couleur.png') ); ?>" alt="<?php echo esc_attr( get_theme_mod('kabowd_logo_alt', 'Logo Kabowd') ); ?>">
                </a>
            </div>
            <nav class="MenuHaut">
                <ul>
                    <li>
                        <form onsubmit="event.preventDefault();" role="search" class="BarreRecherche">
                            <input id="search" type="search" placeholder="<?php echo esc_attr( get_theme_mod('kabowd_search_placeholder', 'Search...') ); ?>" autofocus required />
                            <button type="submit"><?php echo esc_html( get_theme_mod('kabowd_search_button', 'Go') ); ?></button>    
                        </form>
                    </li>
                    <li><a href="<?php echo esc_url( wp_login_url() ); ?>"><?php echo esc_html( get_theme_mod('kabowd_login_text', 'Connexion') ); ?></a></li>
                </ul>
            </nav>
            <div class="ReseauxSociaux">
                <?php if ( get_theme_mod('kabowd_show_linkedin', true) ) : ?>
                <a href="<?php echo esc_url( get_theme_mod('kabowd_linkedin_url', '#') ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/Linkedin.svg' ); ?>" alt="Linkedin"></a>
                <?php endif; ?>
                <?php if ( get_theme_mod('kabowd_show_facebook', true) ) : ?>
                <a href="<?php echo esc_url( get_theme_mod('kabowd_facebook_url', '#') ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/Facebook.svg' ); ?>" alt="Facebook"></a>
                <?php endif; ?>
                <?php if ( get_theme_mod('kabowd_show_github', true) ) : ?>
                <a href="<?php echo esc_url( get_theme_mod('kabowd_github_url', '#') ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/GitHub.svg' ); ?>" alt="GitHub"></a>
                <?php endif; ?>
                <?php if ( get_theme_mod('kabowd_show_instagram', true) ) : ?>
                <a href="<?php echo esc_url( get_theme_mod('kabowd_instagram_url', '#') ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/Instagram.svg' ); ?>" alt="Instagram"></a>
                <?php endif; ?>
                <?php if ( get_theme_mod('kabowd_show_youtube', true) ) : ?>
                <a href="<?php echo esc_url( get_theme_mod('kabowd_youtube_url', '#') ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/YouTube.svg' ); ?>" alt="YouTube"></a>
                <?php endif; ?>
            </div>
            <nav class="MenuBas">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'main-menu',
                    'container' => false,
                    'menu_class' => '',
                    'items_wrap' => '<ul>%3$s</ul>',
                ) );
                ?>
            </nav>
            <div class="Rdv">
                <a href="<?php echo esc_url( get_theme_mod('kabowd_rdv_url', home_url('/contact')) ); ?>"><?php echo esc_html( get_theme_mod('kabowd_rdv_text', 'Prenez un Rendez-vous') ); ?></a>
            </div>
        </section>
    </nav>
</header>
<!--
Ajoutez le code suivant dans functions.php pour permettre la personnalisation :
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
}
add_action('customize_register', 'kabowd_customize_register');