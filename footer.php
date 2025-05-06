<footer>
    <section class="VoletGauche">
        <a href="<?php echo esc_url( home_url('/') ); ?>" class="Logo">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/Logo Principal Couleur.png' ); ?>" alt="Logo Kabowd">
        </a>
        <div class="ReseauxSociaux">
            <a href="#"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/Linkedin.svg' ); ?>" alt="Linkedin"></a>
            <a href="#"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/Facebook.svg' ); ?>" alt="Facebook"></a>
            <a href="#"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/GitHub.svg' ); ?>" alt="GitHub"></a>
            <a href="#"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/Instagram.svg' ); ?>" alt="Instagram"></a>
            <a href="#"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/YouTube.svg' ); ?>" alt="YouTube"></a>
        </div>
    </section>
    <section class="VoletCentre">
        <ul class="Services">
            <li><a href="<?php echo esc_url( home_url('/services') ); ?>">Services</a></li>
            <!-- Utilisez un Custom Post Type ou ACF pour générer dynamiquement la liste des services -->
        </ul>
        <ul class="Secteurs">
            <li><a href="<?php echo esc_url( home_url('/secteurs') ); ?>">Secteurs</a></li>
            <!-- Idem pour les secteurs -->
        </ul>
        <ul class="Blog">
            <li><a href="<?php echo esc_url( home_url('/blog') ); ?>">Blog</a></li>
        </ul>
        <ul class="APropos">
            <li><a href="<?php echo esc_url( home_url('/a-propos') ); ?>">À propos</a></li>
        </ul>
        <ul class="PrenezRDV">
            <li><a href="<?php echo esc_url( home_url('/contact') ); ?>" class="Rdv">Prenez un Rendez-vous</a></li>
        </ul>
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