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
        // Affiche le contenu WordPress si présent
        if (have_posts()) : while (have_posts()) : the_post();
            the_content();
        endwhile; endif;
        ?>
    </section>

    <section class="Stats Block-Main">
        <article class="Block-Gauche">
            <h2>Statistiques</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla perferendis quae veniam aperiam quidem quibusdam molestiae error ipsam, nemo cum necessitatibus saepe officiis reprehenderit, recusandae vitae, maxime voluptatum debitis aliquid voluptas minus magni voluptatibus? Ducimus quo odit excepturi doloribus sapiente nobis, repellendus vel dolore quam! Doloribus accusantium magnam deleniti officia.</p>
        </article>
        <section class="Block-Droite">
            <div class="ImgStat"><img src="assets/img/Icon Logo Principal Couleur.png" alt=""></div>
        </section>
        <section class="Block-Bas">
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
        </section>
    </section>

    <section class="Carrousel-pack Block-Main">
        <article class="Block-Haut">
            <h2>Services</h2>
        </article>
        <ul class="Carrousel">
            <li class="carte">
                <img src="assets/img/Icon Logo Principal Blanc.png" alt="">
                <div class="Contenue-Carte">
                    <h5 class="Titre-Carte">Titre article 1</h5>
                    <p>
                        Some quick example text to build on the card title and make up the bulk of the card's content.
                    </p>
                    <a href="#" class="btn btn-primary">En voir davantage</a>
                </div>
            </li>
            <li class="carte">
                <img src="assets/img/Icon Logo Principal Blanc.png" alt="">
                <div class="Contenue-Carte">
                    <h5 class="Titre-Carte">Titre article 1</h5>
                    <p>
                        Some quick example text to build on the card title and make up the bulk of the card's content.
                    </p>
                    <a href="#" class="btn btn-primary">En voir davantage</a>
                </div>
            </li>
            <li class="carte">
                <img src="assets/img/Icon Logo Principal Blanc.png" alt="">
                <div class="Contenue-Carte">
                    <h5 class="Titre-Carte">Titre article 1</h5>
                    <p>
                        Some quick example text to build on the card title and make up the bulk of the card's content.
                    </p>
                    <a href="#" class="btn btn-primary">En voir davantage</a>
                </div>
            </li>
        </ul>
    </section>

    <section class="MiniContact Block-Main">
        <h2>
            En savoir davantage
        </h2>
        <section class="Block-Gauche">

            <h3>Contactez-nous</h3>
            <form action="#" method="post" class="contact-form Formulaires" data-endpoint="https://votre-endpoint-serveur.com">
                <label for="name">Nom :</label>
                <input type="text" id="name" name="name" placeholder="Votre nom" required>
            
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" placeholder="Votre email" required>

                <label for="subject">Objet :</label>
                <input type="text" id="subject" name="subject" placeholder="Objet de votre demande" required>
            
                <label for="message">Message :</label>
                <textarea id="message" name="message" rows="5" placeholder="Votre message" required></textarea>
            
                <button type="submit">Envoyer</button>
            </form>
           
            
        </section>
        <section class="Block-Droite">
            <article class="card">
                <img src="assets/img/Icon Logo Principal Couleur.png" alt="">
                <div class="card-Ctn">
                    <h5>Special title treatment</h5>
                    <p>
                        With supporting text below as a natural lead-in to additional content.
                    </p>
                    <a href="#" class="btn btn-primary">Bouton</a>
                </div>
            </article>
            <article class="card">
                <img src="assets/img/Icon Logo Principal Couleur.png" alt="">
                <div class="card-Ctn">
                    <h5>Special title treatment</h5>
                    <p>
                        With supporting text below as a natural lead-in to additional content.
                    </p>
                    <a href="#" class="btn btn-primary">Bouton</a>
                </div>
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