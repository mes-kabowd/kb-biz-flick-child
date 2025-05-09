<?php 
/**
 * Template Name: T Blog
 * Description: Page de blog avec un carrousel et une liste d'articles.
 * @package BlankslateKabowd
 */
get_header(); ?>

<main>
    <section class="Titre-Page Block-Main">
        <section class="Block-Gauche">
            <h1 class="TitreDePage"><?php the_title(); ?></h1>
            <p>
                <?php
                // Affiche le contenu WordPress si présent
                if (have_posts()) : while (have_posts()) : the_post();
                    the_content();
                endwhile; endif;
                ?>
            </p>
        </section>
        <section class="Block-Droite">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/Logo Principal Couleur.png'); ?>" alt="">
        </section>
    </section>
    <section class="Carrousel-pack Block-Main">
        <article class="Block-Haut">
            <h2><?php esc_html_e('Actu en Priorité', 'blankslateKabowd'); ?></h2>
            <p><?php esc_html_e('Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias illum mollitia autem fugit accusantium perferendis eum vero quis minima, ipsum tenetur asperiores ipsam distinctio at! Quasi labore aliquam officia illo officiis, minima eius. Fugit, sed quisquam sapiente labore quidem provident? Voluptas labore ratione perspiciatis, iusto tempore pariatur quas voluptatibus explicabo?', 'blankslateKabowd'); ?></p>
        </article>
    </section>
    <section class="Grd-Carrousel-Blog Block-Main">
        <h2><?php esc_html_e('Contenu de Blog', 'blankslateKabowd'); ?></h2>
        <div class="Filtre">
            <div class="Mini-Entete">
                <h3><?php esc_html_e("Liste d'articles de Kabowd", 'blankslateKabowd'); ?></h3>
                <form onsubmit="event.preventDefault();" role="search">
                    <label for="search"><?php esc_html_e('Search for stuff', 'blankslateKabowd'); ?></label>
                    <input id="search" type="search" placeholder="<?php esc_attr_e('Search...', 'blankslateKabowd'); ?>" autofocus required />
                    <button type="submit"><?php esc_html_e('Go', 'blankslateKabowd'); ?></button>    
                </form>
            </div>
            <ul>
                <li><a href="#" class="active"><?php esc_html_e('Tout', 'blankslateKabowd'); ?></a></li>
                <li><a href="#"><?php esc_html_e('Communiqué', 'blankslateKabowd'); ?></a></li>
                <li><a href="#"><?php esc_html_e('Services', 'blankslateKabowd'); ?></a></li>
                <li><a href="#"><?php esc_html_e('Secteurs', 'blankslateKabowd'); ?></a></li>
                <li><a href="#"><?php esc_html_e('Blog', 'blankslateKabowd'); ?></a></li>
                <li><a href="#"><?php esc_html_e('À propos', 'blankslateKabowd'); ?></a></li>
            </ul>
            <section class="mainCard">
                <div class="mainCardHeader"></div>
                <section class="articles">
                    <?php for ($i=0; $i<10; $i++): ?>
                    <article class="miniCard" data-tags="Communiqué">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/Icon Logo Principal Noir.png'); ?>" alt="">
                        <div class="InfoBlog">
                            <h3><?php esc_html_e('Titre Article', 'blankslateKabowd'); ?></h3>
                            <h4><?php esc_html_e('Auteur Article', 'blankslateKabowd'); ?></h4>
                            <a href="#" class="btn btn-primary"><?php esc_html_e("Lire l'article", 'blankslateKabowd'); ?></a>
                        </div>
                    </article>
                    <?php endfor; ?>
                </section>
            </section>
        </div>
    </section>
</main>

<?php get_footer(); ?>