<?php
/**
 * Template Name: T Service Unité
 * Description: Page service unité avec des statistiques et un carrousel de services.
 * @package BlankslateKabowd
 */
get_header(); ?>

<main>
    <section class="Titre-Page Block-Main">
        <section class="Block-Gauche">
            <h1 class="TitreDePage"><?php the_title(); ?></h1>
            <h3 class="SousTitre"><?php echo esc_html(get_post_meta(get_the_ID(), 'kabowd_subtitle', true) ?: get_theme_mod('kabowd_service_unite_subtitle', 'Sous-titre de section')); ?></h3>
        </section>
        <section class="Block-Droite">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('large', ['alt' => get_the_title()]); ?>
            <?php else : ?>
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/Logo Principal Couleur.png'); ?>" alt="">
            <?php endif; ?>
        </section>
    </section>
    <!-- Ajoutez ici les autres blocs nécessaires -->
</main>
<?php get_footer(); ?>