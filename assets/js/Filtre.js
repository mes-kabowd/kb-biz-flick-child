document.addEventListener("DOMContentLoaded", function() {
  // Sélectionne tous les liens de filtre
  const filterLinks = document.querySelectorAll('.Filtre > ul > li > a');
  // Sélectionne toutes les miniCards
  const articles = document.querySelectorAll('.miniCard');

  filterLinks.forEach(link => {
    link.addEventListener('click', function(event) {
      event.preventDefault();
      // Récupère le tag sélectionné et le normalise
      const selectedTag = link.textContent.trim().toLowerCase();

      // Mise à jour visuelle : gestion de la classe active sur les filtres
      filterLinks.forEach(l => l.classList.remove("active"));
      link.classList.add("active");

      // Parcours de chaque article pour afficher/masquer selon le tag
      articles.forEach(article => {
        const tagsData = article.getAttribute('data-tags');
        if (tagsData) {
          const articleTags = tagsData.toLowerCase().split(',').map(tag => tag.trim());
          if (selectedTag === 'tout' || articleTags.includes(selectedTag)) {
            article.classList.remove('hidden');
          } else {
            article.classList.add('hidden');
          }
        }
      });
    });
  });
});