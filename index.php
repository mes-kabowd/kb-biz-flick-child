<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<main>
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php if ( is_singular('page') ) : ?>
      <?php get_template_part( 'content', 'page' ); ?>
    <?php else : ?>
      <?php get_template_part( 'content', 'excerpt' ); ?>
    <?php endif; ?>
  <?php endwhile; else: ?>
    <?php
    // Affiche la page 404 si rien n'est trouvé
    include get_stylesheet_directory() . '/404.php';
    ?>
  <?php endif; ?>
</main>

<?php get_footer(); ?>