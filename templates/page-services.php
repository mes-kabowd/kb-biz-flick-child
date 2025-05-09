<?php 
/**
 * Template Name: T Services
 * Description: Page services avec statistiques et carrousel.
 * @package BlankslateKabowd
 */
get_header(); ?>

<main>
    <!-- Section Titre-Page -->
    <section class="Titre-Page Block-Main">
        <h1 class="TitreDePage">
            <?php echo esc_html(get_theme_mod('kabowd_services_title', get_the_title())); ?>
        </h1>
        <section class="Block-Gauche">
            <img src="<?php echo esc_url(get_theme_mod('kabowd_services_logo', get_template_directory_uri() . '/assets/img/Icon Logo Principal Blanc.png')); ?>" alt="">
        </section>
        <section class="Block-Droite">
            <h3 class="SousTitre"><?php echo esc_html(get_theme_mod('kabowd_services_subtitle', '')); ?></h3>
            <p class="ParagrapheTitre"><?php echo esc_html(get_theme_mod('kabowd_services_paragraph', '')); ?></p>
        </section>
    </section>

    <!-- Section Texte + Statistiques -->
    <section class="Carrousel-pack Block-Main">
        <article class="Block-Haut">
            <h2><?php esc_html_e('Statistiques', 'blankslateKabowd'); ?></h2>
            <p><?php echo esc_html(get_theme_mod('kabowd_services_stats_desc', __('Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'blankslateKabowd'))); ?></p>
        </article>
        <section class="Block-Bas">
            <?php for ($i = 1; $i <= 4; $i++) : ?>
                <article class="MiniStats">
                    <h4 class="Valeur"><?php echo esc_html(get_theme_mod("kabowd_services_stat_value_$i", '00%')); ?></h4>
                    <h3 class="Txt-Valeur"><?php echo esc_html(get_theme_mod("kabowd_services_stat_label_$i", "Statistique $i")); ?></h3>
                </article>
            <?php endfor; ?>
        </section>
    </section>

    <!-- Section Carrousel -->
    <section class="Carrousel-pack Block-Main">
        <article class="Block-Haut">
            <?php
            $carrousel_title = get_theme_mod('kabowd_services_carousel_title', __('Nos Services', 'kabowd'));
            $carrousel_page_id = get_theme_mod('kabowd_services_carousel_page', '');
            $carrousel_url_custom = get_theme_mod('kabowd_services_carousel_url', '');
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
                $carrousel_desc = get_theme_mod('kabowd_services_carousel_desc', __('Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'kabowd'));
                echo esc_html($carrousel_desc);
                ?>
            </p>
        </article>
        <ul class="Carrousel">
            <?php
            $carrousel_cat = get_theme_mod('kabowd_services_carousel_cat', '');
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
                                <a href="<?php the_permalink(); ?>" class="btn btn-primary"><?php esc_html_e('En savoir plus', 'kabowd'); ?></a>
                            </div>
                        </li>
                    <?php endwhile;
                    wp_reset_postdata();
                else: ?>
                    <li><?php esc_html_e('Aucune page trouvée dans cette catégorie.', 'kabowd'); ?></li>
                <?php endif;
            } else { ?>
                <li><?php esc_html_e('Aucune catégorie sélectionnée.', 'kabowd'); ?></li>
            <?php } ?>
        </ul>
    </section>

    <section class="Texte-Page Block-Main">
        <article class="Block-Centre">
            <h2><?php esc_html_e('Texte', 'blankslateKabowd'); ?></h2>
            <p><?php echo esc_html(get_theme_mod('kabowd_services_stats_desc', __('Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'blankslateKabowd'))); ?></p>
        </article>
    </section>

    <!-- Section Carrousel Infini -->
    <section class="Carrousel-Infini Block-Main">
        <section class="Ctn-Carrousel-Infini">
            <div class="Contenu">
                <?php
                if (function_exists('kabowd_services_carrousel_infini_ids')) {
                    $ids = kabowd_services_carrousel_infini_ids();
                } else {
                    $ids = [];
                }
                if (!empty($ids)) {
                    foreach ($ids as $img_id) {
                        if (wp_attachment_is_image($img_id)) {
                            $src = wp_get_attachment_image_url($img_id, 'large');
                            echo '<article class="ImgCtn"><img src="' . esc_url($src) . '" height="100" width="250" alt="" /></article>';
                        }
                    }
                } else {
                    // fallback demo images
                    ?>
                    <article class="ImgCtn">
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/1.png" height="100" width="250" alt="" />
                    </article>
                    <article class="ImgCtn">
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/2.png" height="100" width="250" alt="" />
                    </article>
                    <article class="ImgCtn">
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/3.png" height="100" width="250" alt="" />
                    </article>
                    <article class="ImgCtn">
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/4.png" height="100" width="250" alt="" />
                    </article>
                    <article class="ImgCtn">
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/5.png" height="100" width="250" alt="" />
                    </article>
                    <article class="ImgCtn">
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/6.png" height="100" width="250" alt="" />
                    </article>
                    <article class="ImgCtn">
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/7.png" height="100" width="250" alt="" />
                    </article>
                    <?php
                }
                ?>
            </div>
        </section>
    </section>
</main>

<?php get_footer(); ?>