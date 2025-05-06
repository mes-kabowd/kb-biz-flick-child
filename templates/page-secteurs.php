<?php
/**
 * Template Name: Secteurs
 * Description: Page des secteurs avec une liste de services.
 * @package BlankslateKabowd
 */

get_header(); ?>

        <main>
            <section class="Titre-Page Block-Main">
                <section class="Block-Gauche">
                    <h1 class="TitrePage"><?php the_title(); ?></h1>
                    <h3 class="SousTitre">Sous-titre de section</h3>

                </section>
            
                <section class="Block-Droite">
                    <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/Icon Logo Principal Blanc.png' ); ?>" alt="">
                </section>
            </section>
            
            <section class="List-Block Block-Main">
                <article class="Block-Haut">
                    <h2>Services</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias illum mollitia autem fugit accusantium perferendis eum vero quis minima, ipsum tenetur asperiores ipsam distinctio at! Quasi labore aliquam officia illo officiis, minima eius. Fugit, sed quisquam sapiente labore quidem provident? Voluptas labore ratione perspiciatis, iusto tempore pariatur quas voluptatibus explicabo?</p>
                </article>
                <section class="Block-Bas">
                    <article class="Pack">
                        <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/Icon Logo Principal Couleur.png' ); ?>" alt="">
                        <div class="card-Ctn">
                          <h4>Special title treatment</h4>
                          <p>
                            With supporting text below as a natural lead-in to additional content.
                          </p>
                          <a href="#" class="btn btn-primary">Bouton</a>
                        </div>
                    </article>
                    <article class="Pack">
                        <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/Icon Logo Principal Couleur.png' ); ?>" alt="">
                        <div class="card-Ctn">
                          <h4>Special title treatment</h4>
                          <p>
                            With supporting text below as a natural lead-in to additional content.
                          </p>
                          <a href="#" class="btn btn-primary">Bouton</a>
                        </div>
                    </article>
                </section>
            </section>
            
            <section class="List-Block Block-Main">
                <section class="Block-Bas">
                    <article class="Pack">
                        <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/Icon Logo Principal Couleur.png' ); ?>" alt="">
                        <div class="card-Ctn">
                          <h4>Special title treatment</h4>
                          <p>
                            With supporting text below as a natural lead-in to additional content.
                          </p>
                          <a href="#" class="btn btn-primary">Bouton</a>
                        </div>
                    </article>
                    <article class="Pack">
                        <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/Icon Logo Principal Couleur.png' ); ?>" alt="">
                        <div class="card-Ctn">
                          <h4>Special title treatment</h4>
                          <p>
                            With supporting text below as a natural lead-in to additional content.
                          </p>
                          <a href="#" class="btn btn-primary">Bouton</a>
                        </div>
                    </article>
                </section>
            </section>

            
        </main>

<?php get_footer(); ?>