<section class="Stats Block-Main">
    <section class="Block-Gauche">
        <h2><?php esc_html_e('Statistiques', 'blankslateKabowd'); ?></h2>
        <p><?php echo esc_html(get_theme_mod('kabowd_stats_desc', __('Description des statistiques.', 'blankslateKabowd'))); ?></p>
    </section>
    <section class="Block-Droite">
        <div class="ImgStat">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/Icon Logo Principal Couleur.png'); ?>" alt="">
        </div>
    </section>
    <section class="Block-Bas">
        <?php for ($i = 1; $i <= 4; $i++) : ?>
            <article class="MiniStats">
                <h4 class="Valeur"><?php echo esc_html(get_theme_mod("kabowd_stats_value_$i", '00%')); ?></h4>
                <h3 class="Txt-Valeur"><?php echo esc_html(get_theme_mod("kabowd_stats_label_$i", "Type de Statistiques $i")); ?></h3>
            </article>
        <?php endfor; ?>
    </section>
</section>