<?php get_header(); ?>

    <main>
        <section class="Page404">
            <section class="Block-Gauche">
                <div class="IconErreur"><img src="https://media4.giphy.com/media/v1.Y2lkPTc5MGI3NjExN2FmNnVjMmIwZWkwdzdrY2Rnbm92b3pyc2VnazVvdnlpemIyd2xyYiZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9ZQ/h4OGa0npayrJX2NRPT/giphy.gif" alt=""></div>
                <h1 class="Erreur">Erreur 404</h1>

            </section>
        
            <section class="Block-Droite">
                <h2>Bizzare! On dirait que vous vous êtes perdu.</h2>
                <p>Il semblerait la page que vous recherchez n’existe pas ou inacessible.</p>
                <h3>Vous voulez probablement vous rendre Là-bas :</h3>
                <ul class="BlockBtns">
                    <li><a href="<?php echo esc_url( home_url('/') ); ?>" class="btn btn-primary">Retour à l'accueil</a></li>
                    <li><a href="#" class="btn btn-primary">En voir davantage</a></li>
                    <li><a href="#" class="btn btn-primary">En voir davantage</a></li>
                    <li><a href="#" class="btn btn-primary">En voir davantage</a></li>
                    <li><a href="#" class="btn btn-primary">En voir davantage</a></li>
                    <li><a href="#" class="btn btn-primary">En voir davantage</a></li>
                    <li><a href="#" class="btn btn-primary">En voir davantage</a></li>
                    <li><a href="#" class="btn btn-primary">En voir davantage</a></li>
                    <li><a href="#" class="btn btn-primary">En voir davantage</a></li>
                    <li><a href="#" class="btn btn-primary">En voir davantage</a></li>
                </ul>
            </section>
        </section>
    </main>

<?php get_footer(); ?>
