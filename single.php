<?php
/**
 * Template Name: Article
 * Description: Page d'article avec personnalisation via le Customizer et champs personnalisés.
 * @package BlankslateKabowd
 */

get_header(); 
?>

<main>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <section class="Titre-Article Block-Main">
            <section class="Block-Haut">
                <h1 class="TitreDePage">
                    <?php
                    $custom_title = kabowd_get_customizer('title', '', 'post');
                    echo $custom_title ? esc_html($custom_title) : get_the_title();
                    ?>
                </h1>
            </section>
            <section class="Block-Bas">
                <h3 class="SousTitre">
                    <?php
                    $custom_subtitle = kabowd_get_customizer('subtitle', '', 'post');
                    echo $custom_subtitle ? esc_html($custom_subtitle) : get_the_author();
                    ?>
                </h3>
            </section>
            <section class="Block-Droite">
                <?php
                $custom_img = kabowd_get_customizer('image', '', 'post');
                if ($custom_img) :
                ?>
                    <img src="<?php echo esc_url($custom_img); ?>" alt="">
                <?php elseif ( has_post_thumbnail() ) : ?>
                    <?php the_post_thumbnail('large', ['alt' => get_the_title()]); ?>
                <?php else : ?>
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/Logo Principal Couleur.png'); ?>" alt="">
                <?php endif; ?>
            </section>
        </section>

        <section class="Txt-Article Block-Main">
            <h2><?php _e('Texte', 'blankslate'); ?></h2>
            <?php the_content(); ?>
        </section>

        <section class="MiniMedia-Article Block-Main">
            <h2><?php _e('Texte + Media', 'blankslate'); ?></h2>
            <section class="Block-Bas">
                <p>
                    <?php
                    $custom_media = kabowd_get_customizer('media', '', 'post');
                    if ($custom_media) {
                        echo '<a href="' . esc_url($custom_media) . '" target="_blank">' . esc_html($custom_media) . '</a>';
                    } else {
                        ?>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Maxime beatae doloremque minima tempora saepe quas deserunt nobis, modi placeat cumque sit explicabo ipsam magnam ratione impedit eos at fugiat rerum voluptatum! ...
                        <?php
                    }
                    ?>
                </p>
            </section>
        </section>

        <section class="Media-Article Block-Main">
            <section class="Block-Gauche">
                <h2><?php _e('Media', 'blankslate'); ?></h2>
                <ul>
                    <li>mini info 1</li>
                    <li>mini info 2</li>
                </ul>
            </section>
            <section class="Block-Droite">
                <img src="assets/img/Logo Principal Couleur.png" alt="">
            </section>
        </section>

        <section class="Galerie-Media Block-Main">
            <h2><?php _e('Galerie', 'blankslate'); ?></h2>
            <div class="Galerie">
                <?php
                $gallery_images = kabowd_get_customizer('gallery', '', 'post');
                if ($gallery_images) {
                    foreach (explode(',', $gallery_images) as $image_id) {
                        $image_url = wp_get_attachment_image_url($image_id, 'medium');
                        if ($image_url) {
                            echo '<img src="' . esc_url($image_url) . '" alt="">';
                        }
                    }
                }
                ?>
            </div>
        </section>

        <section class="Ressources-Article Block-Main">
            <h2><?php _e('Ressources & Liens utiles', 'blankslate'); ?></h2>
            <ul>
                <?php
                $resources = kabowd_get_customizer('resources', '', 'post');
                if ($resources) {
                    foreach (explode("\n", $resources) as $resource) {
                        echo '<li><a href="#">' . esc_html($resource) . '</a></li>';
                    }
                }
                ?>
            </ul>
        </section>

        <section class="Carrousel-Infini Block-Main">
            <section class="Ctn-Carrousel-Infini">
                <div class="Contenu">
                    <?php
                    $carousel_images = kabowd_get_customizer('carousel', '', 'post');
                    if ($carousel_images) {
                        foreach (explode(',', $carousel_images) as $image_id) {
                            $image_url = wp_get_attachment_image_url($image_id, 'large');
                            if ($image_url) {
                                echo '<article class="ImgCtn"><img src="' . esc_url($image_url) . '" alt=""></article>';
                            }
                        }
                    }
                    ?>
                </div>
            </section>
        </section>
    <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>