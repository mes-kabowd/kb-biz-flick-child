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
            <a href="index.html"><img src="assets/img/Logo Principal Couleur.png" alt=""></a>
            <!-- <a href="index.html"><img src="assets/img/Logo Principal Blanc.png" alt=""></a> -->
        </div>
        <form onsubmit="event.preventDefault();" role="search" class="BarreRechercheMb">
            <input id="search" type="search" placeholder="Search..." autofocus required />
            <button type="submit">Go</button>    
        </form>

        
        <input type="checkbox" name="" class="menu" id="BtnBurger">
        <section class="ContenuHeader">
            <div class="Logo">
                <a href="index.html"><img src="assets/img/Logo Principal Couleur.png" alt=""></a>
            </div>
            <nav class="MenuHaut">
                <ul>
                    <li>
                        <form onsubmit="event.preventDefault();" role="search" class="BarreRecherche">
                            <input id="search" type="search" placeholder="Search..." autofocus required />
                            <button type="submit">Go</button>    
                        </form>
                    </li>
                    <li><a href="Recherche.html">Connexion</a></li>
                </ul>
            </nav>
            <div class="ReseauxSociaux">
                <a href=""><img src="assets/img/Linkedin.svg" alt=""></a>
                <a href=""><img src="assets/img/Facebook.svg" alt=""></a>
                <a href=""><img src="assets/img/GitHub.svg" alt=""></a>
                <a href=""><img src="assets/img/Instagram.svg" alt=""></a>
                <a href=""><img src="assets/img/YouTube.svg" alt=""></a>
            </div>
            <nav class="MenuBas">
                <ul>
                    <li><a href="Services.html">Services</a></li>
                    <li><a href="Secteurs.html">Secteurs</a></li>
                    <li><a href="Blogs.html">Blog</a></li>
                    <li><a href="A-Propos.html">À propos</a></li>
                </ul>
            </nav>
            <div class="Rdv">
                <a href="erreur404.html">Prenez un Rendez-vous</a>
            </div>
        </section>
    </nav>
</header>