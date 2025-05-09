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
        <!-- <section class="Titre-Article Block-Main">
            <h1 class="TitreDePage">
                <?php
                $custom_title = kabowd_get_customizer('title', '', 'post');
                echo $custom_title ? esc_html($custom_title) : get_the_title();
                ?>
            </h1>
            <section class="Block-Gauche">
                <?php
                $custom_logo = kabowd_get_customizer('logo', '', 'post');
                if ($custom_logo) {
                    echo '<img src="' . esc_url($custom_logo) . '" alt="">';
                } else {
                    echo '<img src="' . esc_url(get_template_directory_uri() . '/assets/img/Icon Logo Principal Blanc.png') . '" alt="">';
                }
                ?>
            </section>
            <section class="Block-Droite">
                <h3 class="SousTitre">
                    <?php
                    $custom_subtitle = kabowd_get_customizer('subtitle', '', 'post');
                    echo $custom_subtitle ? esc_html($custom_subtitle) : get_the_author();
                    ?>
                </h3>
                <p class="ParagrapheTitre">
                    <?php
                    $custom_paragraph = kabowd_get_customizer('paragraph', '', 'post');
                    echo $custom_paragraph ? esc_html($custom_paragraph) : get_the_excerpt();
                    ?>
                </p>
            </section>
        </section>

        <section class="Texte-Page Block-Main">
            <?php the_content(); ?>
        </section>

        <section class="Galerie-Media Block-Main">
            <h2><?php _e('Galerie', 'blankslateKabowd'); ?></h2>
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
            <h2><?php _e('Ressources & Liens utiles', 'blankslateKabowd'); ?></h2>
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
        </section> -->
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
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/Logo Principal Couleur.png' ); ?>" alt="">
            <?php endif; ?>
        </section>
    </section>

    <section class="Txt-Article Block-Main">
        <h2><?php _e('Texte', 'blankslate'); ?></h2>
        <?php the_content(); ?>
    </section>

    <section class="MiniMedia-Article Block-Main">
        <h2>Texte + Media</h2>
        <section class="Block-Bas">
            <p>
                <?php
                $custom_media = kabowd_get_customizer('media', '', 'post');
                if ($custom_media) {
                    echo '<a href="' . esc_url($custom_media) . '" target="_blank">' . esc_html($custom_media) . '</a>';
                } else {
                    // ...texte par défaut ou champ personnalisé...
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
            <h2>Media</h2>
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
        <img class="Img1" src="assets/img/Icon Logo Principal Blanc.png" alt="">
        <img class="Img2" src="assets/img/Icon Logo Principal Couleur.png" alt="">
        <img class="Img3" src="assets/img/Icon Logo Principal Noir.png" alt="">
        <img class="Img4" src="assets/img/Logo Principal Blanc.png" alt="">
        <img class="Img5" src="assets/img/Logo Principal Couleur.png" alt="">
        <img class="Img6" src="assets/img/Logo Principal Noir.png" alt="">
        <img class="Img7" src="assets/img/Icon Logo Principal Blanc.png" alt="">
        <img class="Img8" src="assets/img/Icon Logo Principal Couleur.png" alt="">
        <img class="Img9" src="assets/img/Icon Logo Principal Noir.png" alt="">
    </section>

    <section class="Ressources-Article Block-Main">
        <h2>Ressources & Liens utiles</h2>
        <ul>
            <li><a href="">Ressource1</a></li>
            <li><a href="">Url</a></li>
            <li><a href="">Titre-Article</a></li>
            <li><a href="">Titre Livre</a></li>
            <li><a href="">Lorem ipsum, dolor sit amet consectetur adipisicing elit. A, quod.</a></li>
        </ul>
    </section>

    <section class="Carrousel-Infini Block-Main">
        <section class="Ctn-Carrousel-Infini">
            <div class="Contenu">
                <?php
                if (function_exists('kabowd_article_carrousel_infini_ids')) {
                    $ids = kabowd_article_carrousel_infini_ids();
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

    <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>