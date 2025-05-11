<?php get_header(); ?>
<main>
    <section class="Titre-Page Block-Main">
        <section class="Block-Gauche">
            <h1 class="TitreDePage"><?php _e('Résultats de recherche', 'blankslateKabowd'); ?></h1>
            <p class="ParagrapheTitre"><?php printf(__('Vous avez recherché : %s', 'blankslateKabowd'), get_search_query()); ?></p>
        </section>
        <section class="Block-Droite">
            <img src="<?php echo esc_url(get_theme_mod('kabowd_search_logo', get_template_directory_uri() . '/assets/img/Icon Logo Principal Couleur.png')); ?>" alt="">
        </section>
    </section>

    <section class="mainCard Block-Main">
        <div class="mainCardHeader"></div>
        <section class="Search-Results articles">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <article class="miniCard" data-tags="<?php echo esc_attr(join(', ', wp_get_post_tags(get_the_ID(), ['fields' => 'names']))); ?>">
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <p><?php the_excerpt(); ?></p>
                    </article>
                <?php endwhile; ?>
            <?php else : ?>
                <p><?php esc_html_e('Aucun résultat trouvé.', 'blankslateKabowd'); ?></p>
            <?php endif; ?>
        </section>
    </section>
</main>
<?php get_footer(); ?>