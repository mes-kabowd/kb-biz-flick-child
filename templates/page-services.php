<?php 
/**
 * Template Name: T Services
 * Description: Page des services avec un carrousel et des statistiques.
 * @package BlankslateKabowd
 */

get_header(); ?>

<main>
    <section class="Titre-Page Block-Main">
        <section class="Block-Gauche">
            <h2 class="TitrePage"><?php the_title(); ?></h2>
            <h3 class="SousTitre">
                <?php
                // Sous-titre : champ personnalisé ou Customizer
                $subtitle = get_post_meta(get_the_ID(), 'kabowd_subtitle', true);
                if (!$subtitle) $subtitle = get_theme_mod('kabowd_services_subtitle', '');
                echo $subtitle ? esc_html($subtitle) : '';
                ?>
            </h3>
        </section>
        <section class="Block-Droite">
            <?php
            // Image à la une ou logo par défaut
            if (has_post_thumbnail()) :
                the_post_thumbnail('large', ['alt' => get_the_title()]);
            else :
            ?>
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/Logo Principal Couleur.png'); ?>" alt="">
            <?php endif; ?>
        </section>
    </section>

    <section class="Texte-Page Block-Main">
        <?php
        if (have_posts()) : while (have_posts()) : the_post();
            the_content();
        endwhile; endif;
        ?>
    </section>

    <section class="Carrousel-pack Block-Main">
        <article class="Block-Haut">
            <h2><?php echo esc_html(get_post_meta(get_the_ID(), 'kabowd_stats_title', true) ?: __('Statistiques', 'blankslateKabowd')); ?></h2>
            <p><?php echo esc_html(get_post_meta(get_the_ID(), 'kabowd_stats_text', true) ?: __('Lorem, ipsum dolor sit amet consectetur adipisicing elit...', 'blankslateKabowd')); ?></p>
        </article>
        <section class="Block-Bas">
            <?php
            // Statistiques personnalisées (exemple avec 3)
            for ($i=1; $i<=3; $i++) :
                $val = get_post_meta(get_the_ID(), "kabowd_stats_value_$i", true);
                $label = get_post_meta(get_the_ID(), "kabowd_stats_label_$i", true);
                if (!$val && !$label) continue;
            ?>
            <article class="MiniStats">
                <h4 class="Valeur"><?php echo esc_html($val ?: '00%'); ?></h4>
                <h3 class="Txt-Valeur"><?php echo esc_html($label ?: "Type de Statistiques $i"); ?></h3>
            </article>
            <?php endfor; ?>
        </section>
    </section>
    
    <section class="Carrousel-pack Block-Main">
        <article class="Block-Haut">
            <h2><?php echo esc_html(get_post_meta(get_the_ID(), 'kabowd_services_title', true) ?: __('Services', 'blankslateKabowd')); ?></h2>
            <p><?php echo esc_html(get_post_meta(get_the_ID(), 'kabowd_services_text', true) ?: __('Lorem ipsum dolor sit amet...', 'blankslateKabowd')); ?></p>
        </article>
        <ul class="Carrousel">
            <?php for ($i=0; $i<5; $i++): ?>
            <li class="carte">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/Icon Logo Principal Blanc.png'); ?>" alt="">
                <div class="Contenue-Carte">
                    <h5 class="Titre-Carte"><?php echo esc_html(get_post_meta(get_the_ID(), "kabowd_card_title_$i", true) ?: __('Titre article 1', 'blankslateKabowd')); ?></h5>
                    <p><?php echo esc_html(get_post_meta(get_the_ID(), "kabowd_card_text_$i", true) ?: __("Some quick example text...", 'blankslateKabowd')); ?></p>
                    <a href="#" class="btn btn-primary"><?php esc_html_e('En voir davantage', 'blankslateKabowd'); ?></a>
                </div>
            </li>
            <?php endfor; ?>
        </ul>
    </section>

    <section class="Carrousel-Infini Block-Main">
        <section class="Ctn-Carrousel-Infini">
            <div class="Contenu">
                <?php for ($i=1; $i<=7; $i++): ?>
                <article class="ImgCtn">
                    <img src="<?php echo esc_url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/$i.png"); ?>" height="100" width="250" alt="" />
                </article>
                <?php endfor; ?>
                <?php for ($i=1; $i<=7; $i++): ?>
                <article class="ImgCtn">
                    <img src="<?php echo esc_url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/$i.png"); ?>" height="100" width="250" alt="" />
                </article>
                <?php endfor; ?>
            </div>
        </section>
    </section>
</main>

<?php get_footer(); ?>