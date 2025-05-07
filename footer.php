<footer class="footer">
    <section class="VoletGauche">
        <a href="<?php echo esc_url( home_url('/') ); ?>" class="Logo">
            <img src="<?php echo esc_url( get_theme_mod('kabowd_logo_mb', get_template_directory_uri() . '/assets/img/Logo Principal Couleur.png') ); ?>" alt="<?php echo esc_attr( get_theme_mod('kabowd_logo_mb_alt', 'Logo Kabowd') ); ?>">
        </a>
        <div class="ReseauxSociaux">
            <?php foreach (kabowd_get_social_networks() as $social) : ?>
                <a href="<?php echo esc_url($social['url']); ?>" target="_blank" rel="noopener">
                    <img src="<?php echo esc_url($social['icon']); ?>" alt="<?php echo esc_attr($social['name']); ?>">
                    <?php if (!empty($social['show_label'])) : ?>
                        <span><?php echo esc_html($social['name']); ?></span>
                    <?php endif; ?>
                </a>
            <?php endforeach; ?>
        </div>
    </section>
    <section class="VoletCentre">
        <!-- <ul class="Services">
            <li><a href="<?php echo esc_url( home_url('/services') ); ?>">Services</a></li>
        </ul>
        <ul class="Secteurs">
            <li><a href="<?php echo esc_url( home_url('/secteurs') ); ?>">Secteurs</a></li>
        </ul>
        <ul class="Blog">
            <li><a href="<?php echo esc_url( home_url('/blog') ); ?>">Blog</a></li>
        </ul>
        <ul class="APropos">
            <li><a href="<?php echo esc_url( home_url('/a-propos') ); ?>">À propos</a></li>
        </ul>
        <ul class="PrenezRDV">
            <li><a href="<?php echo esc_url( home_url('/contact') ); ?>" class="Rdv">Prenez un Rendez-vous</a></li>
        </ul> -->
        <?php
        // Menu de navigation du footer (modifiable dans Apparence > Menus)
        wp_nav_menu(array(
            'theme_location' => 'footer-menu',
            'container'      => false,
            'menu_class'     => 'FooterNav',
            'fallback_cb'    => false,
            'items_wrap'     => '<ul class="FooterNav">%3$s</ul>',
        ));
        ?>
    </section>
    <section class="VoletDroite">
        <ul>
            <?php if ($phone = get_theme_mod('kabowd_footer_phone')): ?>
                <li><?php echo esc_html($phone); ?></li>
            <?php endif; ?>
            <?php if ($address = get_theme_mod('kabowd_footer_address')): ?>
                <li><?php echo esc_html($address); ?></li>
            <?php endif; ?>
            <?php if ($email = get_theme_mod('kabowd_footer_email')): ?>
                <li><a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></li>
            <?php endif; ?>
            <?php if ($credit = get_theme_mod('kabowd_footer_credit')): ?>
                <li><?php echo esc_html($credit); ?></li>
            <?php endif; ?>
        </ul>
    </section>
</footer>
<?php wp_footer(); ?>
</body>
</html>