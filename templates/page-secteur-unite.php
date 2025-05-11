<?php 
/**
 * Template Name: T Secteur Unité
 * Description: Page secteur unité avec un carrousel de services et un formulaire de contact.
 * @package BlankslateKabowd
 */
get_header(); ?>

<main>
    <section class="Titre-Page Block-Main">
        <section class="Block-Gauche">
            <h2 class="TitreDePage">
                <?php
                $custom_title = kabowd_secteur_unite_customizer('title');
                echo $custom_title ? esc_html($custom_title) : get_the_title();
                ?>
            </h2>
            <h3 class="SousTitre">
                <?php
                $custom_subtitle = kabowd_secteur_unite_customizer('subtitle');
                echo $custom_subtitle ? esc_html($custom_subtitle) : '';
                ?>
            </h3>
        </section>
        <section class="Block-Droite">
            <?php
            $custom_logo = kabowd_secteur_unite_customizer('logo');
            if ($custom_logo) :
            ?>
                <img src="<?php echo esc_url($custom_logo); ?>" alt="">
            <?php else : ?>
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/Icon Logo Principal Blanc.png'); ?>" alt="">
            <?php endif; ?>
        </section>
    </section>

    <section class="Texte-Page Block-Main">
        <?php
        if (have_posts()) : while (have_posts()) : the_post();
            the_content();
        endwhile; endif;
        ?>
    </section>

    <section class="Stats Block-Main">
        <article class="Block-Gauche">
            <h2><?php esc_html_e('Statistiques', 'blankslateKabowd'); ?></h2>
            <p><?php esc_html_e('Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla perferendis quae veniam aperiam quidem quibusdam molestiae error ipsam, nemo cum necessitatibus saepe officiis reprehenderit, recusandae vitae, maxime voluptatum debitis aliquid voluptas minus magni voluptatibus? Ducimus quo odit excepturi doloribus sapiente nobis, repellendus vel dolore quam! Doloribus accusantium magnam deleniti officia.', 'blankslateKabowd'); ?></p>
        </article>
        <section class="Block-Droite">
            <div class="ImgStat"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/Icon Logo Principal Couleur.png'); ?>" alt=""></div>
        </section>
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
            <article class="MiniStats">
                <h4 class="Valeur">40%</h4>
                <h3 class="Txt-Valeur"><?php esc_html_e('Type de Statistiques 4', 'blankslateKabowd'); ?></h3>
            </article>
        </section>
    </section>

    <?php get_template_part('template-parts/blocks/carrousel-pack'); ?>

    <section class="MiniContact Block-Main">
        <h2><?php esc_html_e('En savoir davantage', 'blankslateKabowd'); ?></h2>
        <section class="Block-Gauche">
            <h3><?php esc_html_e('Contactez-nous', 'blankslateKabowd'); ?></h3>
            <form action="#" method="post" class="contact-form Formulaires" data-endpoint="https://votre-endpoint-serveur.com">
                <label for="name"><?php esc_html_e('Nom :', 'blankslateKabowd'); ?></label>
                <input type="text" id="name" name="name" placeholder="<?php esc_attr_e('Votre nom', 'blankslateKabowd'); ?>" required>
                <label for="email"><?php esc_html_e('Email :', 'blankslateKabowd'); ?></label>
                <input type="email" id="email" name="email" placeholder="<?php esc_attr_e('Votre email', 'blankslateKabowd'); ?>" required>
                <label for="subject"><?php esc_html_e('Objet :', 'blankslateKabowd'); ?></label>
                <input type="text" id="subject" name="subject" placeholder="<?php esc_attr_e('Objet de votre demande', 'blankslateKabowd'); ?>" required>
                <label for="message"><?php esc_html_e('Message :', 'blankslateKabowd'); ?></label>
                <textarea id="message" name="message" rows="5" placeholder="<?php esc_attr_e('Votre message', 'blankslateKabowd'); ?>" required></textarea>
                <button type="submit"><?php esc_html_e('Envoyer', 'blankslateKabowd'); ?></button>
            </form>
        </section>
        <section class="Block-Droite">
            <article class="card">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/Icon Logo Principal Couleur.png'); ?>" alt="">
                <div class="card-Ctn"></div>
            </article>
        </section>
    </section>

    <section class="Carrousel-Infini Block-Main">
        <section class="Ctn-Carrousel-Infini">
            <div class="Contenu">
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
            </div>
        </section>
    </section>

</main>
        
<?php get_footer(); ?>