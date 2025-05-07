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
            <h1><?php the_title(); ?></h1>
            <h3 class="SousTitre"><?php echo esc_html(get_theme_mod('kabowd_service_unite_subtitle', 'Sous-titre de section')); ?></h3>
        </section>
        <section class="Block-Droite">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/Logo Principal Couleur.png'); ?>" alt="">
        </section>
        <section class="Bloc-Bas">
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

    <section class="Texte-Page Block-Main">
        <article class="Block-Gauche">
            <h2><?php esc_html_e('Services', 'blankslateKabowd'); ?></h2>
            <p><?php esc_html_e('Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias illum mollitia autem fugit accusantium perferendis eum vero quis minima, ipsum tenetur asperiores ipsam distinctio at! Quasi labore aliquam officia illo officiis, minima eius. Fugit, sed quisquam sapiente labore quidem provident? Voluptas labore ratione perspiciatis, iusto tempore pariatur quas voluptatibus explicabo?', 'blankslateKabowd'); ?></p>
        </article>
        <section class="Block-Droite">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/Icon Logo Principal Noir.png'); ?>" alt="">
        </section>
    </section>

    <section class="Texte-Page Block-Main">
        <section class="Block-Gauche">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/Icon Logo Principal Noir.png'); ?>" alt="">
        </section>
        <article class="Block-Droite">
            <h2><?php esc_html_e('Services', 'blankslateKabowd'); ?></h2>
            <p><?php esc_html_e('Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias illum mollitia autem fugit accusantium perferendis eum vero quis minima, ipsum tenetur asperiores ipsam distinctio at! Quasi labore aliquam officia illo officiis, minima eius. Fugit, sed quisquam sapiente labore quidem provident? Voluptas labore ratione perspiciatis, iusto tempore pariatur quas voluptatibus explicabo?', 'blankslateKabowd'); ?></p>
        </article>
    </section>

    <section class="Texte-Page Block-Main">
        <article class="Block-Gauche">
            <h2><?php esc_html_e('Services', 'blankslateKabowd'); ?></h2>
            <ul>
                <li><?php esc_html_e('Lorem ipsum dolor sit amet consectetur, adipisicing elit. Atque, rerum?', 'blankslateKabowd'); ?></li>
                <li><?php esc_html_e('Lorem ipsum dolor, sit amet consectetur adipisicing elit. Libero, fugit.', 'blankslateKabowd'); ?></li>
                <li><?php esc_html_e('Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis, exercitationem.', 'blankslateKabowd'); ?></li>
                <li><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem, maxime!', 'blankslateKabowd'); ?></li>
                <li><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, ipsam.', 'blankslateKabowd'); ?></li>
            </ul>
        </article>
        <section class="Block-Droite">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/Icon Logo Principal Noir.png'); ?>" alt="">
        </section>
    </section>

    <section class="Mini-Carrousel-Blog Block-Main">
        <h2><?php esc_html_e('Blog', 'blankslateKabowd'); ?></h2>
        <section class="Galerie-Blog">
            <?php for ($i=0; $i<5; $i++): ?>
            <input type="radio" name="position" <?php if ($i==0) echo 'checked'; ?> />
            <?php endfor; ?>
            <div id="carousel">
                <?php for ($i=0; $i<5; $i++): ?>
                <article class="item">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/Icon Logo Principal Blanc.png'); ?>" alt="">
                    <div class="InfoBlog">
                        <h3><?php esc_html_e('Titre article', 'blankslateKabowd'); ?></h3>
                        <p><?php esc_html_e('Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, reiciendis.', 'blankslateKabowd'); ?></p>
                        <h4><?php esc_html_e('Auteur Article', 'blankslateKabowd'); ?></h4>
                        <a href="#" class="btn btn-primary"><?php esc_html_e('Bouton', 'blankslateKabowd'); ?></a>
                    </div>
                </article>
                <?php endfor; ?>
            <div>
        </section>
    </section>

    <section class="Carrousel-Infini">
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