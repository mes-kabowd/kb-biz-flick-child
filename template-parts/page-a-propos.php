<?php
/**
 * Template Name: À Propos
 */
get_header(); 
?>

<!-- Début du contenu principal identique à a-propos.html -->
<main>
    <section class="Titre-Page Block-Main">
        <H1 class="TitrePage">Titre de la page</H1>
        <section class="Block-Gauche">
            <img src="assets/img/Icon Logo Principal Blanc.png" alt="">
        </section>
        <section class="Block-Droite">
            <p class="ParagrapheTitre">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum quidem, neque id illo error provident ipsum architecto unde dolores libero optio rerum eveniet temporibus nam illum? Aspernatur fuga laborum, beatae voluptates amet incidunt ducimus iusto, harum numquam libero veritatis rem dignissimos? Ipsa, distinctio? Exercitationem sed quo rerum dolore impedit dignissimos.</p>
            <div class="ListBtn">
                <a href="#" class="btn btn-primary">Bouton 1</a>
                <a href="#" class="btn btn-primary">Bouton 2</a>
            </div>
        </section>
    </section>

    <!-- Section Équipe -->
    <section class="equipe">
        <div class="container">
            <h2>Notre Équipe</h2>
            <div class="membres">
                <!-- Bloc membre 1 -->
                <div class="membre">
                    <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/membre1.jpg' ); ?>" alt="Membre 1">
                    <h3>Nom Membre 1</h3>
                    <p>Fonction</p>
                </div>
                <!-- Bloc membre 2 -->
                <div class="membre">
                    <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/membre2.jpg' ); ?>" alt="Membre 2">
                    <h3>Nom Membre 2</h3>
                    <p>Fonction</p>
                </div>
                <!-- Vous pouvez ajouter d'autres blocs de membre de la même manière -->
            </div>
        </div>
    </section>

    <!-- Section Contact -->
    <section class="contact">
        <div class="container">
            <h2>Contactez-nous</h2>
            <p>
                Pour plus d'informations, veuillez nous contacter par téléphone ou via notre formulaire de contact.
            </p>
            <!-- Exemple d'intégration d'un formulaire de contact via shortcode (ici Contact Form 7) -->
            <?php echo do_shortcode('[contact-form-7 id="1234" title="Formulaire de Contact"]'); ?>
        </div>
    </section>
</main>
<!-- Fin du contenu principal -->

<?php get_footer(); ?>