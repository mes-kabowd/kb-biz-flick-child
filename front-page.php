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
            <H1 class="TitrePage">
                <?php
                $custom_title = kabowd_homepage_customizer('title');
                echo $custom_title ? esc_html($custom_title) : get_bloginfo('name');
                ?>
            </H1>
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
            <h2>Statistiques</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla perferendis quae veniam aperiam quidem quibusdam molestiae error ipsam, nemo cum necessitatibus saepe officiis reprehenderit, recusandae vitae, maxime voluptatum debitis aliquid voluptas minus magni voluptatibus? Ducimus quo odit excepturi doloribus sapiente nobis, repellendus vel dolore quam! Doloribus accusantium magnam deleniti officia.</p>
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
        <section class="Block-Droite">
            <div class="ImgStat">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/Icon Logo Principal Couleur.png' ); ?>" alt="">
            </div>
        </section>
    </section>
    <?php endif; ?>

    <?php if (kabowd_homepage_show_block('services')): ?>
    <section class="Carrousel-pack Block-Main">
        <article class="Block-Haut">
            <h2>Services</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias illum mollitia autem fugit accusantium perferendis eum vero quis minima, ipsum tenetur asperiores ipsam distinctio at! Quasi labore aliquam officia illo officiis, minima eius. Fugit, sed quisquam sapiente labore quidem provident? Voluptas labore ratione perspiciatis, iusto tempore pariatur quas voluptatibus explicabo?</p>
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
    <?php endif; ?>

    <?php if (kabowd_homepage_show_block('secteurs')): ?>
    <section class="Carrousel-pack Block-Main">
        <article class="Block-Haut">
            <h2>Secteurs</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias illum mollitia autem fugit accusantium perferendis eum vero quis minima, ipsum tenetur asperiores ipsam distinctio at! Quasi labore aliquam officia illo officiis, minima eius. Fugit, sed quisquam sapiente labore quidem provident? Voluptas labore ratione perspiciatis, iusto tempore pariatur quas voluptatibus explicabo?</p>
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
    <?php endif; ?>

    <?php if (kabowd_homepage_show_block('blog')): ?>
    <section class="Mini-Carrousel-Blog Block-Main">
        <h2>
            Blog
        </h2>
        <section class="Galerie-Blog">
            <input type="radio" name="position" checked />
            <input type="radio" name="position" />
            <input type="radio" name="position" />
            <input type="radio" name="position" />
            <input type="radio" name="position" />
            <div id="carousel">
              <article class="item">
                <img src="assets/img/Icon Logo Principal Blanc.png" alt="">
                <div class="InfoBlog">
                    <h3>Titre article</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, reiciendis.</p>
                    <h4>Auteur Article</h4>
                    <a href="#" class="btn btn-primary">Bouton</a>
                </div>
              </article>
              <article class="item">
                <img src="assets/img/Icon Logo Principal Couleur.png" alt="">
                <div class="InfoBlog">
                    <h3>Titre article</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, reiciendis.</p>
                    <h4>Auteur Article</h4>
                    <a href="#" class="btn btn-primary">Bouton</a>
                </div>
              </article>
              <article class="item">
                <img src="assets/img/Icon Logo Principal Noir.png" alt="">
                <div class="InfoBlog">
                    <h3>Titre article</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, reiciendis.</p>
                    <h4>Auteur Article</h4>
                    <a href="#" class="btn btn-primary">Bouton</a>
                </div>
              </article>
              <article class="item">
                <img src="assets/img/Icon Logo Principal Couleur.png" alt="">
                <div class="InfoBlog">
                    <h3>Titre article</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, reiciendis.</p>
                    <h4>Auteur Article</h4>
                    <a href="#" class="btn btn-primary">Bouton</a>
                </div>
              </article>
              <article class="item">
                <img src="assets/img/Icon Logo Principal Blanc.png" alt="">
                <div class="InfoBlog">
                    <h3>Titre article</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, reiciendis.</p>
                    <h4>Auteur Article</h4>
                    <a href="#" class="btn btn-primary">Bouton</a>
                </div>
              </article>
            
            <div>
        </section>
    </section>
    <?php endif; ?>
</main>

<?php get_footer(); ?>