<?php
/**
 * Template Name: T Secteurs 
 * Description: Page des secteurs avec une liste de services.
 * @package BlankslateKabowd
 */

get_header(); ?>

<main>
  <section class="Titre-Page Block-Main">
      <section class="Block-Gauche">
          <H1 class="TitrePage"><?php the_title(); ?></H1>
          <h3 class="SousTitre"><?php echo esc_html(get_theme_mod('kabowd_secteurs_subtitle', 'Sous-titre de section')); ?></h3>
      </section>
      <section class="Block-Droite">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/Icon Logo Principal Blanc.png'); ?>" alt="">
      </section>
  </section>
  
  <section class="List-Block Block-Main">
      <article class="Block-Haut">
          <h2><?php esc_html_e('Services', 'blankslateKabowd'); ?></h2>
          <p><?php esc_html_e('Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias illum mollitia autem fugit accusantium perferendis eum vero quis minima, ipsum tenetur asperiores ipsam distinctio at! Quasi labore aliquam officia illo officiis, minima eius. Fugit, sed quisquam sapiente labore quidem provident? Voluptas labore ratione perspiciatis, iusto tempore pariatur quas voluptatibus explicabo?', 'blankslateKabowd'); ?></p>
      </article>
      <section class="Block-Bas">
          <?php for ($i=0; $i<2; $i++): ?>
          <article class="Pack">
              <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/Icon Logo Principal Couleur.png'); ?>" alt="">
              <div class="card-Ctn">
                <h4><?php esc_html_e('Special title treatment', 'blankslateKabowd'); ?></h4>
                <p><?php esc_html_e('With supporting text below as a natural lead-in to additional content.', 'blankslateKabowd'); ?></p>
                <a href="#" class="btn btn-primary"><?php esc_html_e('Bouton', 'blankslateKabowd'); ?></a>
              </div>
          </article>
          <?php endfor; ?>
      </section>
  </section>
  
  <section class="List-Block Block-Main">
      <section class="Block-Bas">
          <?php for ($i=0; $i<2; $i++): ?>
          <article class="Pack">
              <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/Icon Logo Principal Couleur.png'); ?>" alt="">
              <div class="card-Ctn">
                <h4><?php esc_html_e('Special title treatment', 'blankslateKabowd'); ?></h4>
                <p><?php esc_html_e('With supporting text below as a natural lead-in to additional content.', 'blankslateKabowd'); ?></p>
                <a href="#" class="btn btn-primary"><?php esc_html_e('Bouton', 'blankslateKabowd'); ?></a>
              </div>
          </article>
          <?php endfor; ?>
      </section>
  </section>
</main>

<?php get_footer(); ?>