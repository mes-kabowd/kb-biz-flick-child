<?php 
/**
 * Template Name: T Blog
 * Description: Page de blog avec un carrousel et une liste d'articles.
 * @package BlankslateKabowd
 */
get_header(); ?>

<main>
    <!-- Section Titre-Page -->
    <section class="Titre-Page Block-Main">
        <section class="Block-Gauche">
            <h1 class="TitreDePage">
                <?php
                $titre_customizer = kabowd_blogs_customizer('title', '');
                echo $titre_customizer !== '' ? esc_html($titre_customizer) : get_the_title();
                ?>
            </h1>
            <h3 class="SousTitre">
                <?php
                $sous_titre_customizer = kabowd_blogs_customizer('subtitle', '');
                echo $sous_titre_customizer !== '' ? esc_html($sous_titre_customizer) : '';
                ?>
            </h3>
        </section>
        <section class="Block-Droite">
            <?php
            $logo_customizer = kabowd_blogs_customizer('logo', '');
            if ($logo_customizer) {
                echo '<img src="' . esc_url($logo_customizer) . '" alt="">';
            } else {
                ?><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/Icon Logo Principal Blanc.png'); ?>" alt=""><?php
            }
            ?>
        </section>
    </section>

    <!-- Section Paragraphe -->
    <section class="Carrousel-pack Block-Main">
        <article class="Block-Haut">
            <h2><?php esc_html_e('Actu en Priorité', 'blankslatekabowd'); ?></h2>
            <p>
                <?php echo esc_html(kabowd_blogs_customizer('paragraph', '')); ?>
            </p>
        </article>
    </section>
    
    <section class="Grd-Carrousel-Blog Block-Main">
        <h2><?php esc_html_e('Contenu de Blog', 'blankslatekabowd'); ?></h2>
        <div class="Filtre">
            <div class="Mini-Entete">
                <h3><?php esc_html_e('Liste d\'articles de Kabowd', 'blankslatekabowd'); ?></h3>
                <form onsubmit="event.preventDefault();" role="search">
                    <label for="search"><?php esc_html_e('Search for stuff', 'blankslatekabowd'); ?></label>
                    <input id="search" type="search" placeholder="<?php esc_attr_e('Search...', 'blankslatekabowd'); ?>" autofocus required />
                    <button type="submit"><?php esc_html_e('Go', 'blankslatekabowd'); ?></button>
                </form>
            </div>
            <ul>
                <li><a href="#" class="active"><?php esc_html_e('Tout', 'blankslatekabowd'); ?></a></li>
                <li><a href="#"><?php esc_html_e('Communiqué', 'blankslatekabowd'); ?></a></li>
                <li><a href="#"><?php esc_html_e('Services', 'blankslatekabowd'); ?></a></li>
                <li><a href="#"><?php esc_html_e('Secteurs', 'blankslatekabowd'); ?></a></li>
                <li><a href="#"><?php esc_html_e('Blog', 'blankslatekabowd'); ?></a></li>
                <li><a href="#"><?php esc_html_e('À propos', 'blankslatekabowd'); ?></a></li>
            </ul>
            <section class="mainCard">
                <div class="mainCardHeader"></div>
                <section class="articles">
                    <?php
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 10,
                    );
                    $query = new WP_Query($args);

                    if ($query->have_posts()) :
                        while ($query->have_posts()) : $query->the_post();
                            $tags = get_the_tags();
                            $tag_list = $tags ? implode(', ', wp_list_pluck($tags, 'name')) : '';
                            ?>
                            <article class="miniCard" data-tags="<?php echo esc_attr($tag_list); ?>">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('thumbnail', ['alt' => esc_attr(get_the_title())]); ?>
                                <?php else : ?>
                                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/Icon Logo Principal Noir.png'); ?>" alt="<?php esc_attr_e('Default Image', 'blankslatekabowd'); ?>">
                                <?php endif; ?>
                                <div class="InfoBlog">
                                    <h3><?php the_title(); ?></h3>
                                    <h4><?php the_author(); ?></h4>
                                    <a href="<?php the_permalink(); ?>" class="btn btn-primary"><?php esc_html_e('Lire l\'article', 'blankslatekabowd'); ?></a>
                                </div>
                            </article>
                        <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                        ?>
                        <p><?php esc_html_e('Aucun article trouvé.', 'blankslatekabowd'); ?></p>
                    <?php endif; ?>
                </section>
            </section>
        </div>
    </section>
</main>

<?php get_footer(); ?>