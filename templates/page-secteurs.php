<?php
/**
 * Template Name: T Secteurs
 * Description: Page Secteurs avec des sections dynamiques et un carrousel.
 * @package BlankslateKabowd
 */
get_header();
?>

<main>
    <!-- Section Titre-Page -->
    <section class="Titre-Page Block-Main">
        <section class="Block-Gauche">
            <h1 class="TitreDePage">
                <?php
                $titre_customizer = kabowd_secteur_customizer('title', '');
                echo $titre_customizer !== '' ? esc_html($titre_customizer) : get_the_title();
                ?>
            </h1>
            <h3 class="SousTitre">
                <?php
                $sous_titre_customizer = kabowd_secteur_customizer('subtitle', '');
                echo $sous_titre_customizer !== '' ? esc_html($sous_titre_customizer) : '';
                ?>
            </h3>
        </section>
        <section class="Block-Droite">
            <?php
            $logo_customizer = kabowd_secteur_customizer('logo', '');
            if ($logo_customizer) {
                echo '<img src="' . esc_url($logo_customizer) . '" alt="">';
            } else {
                ?><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/Icon Logo Principal Blanc.png'); ?>" alt=""><?php
            }
            ?>
        </section>
    </section>

    <section class="List-Block Block-Main">
                <article class="Block-Haut">
                    <h2>Services</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias illum mollitia autem fugit accusantium perferendis eum vero quis minima, ipsum tenetur asperiores ipsam distinctio at! Quasi labore aliquam officia illo officiis, minima eius. Fugit, sed quisquam sapiente labore quidem provident? Voluptas labore ratione perspiciatis, iusto tempore pariatur quas voluptatibus explicabo?</p>
                </article>
                <section class="Block-Bas">
                    <article class="Pack">
                        <img src="assets/img/Icon Logo Principal Couleur.png" alt="">
                        <div class="card-Ctn">
                          <h4>Special title treatment</h4>
                          <p>
                            With supporting text below as a natural lead-in to additional content.
                          </p>
                          <a href="#" class="btn btn-primary">Bouton</a>
                        </div>
                    </article>
                    <article class="Pack">
                        <img src="assets/img/Icon Logo Principal Couleur.png" alt="">
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
                <img src="assets/img/Icon Logo Principal Couleur.png" alt="">
                <div class="card-Ctn">
                    <h4>Special title treatment</h4>
                    <p>
                    With supporting text below as a natural lead-in to additional content.
                    </p>
                    <a href="#" class="btn btn-primary">Bouton</a>
                </div>
            </article>
            <article class="Pack">
                <img src="assets/img/Icon Logo Principal Couleur.png" alt="">
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