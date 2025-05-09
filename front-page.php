<?php
/**
 * Ce fichier est utilisé automatiquement comme page d'accueil si une page statique est définie dans Réglages > Lecture.
 * Pour cela, crée une page "Accueil" dans l'admin et sélectionne-la comme page d'accueil.
 */
get_header();
?>

<main style="background:<?php echo esc_attr(kabowd_homepage_customizer('bgcolor', kabowd_get_customizer('color', '', 'page'))); ?>">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <!-- Tu peux placer the_content() où tu veux afficher le contenu éditable de la page d'accueil -->
        <?php the_content(); ?>
    <?php endwhile; endif; ?>

    <?php if (kabowd_homepage_show_block('titre')): ?>
    <section class="Titre-Page Block-Main">
        <section class="Block-Droite">
            <h1 class="TitreDePage">
                <?php
                $custom_title = kabowd_homepage_customizer('title');
                echo $custom_title ? esc_html($custom_title) : get_bloginfo('name');
                ?>
            </h1>
            <p class="ParagrapheTitre">
                <?php
                $custom_subtitle = kabowd_homepage_customizer('subtitle');
                echo $custom_subtitle ? esc_html($custom_subtitle) : get_bloginfo('description');
                ?>
            </p>
        </section>
        <section class="Block-Gauche">
            <div class="Logo">
                <?php
                $custom_img = kabowd_homepage_customizer('logo');
                if ($custom_img) :
                ?>
                    <img src="<?php echo esc_url($custom_img); ?>" alt="">
                <?php else : ?>
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/Logo Principal Couleur.png' ); ?>" alt="">
                <?php endif; ?>
            </div>
            <h3 class="SousTitre">
              <?php echo $custom_subtitle ? esc_html($custom_subtitle) : 'Sous-titre de section'; ?>
            </h3>
        </section>
    </section>
    <?php endif; ?>

    <?php if (kabowd_homepage_show_block('stats')): ?>
    <section class="Stats Block-Main">
        <section class="Block-Gauche">
            <h2>
                <?php
                $stats_title = get_theme_mod('kabowd_homepage_stats_title', '');
                echo $stats_title ? esc_html($stats_title) : 'Statistiques';
                ?>
            </h2>
            <p>
                <?php
                $stats_text = get_theme_mod('kabowd_homepage_stats_text', '');
                echo $stats_text ? esc_html($stats_text) : 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla perferendis quae veniam aperiam quidem quibusdam molestiae error ipsam, nemo cum necessitatibus saepe officiis reprehenderit, recusandae vitae, maxime voluptatum debitis aliquid voluptas minus magni voluptatibus? Ducimus quo odit excepturi doloribus sapiente nobis, repellendus vel dolore quam! Doloribus accusantium magnam deleniti officia.';
                ?>
            </p>
        </section>
        <section class="Block-Bas">
            <?php
            $has_stats = false;
            for ($i = 1; $i <= 4; $i++) {
                $value = get_theme_mod("kabowd_homepage_stats_value_$i", '');
                $label = get_theme_mod("kabowd_homepage_stats_label_$i", '');
                if ($value || $label) {
                    $has_stats = true;
                    ?>
                    <article class="MiniStats">
                        <h4 class="Valeur"><?php echo esc_html($value); ?></h4>
                        <h3 class="Txt-Valeur"><?php echo esc_html($label); ?></h3>
                    </article>
                    <?php
                }
            }
            if (!$has_stats) :
            ?>
            <article class="MiniStats">
                <h4 class="Valeur">00%</h4>
                <h3 class="Txt-Valeur">Type de Statistiques</h3>
            </article>
            <article class="MiniStats">
                <h4 class="Valeur">20%</h4>
                <h3 class="Txt-Valeur">Type de Statistiques 2</h3>
            </article>
            <article class="MiniStats">
                <h4 class="Valeur">30%</h4>
                <h3 class="Txt-Valeur">Type de Statistiques 3</h3>
            </article>
            <article class="MiniStats">
                <h4 class="Valeur">40%</h4>
                <h3 class="Txt-Valeur">Type de Statistiques 4</h3>
            </article>
            <?php endif; ?>
        </section>
        <section class="Block-Droite">
            <div class="ImgStat">
                <?php
                $stats_img = get_theme_mod('kabowd_homepage_stats_img', '');
                if ($stats_img) :
                ?>
                    <img src="<?php echo esc_url($stats_img); ?>" alt="">
                <?php else : ?>
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/Icon Logo Principal Couleur.png' ); ?>" alt="">
                <?php endif; ?>
            </div>
        </section>
    </section>
    <?php endif; ?>

    <?php if (kabowd_homepage_show_block('services')): ?>
    <section class="Carrousel-pack Block-Main">
        <article class="Block-Haut">
            <?php
            $carrousel_title = get_theme_mod('kabowd_homepage_carrousel_title', 'Services');
            $carrousel_page_id = get_theme_mod('kabowd_homepage_carrousel_page', '');
            $carrousel_url_custom = get_theme_mod('kabowd_homepage_carrousel_url', '');
            $carrousel_url = '#';
            if (!empty($carrousel_url_custom)) {
                $carrousel_url = $carrousel_url_custom;
            } elseif (!empty($carrousel_page_id)) {
                $carrousel_url = get_permalink($carrousel_page_id);
            }
            ?>
            <h2>
              <a href="<?php echo esc_url($carrousel_url); ?>">
                <?php echo esc_html($carrousel_title); ?>
              </a>
            </h2>
            <p>
                <?php
                $carrousel_desc = get_theme_mod('kabowd_homepage_carrousel_desc', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias illum mollitia autem fugit accusantium perferendis eum vero quis minima...');
                echo esc_html($carrousel_desc);
                ?>
            </p>
        </article>
        <ul class="Carrousel">
            <?php
            // Récupère la catégorie de pages à afficher (slug)
            $carrousel_cat = get_theme_mod('kabowd_homepage_carrousel_cat', '');
            if ($carrousel_cat) {
                $args = array(
                    'post_type' => 'page',
                    'posts_per_page' => 5,
                    'orderby' => 'menu_order',
                    'order' => 'ASC',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'category',
                            'field'    => 'slug',
                            'terms'    => $carrousel_cat,
                        ),
                    ),
                );
                $carrousel_query = new WP_Query($args);
                if ($carrousel_query->have_posts()) :
                    while ($carrousel_query->have_posts()) : $carrousel_query->the_post(); ?>
                        <li class="carte">
                            <?php if (has_post_thumbnail()) : ?>
                                <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'medium')); ?>" alt="<?php the_title_attribute(); ?>">
                            <?php else : ?>
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/Icon Logo Principal Blanc.png'); ?>" alt="">
                            <?php endif; ?>
                            <div class="Contenue-Carte">
                                <h5 class="Titre-Carte"><?php the_title(); ?></h5>
                                <p><?php echo esc_html(get_the_excerpt()); ?></p>
                                <a href="<?php the_permalink(); ?>" class="btn btn-primary"><?php esc_html_e('En voir davantage', 'blankslateKabowd'); ?></a>
                            </div>
                        </li>
                    <?php endwhile;
                    wp_reset_postdata();
                else: ?>
                    <li><?php esc_html_e('Aucune page trouvée dans cette catégorie.', 'blankslateKabowd'); ?></li>
                <?php endif;
            } else { ?>
                <li><?php esc_html_e('Aucune catégorie sélectionnée.', 'blankslateKabowd'); ?></li>
            <?php } ?>
        </ul>
    </section>
    <?php endif; ?>

    <?php if (kabowd_homepage_show_block('secteurs')): ?>
    <section class="Carrousel-pack Block-Main">
        <article class="Block-Haut">
            <?php
            $carrousel2_title = get_theme_mod('kabowd_homepage_carrousel2_title', 'Secteurs');
            $carrousel2_page_id = get_theme_mod('kabowd_homepage_carrousel2_page', '');
            $carrousel2_url_custom = get_theme_mod('kabowd_homepage_carrousel2_url', '');
            $carrousel2_url = '#';
            if (!empty($carrousel2_url_custom)) {
                $carrousel2_url = $carrousel2_url_custom;
            } elseif (!empty($carrousel2_page_id)) {
                $carrousel2_url = get_permalink($carrousel2_page_id);
            }
            ?>
            <h2>
                <a href="<?php echo esc_url($carrousel2_url); ?>">
                    <?php echo esc_html($carrousel2_title); ?>
                </a>
            </h2>
            <p>
                <?php
                $carrousel2_desc = get_theme_mod('kabowd_homepage_carrousel2_desc', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias illum mollitia autem fugit accusantium perferendis eum vero quis minima...');
                echo esc_html($carrousel2_desc);
                ?>
            </p>
        </article>
        <ul class="Carrousel">
            <?php
            $carrousel2_cat = get_theme_mod('kabowd_homepage_carrousel2_cat', '');
            if ($carrousel2_cat) {
                $args = array(
                    'post_type' => 'page',
                    'posts_per_page' => 5,
                    'orderby' => 'menu_order',
                    'order' => 'ASC',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'category',
                            'field'    => 'slug',
                            'terms'    => $carrousel2_cat,
                        ),
                    ),
                );
                $carrousel2_query = new WP_Query($args);
                if ($carrousel2_query->have_posts()) :
                    while ($carrousel2_query->have_posts()) : $carrousel2_query->the_post(); ?>
                        <li class="carte">
                            <?php if (has_post_thumbnail()) : ?>
                                <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'medium')); ?>" alt="<?php the_title_attribute(); ?>">
                            <?php else : ?>
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/Icon Logo Principal Blanc.png'); ?>" alt="">
                            <?php endif; ?>
                            <div class="Contenue-Carte">
                                <h5 class="Titre-Carte"><?php the_title(); ?></h5>
                                <p><?php echo esc_html(get_the_excerpt()); ?></p>
                                <a href="<?php the_permalink(); ?>" class="btn btn-primary"><?php esc_html_e('En voir davantage', 'blankslateKabowd'); ?></a>
                            </div>
                        </li>
                    <?php endwhile;
                    wp_reset_postdata();
                else: ?>
                    <li><?php esc_html_e('Aucune page trouvée dans cette catégorie.', 'blankslateKabowd'); ?></li>
                <?php endif;
            } else { ?>
                <li><?php esc_html_e('Aucune catégorie sélectionnée.', 'blankslateKabowd'); ?></li>
            <?php } ?>
        </ul>
    </section>
    <?php endif; ?>

    <?php if (kabowd_homepage_show_block('blog')): ?>
    <section class="Mini-Carrousel-Blog Block-Main">
        <?php
        $blog_carrousel_title = get_theme_mod('kabowd_homepage_blog_carrousel_title', 'Blog');
        $blog_carrousel_page_id = get_theme_mod('kabowd_homepage_blog_carrousel_page', '');
        $blog_carrousel_url_custom = get_theme_mod('kabowd_homepage_blog_carrousel_url', '');
        $blog_carrousel_url = '#';
        if (!empty($blog_carrousel_url_custom)) {
            $blog_carrousel_url = $blog_carrousel_url_custom;
        } elseif (!empty($blog_carrousel_page_id)) {
            $blog_carrousel_url = get_permalink($blog_carrousel_page_id);
        }
        ?>
        <h2>
            <a href="<?php echo esc_url($blog_carrousel_url); ?>">
                <?php echo esc_html($blog_carrousel_title); ?>
            </a>
        </h2>
        <section class="Galerie-Blog">
            <input type="radio" name="position" checked />
            <input type="radio" name="position" />
            <input type="radio" name="position" />
            <input type="radio" name="position" />
            <input type="radio" name="position" />
            <div class="Carrousel2Blog">
                <?php
                $blog_query = new WP_Query(array(
                    'post_type' => 'post',
                    'posts_per_page' => 5,
                    'orderby' => 'date',
                    'order' => 'DESC'
                ));
                if ($blog_query->have_posts()) :
                    while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
                        <article class="item">
                            <?php if (has_post_thumbnail()) : ?>
                                <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'medium')); ?>" alt="<?php the_title_attribute(); ?>">
                            <?php else : ?>
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/Icon Logo Principal Blanc.png'); ?>" alt="">
                            <?php endif; ?>
                            <div class="InfoBlog">
                                <h3><?php the_title(); ?></h3>
                                <p>
                                    <?php
                                    $excerpt = get_the_excerpt();
                                    $words = explode(' ', wp_strip_all_tags($excerpt));
                                    echo esc_html(implode(' ', array_slice($words, 0, 10)));
                                    if (count($words) > 10) echo '...';
                                    ?>
                                </p>
                                <h4><?php the_author(); ?></h4>
                                <a href="<?php the_permalink(); ?>" class="btn btn-primary"><?php esc_html_e('Bouton', 'blankslateKabowd'); ?></a>
                            </div>
                        </article>
                    <?php endwhile;
                    wp_reset_postdata();
                else: ?>
                    <article class="item">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/Icon Logo Principal Blanc.png'); ?>" alt="">
                        <div class="InfoBlog">
                            <h3><?php esc_html_e('Aucun article trouvé.', 'blankslateKabowd'); ?></h3>
                            <p></p>
                            <h4></h4>
                            <a href="#" class="btn btn-primary"><?php esc_html_e('Bouton', 'blankslateKabowd'); ?></a>
                        </div>
                    </article>
                <?php endif; ?>
            </div>
        </section>
    </section>
    <?php endif; ?>
</main>

<?php get_footer(); ?>