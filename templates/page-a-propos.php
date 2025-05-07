<?php
/**
 * Template Name: T À Propos
 * Description: Page à propos avec une section équipe et un formulaire de contact.
 * @package BlankslateKabowd
 */
get_header(); 
?>

<main>
    <section class="Titre-Page Block-Main">
        <H1 class="TitrePage">
            <?php
            $custom_title = kabowd_apropos_customizer('title');
            echo $custom_title ? esc_html($custom_title) : get_the_title();
            ?>
        </H1>
        <section class="Block-Gauche">
            <?php
            $custom_logo = kabowd_apropos_customizer('logo');
            if ($custom_logo) :
            ?>
                <img src="<?php echo esc_url($custom_logo); ?>" alt="">
            <?php else : ?>
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/Icon Logo Principal Blanc.png'); ?>" alt="">
            <?php endif; ?>
        </section>
        <section class="Block-Droite">
            <p class="ParagrapheTitre">
                <?php
                $custom_paragraph = kabowd_apropos_customizer('paragraph');
                if ($custom_paragraph) {
                    echo esc_html($custom_paragraph);
                } else {
                    // Affiche le contenu WordPress si pas de paragraphe customizer
                    the_content();
                }
                ?>
            </p>
            <div class="ListBtn">
                <a href="#" class="btn btn-primary">Bouton 1</a>
                <a href="#" class="btn btn-primary">Bouton 2</a>
            </div>
        </section>
    </section>
    <section class="Grd-Contact Block-Main">
        <h2> Pour nous joindre </h2>
        <section class="Block-Gauche">
            <h3>Contactez-nous</h3>
            <form action="#" method="post" class="contact-form Formulaires"  data-endpoint="https://votre-endpoint-serveur.com">
                <label for="name">Nom :</label>
                <input type="text" id="name" name="name" placeholder="Votre nom" required>
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" placeholder="Votre email" required>
                <label for="subject">Objet :</label>
                <input type="text" id="subject" name="subject" placeholder="Objet de votre demande" required>
                <label for="message">Message :</label>
                <textarea id="message" name="message" rows="5" placeholder="Votre message" required></textarea>
                <button type="submit">Envoyer</button>
            </form>
        </section>
        <section class="Block-Centre">
            <h3>Rejoignez l'équipe</h3>
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
                <button type="submit">Envoyer</button>
            </form>
        </section>
        <section class="Block-Droite">
            <h3>Collaborez avec Kabowd</h3>
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
                <button type="submit">Envoyer</button>
            </form>
        </section>
    </section>
    <section class="Carrousel-Infini Block-Main">
        <section class="Ctn-Carrousel-Infini">
            <div class="Contenu">
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
            </div>
        </section>
    </section>
</main>
<!-- Fin du contenu principal -->

<?php get_footer(); ?>