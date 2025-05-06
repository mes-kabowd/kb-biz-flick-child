<?php
/**
 * Template Name: Service Unité
 * Description: Page service unité avec des statistiques et un carrousel de services.
 * @package BlankslateKabowd
 */
get_header(); ?>

        <main>
            <section class="Titre-Page Block-Main">
                <section class="Block-Gauche">
                    <h1><?php the_title(); ?></h1>
                    <h3 class="SousTitre">Sous-titre de section</h3>

                </section>
            
                <section class="Block-Droite">
                    <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/Logo Principal Couleur.png' ); ?>" alt="">
                </section>

                <section class="Bloc-Bas">
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
                </section>
            </section>

            <section class="Texte-Page Block-Main">
                <article class="Block-Gauche">
                    <h2>Services</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias illum mollitia autem fugit accusantium perferendis eum vero quis minima, ipsum tenetur asperiores ipsam distinctio at! Quasi labore aliquam officia illo officiis, minima eius. Fugit, sed quisquam sapiente labore quidem provident? Voluptas labore ratione perspiciatis, iusto tempore pariatur quas voluptatibus explicabo?</p>
                </article>
                <section class="Block-Droite">
                    <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/Icon Logo Principal Noir.png' ); ?>" alt="">
                </section>
            </section>
            
            
            <section class="Texte-Page Block-Main">
                <section class="Block-Gauche">
                    <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/Icon Logo Principal Noir.png' ); ?>" alt="">
                </section>
                <article class="Block-Droite">
                    <h2>Services</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias illum mollitia autem fugit accusantium perferendis eum vero quis minima, ipsum tenetur asperiores ipsam distinctio at! Quasi labore aliquam officia illo officiis, minima eius. Fugit, sed quisquam sapiente labore quidem provident? Voluptas labore ratione perspiciatis, iusto tempore pariatur quas voluptatibus explicabo?</p>
                </article>
            </section>

            <section class="Texte-Page Block-Main">
                <article class="Block-Gauche">
                    <h2>Services</h2>
                    <ul>
                        <li>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Atque, rerum?</li>
                        <li>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Libero, fugit.</li>
                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis, exercitationem.</li>
                        <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem, maxime!</li>
                        <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, ipsam.</li>
                    </ul>
                </article>
                <section class="Block-Droite">
                    <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/Icon Logo Principal Noir.png' ); ?>" alt="">
                </section>
            </section>

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
                        <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/Icon Logo Principal Blanc.png' ); ?>" alt="">
                        <div class="InfoBlog">
                            <h3>Titre article</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, reiciendis.</p>
                            <h4>Auteur Article</h4>
                            <a href="#" class="btn btn-primary">Bouton</a>
                        </div>
                      </article>
                      <article class="item">
                        <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/Icon Logo Principal Couleur.png' ); ?>" alt="">
                        <div class="InfoBlog">
                            <h3>Titre article</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, reiciendis.</p>
                            <h4>Auteur Article</h4>
                            <a href="#" class="btn btn-primary">Bouton</a>
                        </div>
                      </article>
                      <article class="item">
                        <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/Icon Logo Principal Noir.png' ); ?>" alt="">
                        <div class="InfoBlog">
                            <h3>Titre article</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, reiciendis.</p>
                            <h4>Auteur Article</h4>
                            <a href="#" class="btn btn-primary">Bouton</a>
                        </div>
                      </article>
                      <article class="item">
                        <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/Icon Logo Principal Couleur.png' ); ?>" alt="">
                        <div class="InfoBlog">
                            <h3>Titre article</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, reiciendis.</p>
                            <h4>Auteur Article</h4>
                            <a href="#" class="btn btn-primary">Bouton</a>
                        </div>
                      </article>
                      <article class="item">
                        <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/Icon Logo Principal Blanc.png' ); ?>" alt="">
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

            <section class="Carrousel-Infini">
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