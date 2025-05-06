<?php get_header(); ?>

<main class="Block-Main">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article <?php post_class(); ?>>
      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <?php the_excerpt(); ?>
    </article>
  <?php endwhile; else: ?>
    <?php include get_template_directory() . '/front-page.php'; ?>
  <?php endif; ?>
</main>

<?php get_footer(); ?>