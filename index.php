<?php get_header(); ?>

<main class="Block-Main">
  <!-- Contenu par défaut : on peut rediriger vers l'accueil -->
  <?php
    // Soit inclure front-page.php :
    include get_template_directory() . '/front-page.php';
    // Ou afficher un message :
    // echo '<p>Page non spécifiée. Veuillez définir un template.</p>';
  ?>
</main>

<?php get_footer(); ?>