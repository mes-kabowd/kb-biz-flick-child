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
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium', ['alt' => get_the_title()]); ?>
                        <?php else : ?>
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/Icon Logo Principal Noir.png'); ?>" alt="">
                        <?php endif; ?>
                        <div class="InfoBlog">
                            <h3><?php the_title(); ?></h3>
                            <p><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
                            <a href="<?php the_permalink(); ?>" class="btn btn-primary"><?php _e('En voir davantage', 'blankslateKabowd'); ?></a>
                        </div>
                    </article>
                <?php endwhile; ?>
                <div class="Pagination">
                    <?php
                    the_posts_pagination([
                        'mid_size' => 2,
                        'prev_text' => __('&laquo; Précédent', 'blankslateKabowd'),
                        'next_text' => __('Suivant &raquo;', 'blankslateKabowd'),
                        'screen_reader_text' => __('Navigation des résultats', 'blankslateKabowd'),
                    ]);
                    ?>
                </div>
            <?php else : ?>
                <p><?php _e('Aucun résultat trouvé. Essayez une autre recherche.', 'blankslateKabowd'); ?></p>
            <?php endif; ?>
        </section>
    </section>
</main>
<?php get_footer(); ?>