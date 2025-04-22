document.addEventListener('DOMContentLoaded', () => {
    // Sélectionnez tous les formulaires avec la classe .mini-form
    const miniForms = document.querySelectorAll('.mini-form');
  
    miniForms.forEach(form => {
      form.addEventListener('submit', (e) => {
        e.preventDefault();
  
        const formData = {};
        const elements = form.querySelectorAll('input, textarea');
        let valid = true;
  
        // Contrôle simple des champs requis
        elements.forEach(el => {
          if (el.hasAttribute('required') && !el.value.trim()) {
            el.classList.add('error');
            valid = false;
          } else {
            el.classList.remove('error');
            formData[el.name] = el.value.trim();
          }
        });
  
        if (!valid) {
          alert('Veuillez remplir correctement les champs obligatoires.');
          return;
        }
  
        // Récupération de l'URL cible du formulaire
        const endpoint = form.dataset.endpoint || 'https://votre-endpoint-serveur.com';
  
        // Désactivation du bouton en attendant la réponse
        const submitButton = form.querySelector('button');
        submitButton.disabled = true;
        submitButton.textContent = 'Envoi...';
  
        // Envoi des données via une requête POST
        fetch(endpoint, {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify(formData)
        })
        .then(response => response.json())
        .then(data => {
          console.log('Succès :', data);
          form.reset();
          submitButton.textContent = 'Envoyer';
          submitButton.disabled = false;
          alert('Votre message a été envoyé avec succès !');
        })
        .catch(err => {
          console.error('Erreur :', err);
          submitButton.textContent = 'Envoyer';
          submitButton.disabled = false;
          alert('Une erreur est survenue lors de l’envoi du formulaire.');
        });
      });
    });
  });