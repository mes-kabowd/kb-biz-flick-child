<?php
/**
 * Template Name: T À Propos
 * Description: Page à propos avec une section équipe et un formulaire de contact.
 * @package BlankslateKabowd
 */
get_header(); 
?>

<main>
    <!-- Section Titre-Page -->
    <section class="Titre-Page Block-Main">
        <h1 class="TitreDePage">
            <?php
            $titre_customizer = get_theme_mod('kabowd_apropos_title', '');
            echo $titre_customizer !== '' ? esc_html($titre_customizer) : get_the_title();
            ?>
        </h1>
        <section class="Block-Gauche">
            <?php
            $logo_customizer = get_theme_mod('kabowd_apropos_logo', '');
            if ($logo_customizer) {
                echo '<img src="' . esc_url($logo_customizer) . '" alt="">';
            } else {
                ?><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/Icon Logo Principal Blanc.png'); ?>" alt=""><?php
            }
            ?>
        </section>
        <section class="Block-Droite">
            <h3 class="SousTitre">
                <?php
                $sous_titre_customizer = get_theme_mod('kabowd_apropos_subtitle', '');
                echo $sous_titre_customizer !== '' ? esc_html($sous_titre_customizer) : '';
                ?>
            </h3>
            <p class="ParagrapheTitre">
                <?php
                $paragraphe_customizer = get_theme_mod('kabowd_apropos_paragraph', '');
                echo $paragraphe_customizer !== '' ? esc_html($paragraphe_customizer) : '';
                ?>
            </p>
            <div class="ListBtn">
                <?php
                $btn1_text = get_theme_mod('kabowd_apropos_btn1_text', 'Bouton 1');
                $btn2_text = get_theme_mod('kabowd_apropos_btn2_text', 'Bouton 2');
                ?>
                <a href="<?php echo esc_url(function_exists('kabowd_apropos_btn_url') ? kabowd_apropos_btn_url(1) : '#'); ?>" class="btn btn-primary"><?php echo esc_html($btn1_text); ?></a>
                <a href="<?php echo esc_url(function_exists('kabowd_apropos_btn_url') ? kabowd_apropos_btn_url(2) : '#'); ?>" class="btn btn-primary"><?php echo esc_html($btn2_text); ?></a>
            </div>
        </section>
    </section>

    <!-- Section Grd-Contact -->
    <section class="Grd-Contact Block-Main">
        <h2>
            <?php
            $contact_titre = get_post_meta(get_the_ID(), 'kabowd_apropos_contact_titre', true);
            if ($contact_titre !== '') {
                echo esc_html($contact_titre);
            } else {
                $contact_titre_customizer = get_theme_mod('kabowd_apropos_contact_titre', '');
                echo $contact_titre_customizer !== '' ? esc_html($contact_titre_customizer) : __('Pour nous joindre', 'blankslateKabowd');
            }
            ?>
        </h2>
        <section class="Block-Gauche">
            <h3>
                <?php
                $contact_form_titre = get_post_meta(get_the_ID(), 'kabowd_apropos_contact_form_titre', true);
                if ($contact_form_titre !== '') {
                    echo esc_html($contact_form_titre);
                } else {
                    $contact_form_titre_customizer = get_theme_mod('kabowd_apropos_contact_form_titre', '');
                    echo $contact_form_titre_customizer !== '' ? esc_html($contact_form_titre_customizer) : __('Contactez-nous', 'blankslateKabowd');
                }
                ?>
            </h3>
            <form action="#" method="post" class="contact-form Formulaires"  data-endpoint="https://votre-endpoint-serveur.com">
                <label for="name">Nom :</label>
                <input type="text" id="name" name="name" placeholder="Votre nom" required>
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" placeholder="Votre email" required>
                <label for="subject">Objet :</label>
                <input type="text" id="subject" name="subject" placeholder="Objet de votre demande" required>
                <label for="message">Message :</label>
                <textarea id="message" name="message" rows="5" placeholder="Votre message" required></textarea>
                <button type="submit"><?php echo esc_html(get_post_meta(get_the_ID(), 'kabowd_apropos_contact_form_btn', true) ?: 'Envoyer'); ?></button>
            </form>
        </section>
        <section class="Block-Centre">
            <h3>
                <?php
                $team_form_titre = get_post_meta(get_the_ID(), 'kabowd_apropos_team_form_titre', true);
                if ($team_form_titre !== '') {
                    echo esc_html($team_form_titre);
                } else {
                    $team_form_titre_customizer = get_theme_mod('kabowd_apropos_team_form_titre', '');
                    echo $team_form_titre_customizer !== '' ? esc_html($team_form_titre_customizer) : __("Rejoignez l'équipe", 'blankslateKabowd');
                }
                ?>
            </h3>
            <form action="#" method="post" class="team-form Formulaires"  data-endpoint="https://votre-endpoint-serveur.com">
                <label for="fullName">Nom complet :</label>
                <input type="text" id="fullName" name="fullName" placeholder="Votre nom complet" required>
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" placeholder="Votre email" required>
                <label for="Telephone">Numéro de téléphone :</label>
                <input type="number" id="Telephone" name="Telephone" placeholder="Votre numéro de téléphone" required>
                <label for="specialty">Spécialité :</label>
                <input type="text" id="specialty" name="specialty" placeholder="Votre domaine d'expertise" required>
                <label for="motivation">Lettre de motivation :</label>
                <textarea id="motivation" name="motivation" rows="6" placeholder="Expliquez-nous pourquoi vous souhaitez rejoindre l'équipe" required></textarea>
                <button type="submit"><?php echo esc_html(get_post_meta(get_the_ID(), 'kabowd_apropos_team_form_btn', true) ?: 'Envoyer'); ?></button>
            </form>
        </section>
        <section class="Block-Droite">
            <h3>
                <?php
                $collab_form_titre = get_post_meta(get_the_ID(), 'kabowd_apropos_collab_form_titre', true);
                if ($collab_form_titre !== '') {
                    echo esc_html($collab_form_titre);
                } else {
                    $collab_form_titre_customizer = get_theme_mod('kabowd_apropos_collab_form_titre', '');
                    echo $collab_form_titre_customizer !== '' ? esc_html($collab_form_titre_customizer) : __("Collaborez avec Kabowd", 'blankslateKabowd');
                }
                ?>
            </h3>
            <form action="#" method="post" class="collaboration-form Formulaires"  data-endpoint="https://votre-endpoint-serveur.com">
                <label for="companyName">Nom de l'entreprise :</label>
                <input type="text" id="companyName" name="companyName" placeholder="Nom de votre entreprise" required>
                <label for="contactName">Nom du contact :</label>
                <input type="text" id="contactName" name="contactName" placeholder="Votre nom" required>
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" placeholder="Votre email" required>
                <label for="subject">Objet :</label>
                <input type="text" id="subject" name="subject" placeholder="Objet de votre demande" required>
                <label for="message">Message :</label>
                <textarea id="message" name="message" rows="5" placeholder="Décrivez votre projet ou collaboration souhaitée" required></textarea>
                <button type="submit"><?php echo esc_html(get_post_meta(get_the_ID(), 'kabowd_apropos_collab_form_btn', true) ?: 'Envoyer'); ?></button>
            </form>
        </section>
    </section>

    <section class="Carrousel-Infini Block-Main">
        <section class="Ctn-Carrousel-Infini">
            <div class="Contenu">
                <?php
                if (function_exists('kabowd_apropos_carrousel_infini_ids')) {
                    $ids = kabowd_apropos_carrousel_infini_ids();
                } else {
                    $ids = [];
                }
                if (!empty($ids)) {
                    foreach ($ids as $img_id) {
                        if (wp_attachment_is_image($img_id)) {
                            $src = wp_get_attachment_image_url($img_id, 'large');
                            echo '<article class="ImgCtn"><img src="' . esc_url($src) . '" height="100" width="250" alt="" /></article>';
                        }
                    }
                } else {
                    // fallback demo images
                    ?>
                    <article class="ImgCtn">
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/1.png" height="100" width="250" alt="" />
                    </article>
                    <article class="ImgCtn">
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/2.png" height="100" width="250" alt="" />
                    </article>
                    <article class="ImgCtn">
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/3.png" height="100" width="250" alt="" />
                    </article>
                    <article class="ImgCtn">
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/4.png" height="100" width="250" alt="" />
                    </article>
                    <article class="ImgCtn">
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/5.png" height="100" width="250" alt="" />
                    </article>
                    <article class="ImgCtn">
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/6.png" height="100" width="250" alt="" />
                    </article>
                    <article class="ImgCtn">
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/7.png" height="100" width="250" alt="" />
                    </article>
                    <?php
                }
                ?>
            </div>
        </section>
    </section>
</main>

<?php get_footer(); ?>
