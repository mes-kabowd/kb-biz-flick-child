<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <h1><?php the_title(); ?></h1>
        <?php if ( has_post_thumbnail() ) : ?>
            <div class="post-thumbnail">
                <?php the_post_thumbnail(); ?>
            </div>
        <?php endif; ?>
        <div class="entry-content">
            <?php the_content(); ?>
        </div>
    </article>
<?php endwhile; endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>