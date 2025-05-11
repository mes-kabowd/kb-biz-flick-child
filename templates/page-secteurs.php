<?php
/**
 * Template Name: T Secteurs
 * Description: Page Secteurs avec des sections dynamiques et un carrousel.
 * @package BlankslateKabowd
 */
get_header();
?>

<main>
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
            if ($logo_customizer) :
            ?>
                <img src="<?php echo esc_url($logo_customizer); ?>" alt="">
            <?php else : ?>
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/Icon Logo Principal Blanc.png'); ?>" alt="">
            <?php endif; ?>
        </section>
    </section>
    <!-- Ajoutez ici les autres blocs nécessaires -->
</main>
<?php get_footer(); ?>