<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header>
        <nav class="NavHeader">
            <div class="LogoMb">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/Logo Principal Couleur.png' ); ?>" alt="<?php bloginfo( 'name' ); ?>">
                </a>
            </div>
            <?php get_search_form(); ?>
            <input type="checkbox" name="" class="menu" id="BtnBurger">
            <section class="ContenuHeader">
                <div class="Logo">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/Logo Principal Couleur.png' ); ?>" alt="<?php bloginfo( 'name' ); ?>">
                    </a>
                </div>
                <nav class="MenuHaut">
                    <ul>
                        <li>
                            <!-- On peut utiliser le formulaire de recherche WordPress -->
                            <?php get_search_form(); ?>
                        </li>
                        <li>
                            <!-- Lien vers la page Connexion -->
                            <a href="<?php echo esc_url( home_url( '/connexion' ) ); ?>">Connexion</a>
                        </li>
                    </ul>
                </nav>
                <div class="ReseauxSociaux">
                    <a href="#"><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/Linkedin.svg' ); ?>" alt="LinkedIn"></a>
                    <a href="#"><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/Facebook.svg' ); ?>" alt="Facebook"></a>
                    <a href="#"><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/GitHub.svg' ); ?>" alt="GitHub"></a>
                    <a href="#"><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/Instagram.svg' ); ?>" alt="Instagram"></a>
                    <a href="#"><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/YouTube.svg' ); ?>" alt="YouTube"></a>
                </div>
                <nav class="MenuBas">
                    <?php
                        wp_nav_menu( array(
                            'theme_location' => 'header-menu',
                            'menu_class'     => 'menu-header',
                            'container'      => false,
                        ) );
                    ?>
                </nav>
                <div class="Rdv">
                    <a href="<?php echo esc_url( home_url( '/rendez-vous' ) ); ?>">Prenez un Rendez-vous</a>
                </div>
            </section>
        </nav>
    </header>