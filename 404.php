<?php
/**
 * Template for displaying 404 pages (not found)
 * @package BlankslateKabowd
 * @package Kabowd
 */
?>
<?php get_header(); ?>
<main>
    
    <section class="Page404">
        <section class="Block-Gauche">
            <div class="IconErreur">
                <img src="<?php echo esc_url(get_theme_mod('kabowd_404_image', get_template_directory_uri() . '/assets/img/404-default.png')); ?>" alt="Erreur 404">
            </div>
            <h1 class="Erreur"><?php echo esc_html(get_theme_mod('kabowd_404_title', __('Erreur 404', 'kabowd'))); ?></h1>
        </section>
        <section class="Block-Droite">
            <h2><?php echo esc_html(get_theme_mod('kabowd_404_subtitle', __('Page non trouvée', 'kabowd'))); ?></h2>
            <p><?php echo esc_html(get_theme_mod('kabowd_404_message', __('La page que vous cherchez n’existe pas ou a été déplacée.', 'kabowd'))); ?></p>
            <h3><?php _e('Vous voulez probablement vous rendre là-bas :', 'kabowd'); ?></h3>
            <ul class="BlockBtns">
                <?php for ($i = 1; $i <= 10; $i++): ?>
                    <?php if ($text = get_theme_mod("kabowd_404_button_text_$i")): ?>
                        <li><a href="<?php echo esc_url(kabowd_404_get_button_url($i)); ?>" class="btn btn-primary"><?php echo esc_html($text); ?></a></li>
                    <?php endif; ?>
                <?php endfor; ?>
            </ul>
        </section>
    </section>
</main>
<?php get_footer(); ?>