<?php 
/**
 * Template Name: T Services
 * Description: Page services avec statistiques et carrousel.
 * @package BlankslateKabowd
 */
get_header(); ?>

<main>
    <section class="Titre-Page Block-Main">
        <section class="Block-Gauche">
            <h1 class="TitreDePage">
                <?php echo esc_html(get_theme_mod('kabowd_services_title', get_the_title())); ?>
            </h1>
            <h3 class="SousTitre"><?php echo esc_html(get_theme_mod('kabowd_services_subtitle', '')); ?></h3>
        </section>
        <section class="Block-Droite">
            <?php
            $logo = get_theme_mod('kabowd_services_logo', get_template_directory_uri() . '/assets/img/Icon Logo Principal Blanc.png');
            if ($logo) :
            ?>
                <img src="<?php echo esc_url($logo); ?>" alt="">
            <?php endif; ?>
            <p class="ParagrapheTitre"><?php echo esc_html(get_theme_mod('kabowd_services_paragraph', '')); ?></p>
        </section>
    </section>

    <section class="Stats Block-Main">
        <section class="Block-Gauche">
            <h2><?php esc_html_e('Statistiques', 'blankslateKabowd'); ?></h2>
            <p><?php echo esc_html(get_theme_mod('kabowd_services_stats_desc', __('Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'blankslateKabowd'))); ?></p>
        </section>
        <section class="Block-Bas">
            <?php for ($i = 1; $i <= 4; $i++) : ?>
                <article class="MiniStats">
                    <h4 class="Valeur"><?php echo esc_html(get_theme_mod("kabowd_services_stat_value_$i", '00%')); ?></h4>
                    <h3 class="Txt-Valeur"><?php echo esc_html(get_theme_mod("kabowd_services_stat_label_$i", "Statistique $i")); ?></h3>
                </article>
            <?php endfor; ?>
        </section>
    </section>
    <!-- Ajoutez ici le carrousel si besoin -->
</main>
<?php get_footer(); ?>