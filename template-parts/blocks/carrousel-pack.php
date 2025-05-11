<section class="Carrousel-pack Block-Main">
    <article class="Block-Haut">
        <h2><?php esc_html_e('Nos Packs', 'blankslateKabowd'); ?></h2>
        <p><?php esc_html_e('Découvrez nos offres et packs adaptés à vos besoins.', 'blankslateKabowd'); ?></p>
    </article>
    <ul class="Carrousel">
        <?php for ($i = 1; $i <= 3; $i++) : ?>
            <li class="carte">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/Icon Logo Principal ' . ($i === 1 ? 'Blanc' : ($i === 2 ? 'Couleur' : 'Noir')) . '.png'); ?>" alt="">
                <div class="Contenue-Carte">
                    <h5 class="Titre-Carte"><?php printf(esc_html__('Titre du pack %d', 'blankslateKabowd'), $i); ?></h5>
                    <p><?php printf(esc_html__('Description courte du pack %d.', 'blankslateKabowd'), $i); ?></p>
                    <a href="#" class="btn btn-primary"><?php esc_html_e('Découvrir', 'blankslateKabowd'); ?></a>
                </div>
            </li>
        <?php endfor; ?>
    </ul>
</section>