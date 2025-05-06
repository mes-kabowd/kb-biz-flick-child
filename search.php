<?php get_header(); ?>
<main>
    <section class="Page-Recherche Block-Main">
        <section class="Titre-Page">
            <h1 class="TitrePage"><?php _e('Résultats de recherche', 'blankslate'); ?></h1>
            <p class="ParagrapheTitre"><?php printf( __('Vous avez recherché : %s', 'blankslate'), get_search_query() ); ?></p>
        </section>
        <section class="mainCard Block-Main">
            <div class="mainCardHeader"></div>
            <section class="Search-Results articles">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <article class="miniCard" data-tags="">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail('medium', ['alt' => get_the_title()]); ?>
                        <?php else : ?>
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/Icon Logo Principal Noir.png' ); ?>" alt="">
                        <?php endif; ?>
                        <div class="InfoBlog">
                            <h3><?php the_title(); ?></h3>
                            <p><?php the_excerpt(); ?></p>
                            <a href="<?php the_permalink(); ?>" class="btn btn-primary"><?php _e('En voir davantage', 'blankslate'); ?></a>
                        </div>
                    </article>
                <?php endwhile; else : ?>
                    <p><?php _e('Aucun résultat trouvé.', 'blankslate'); ?></p>
                <?php endif; ?>
            </section>
        </section>
    </section>
</main>
<?php get_footer(); ?>