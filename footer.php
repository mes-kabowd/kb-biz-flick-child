<footer>
    <section class="VoletGauche">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="Logo">
            <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/Logo Principal Couleur.png' ); ?>" alt="<?php bloginfo( 'name' ); ?>">
        </a>
        <div class="ReseauxSociaux">
            <a href="#"><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/Linkedin.svg' ); ?>" alt="LinkedIn"></a>
            <a href="#"><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/Facebook.svg' ); ?>" alt="Facebook"></a>
            <a href="#"><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/GitHub.svg' ); ?>" alt="GitHub"></a>
            <a href="#"><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/Instagram.svg' ); ?>" alt="Instagram"></a>
            <a href="#"><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/YouTube.svg' ); ?>" alt="YouTube"></a>
        </div>
    </section>
    <section class="VoletCentre">
        <?php
        wp_nav_menu( array(
            'theme_location' => 'footer-menu',
            'menu_class'     => 'menu-footer',
            'container'      => false,
        ) );
        ?>
    </section>
    <section class="VoletDroite">
        <ul>
            <li>Numéro de Tel</li>
            <li>Adresse</li>
            <li>Courriel</li>
            <li>Crédit</li>
        </ul>
    </section>
</footer>
<?php wp_footer(); ?>
</body>
</html>