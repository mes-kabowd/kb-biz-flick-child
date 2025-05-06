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
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/Logo Principal Couleur.png' ); ?>" alt="Logo Kabowd">
            </a>
        </div>
        <form onsubmit="event.preventDefault();" role="search" class="BarreRechercheMb">
            <input id="search" type="search" placeholder="Search..." autofocus required />
            <button type="submit">Go</button>    
        </form>
        <input type="checkbox" class="menu" id="BtnBurger">
        <section class="ContenuHeader">
            <div class="Logo">
                <a href="<?php echo esc_url( home_url('/') ); ?>">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/Logo Principal Couleur.png' ); ?>" alt="Logo Kabowd">
                </a>
            </div>
            <nav class="MenuHaut">
                <ul>
                    <li>
                        <form onsubmit="event.preventDefault();" role="search" class="BarreRecherche">
                            <input id="search" type="search" placeholder="Search..." autofocus required />
                            <button type="submit">Go</button>    
                        </form>
                    </li>
                    <li><a href="<?php echo esc_url( wp_login_url() ); ?>">Connexion</a></li>
                </ul>
            </nav>
            <div class="ReseauxSociaux">
                <a href="#"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/Linkedin.svg' ); ?>" alt="Linkedin"></a>
                <a href="#"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/Facebook.svg' ); ?>" alt="Facebook"></a>
                <a href="#"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/GitHub.svg' ); ?>" alt="GitHub"></a>
                <a href="#"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/Instagram.svg' ); ?>" alt="Instagram"></a>
                <a href="#"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/YouTube.svg' ); ?>" alt="YouTube"></a>
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
                <a href="<?php echo esc_url( home_url('/contact') ); ?>">Prenez un Rendez-vous</a>
            </div>
        </section>
    </nav>
</header>