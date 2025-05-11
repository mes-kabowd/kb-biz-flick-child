<section class="Titre-Page Block-Main">
    <section class="Block-Gauche">
        <h1 class="TitreDePage"><?php the_title(); ?></h1>
        <?php if (function_exists('the_subtitle')) : ?>
            <h3 class="SousTitre"><?php the_subtitle(); ?></h3>
        <?php endif; ?>
    </section>
    <section class="Block-Droite">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('large', ['alt' => get_the_title()]); ?>
        <?php else : ?>
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/Icon Logo Principal Blanc.png'); ?>" alt="<?php the_title_attribute(); ?>">
        <?php endif; ?>
    </section>
</section>
