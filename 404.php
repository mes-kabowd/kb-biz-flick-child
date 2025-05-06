<?php get_header(); ?>
<main>
    <section class="Page404">
        <section class="Block-Gauche">
            <div class="IconErreur"><img src="https://media4.giphy.com/media/v1.Y2lkPTc5MGI3NjExN2FmNnVjMmIwZWkwdzdrY2Rnbm92b3pyc2VnazVvdnlpemIyd2xyYiZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9ZQ/h4OGa0npayrJX2NRPT/giphy.gif" alt=""></div>
            <h1 class="Erreur">Erreur 404</h1>
        </section>
        <section class="Block-Droite">
            <H2><?php _e('Page non trouvée', 'blankslate'); ?></H2>
            <p><?php _e('La page que vous cherchez n’existe pas ou a été déplacée.', 'blankslate'); ?></p>
            <H3><?php _e('Vous voulez probablement vous rendre là-bas :', 'blankslate'); ?></H3>
            <ul class="BlockBtns">
                <li><a href="<?php echo esc_url( home_url('/') ); ?>" class="btn btn-primary"><?php _e('Accueil', 'blankslate'); ?></a></li>
                <li><a href="<?php echo esc_url( home_url('/services') ); ?>" class="btn btn-primary"><?php _e('Services', 'blankslate'); ?></a></li>
                <li><a href="<?php echo esc_url( home_url('/secteurs') ); ?>" class="btn btn-primary"><?php _e('Secteurs', 'blankslate'); ?></a></li>
                <li><a href="<?php echo esc_url( home_url('/blog') ); ?>" class="btn btn-primary"><?php _e('Blog', 'blankslate'); ?></a></li>
                <li><a href="<?php echo esc_url( home_url('/contact') ); ?>" class="btn btn-primary"><?php _e('Contact', 'blankslate'); ?></a></li>
            </ul>
        </section>
    </section>
</main>
<?php get_footer(); ?>