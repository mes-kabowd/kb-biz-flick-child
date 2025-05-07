<?php 
/**
 * Template Name: T Services
 * Description: Page des services avec un carrousel et des statistiques.
 * @package BlankslateKabowd
 */

get_header(); ?>

<main>
    <section class="Titre-Page Block-Main">
        <section class="Block-Gauche">
            <h2 class="TitrePage"><?php the_title(); ?></h2>
            <h3 class="SousTitre">
                <?php
                $subtitle = get_theme_mod('kabowd_services_subtitle', '');
                echo $subtitle ? esc_html($subtitle) : '';
                ?>
            </h3>
        </section>
        <section class="Block-Droite">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/Logo Principal Couleur.png'); ?>" alt="">
        </section>
    </section>

    <section class="Texte-Page Block-Main">
        <?php
        // Affiche le contenu WordPress si présent
        if (have_posts()) : while (have_posts()) : the_post();
            the_content();
        endwhile; endif;
        ?>
    </section>

    <section class="Carrousel-pack Block-Main">
        <article class="Block-Haut">
            <h2><?php esc_html_e('Statistiques', 'blankslateKabowd'); ?></h2>
            <p><?php esc_html_e('Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla perferendis quae veniam aperiam quidem quibusdam molestiae error ipsam, nemo cum necessitatibus saepe officiis reprehenderit, recusandae vitae, maxime voluptatum debitis aliquid voluptas minus magni voluptatibus? Ducimus quo odit excepturi doloribus sapiente nobis, repellendus vel dolore quam! Doloribus accusantium magnam deleniti officia.', 'blankslateKabowd'); ?></p>
        </article>
        <section class="Block-Bas">
            <article class="MiniStats">
                <h4 class="Valeur">00%</h4>
                <h3 class="Txt-Valeur"><?php esc_html_e('Type de Statistiques', 'blankslateKabowd'); ?></h3>
            </article>
            <article class="MiniStats">
                <h4 class="Valeur">20%</h4>
                <h3 class="Txt-Valeur"><?php esc_html_e('Type de Statistiques 2', 'blankslateKabowd'); ?></h3>
            </article>
            <article class="MiniStats">
                <h4 class="Valeur">30%</h4>
                <h3 class="Txt-Valeur"><?php esc_html_e('Type de Statistiques 3', 'blankslateKabowd'); ?></h3>
            </article>
        </section>
    </section>
    
    <section class="Carrousel-pack Block-Main">
        <article class="Block-Haut">
            <h2><?php esc_html_e('Services', 'blankslateKabowd'); ?></h2>
            <p><?php esc_html_e('Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias illum mollitia autem fugit accusantium perferendis eum vero quis minima, ipsum tenetur asperiores ipsam distinctio at! Quasi labore aliquam officia illo officiis, minima eius. Fugit, sed quisquam sapiente labore quidem provident? Voluptas labore ratione perspiciatis, iusto tempore pariatur quas voluptatibus explicabo?', 'blankslateKabowd'); ?></p>
        </article>
        <ul class="Carrousel">
            <?php for ($i=0; $i<5; $i++): ?>
            <li class="carte">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/Icon Logo Principal Blanc.png'); ?>" alt="">
                <div class="Contenue-Carte">
                    <h5 class="Titre-Carte"><?php esc_html_e('Titre article 1', 'blankslateKabowd'); ?></h5>
                    <p><?php esc_html_e("Some quick example text to build on the card title and make up the bulk of the card's content.", 'blankslateKabowd'); ?></p>
                    <a href="#" class="btn btn-primary"><?php esc_html_e('En voir davantage', 'blankslateKabowd'); ?></a>
                </div>
            </li>
            <?php endfor; ?>
        </ul>
    </section>

    <section class="Carrousel-Infini Block-Main">
        <section class="Ctn-Carrousel-Infini">
            <div class="Contenu">
                <?php for ($i=1; $i<=7; $i++): ?>
                <article class="ImgCtn">
                    <img src="<?php echo esc_url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/$i.png"); ?>" height="100" width="250" alt="" />
                </article>
                <?php endfor; ?>
                <?php for ($i=1; $i<=7; $i++): ?>
                <article class="ImgCtn">
                    <img src="<?php echo esc_url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/$i.png"); ?>" height="100" width="250" alt="" />
                </article>
                <?php endfor; ?>
            </div>
        </section>
    </section>
</main>

<?php get_footer(); ?>