document.querySelector('.menu').addEventListener('change', function() {
    const logoMb = document.querySelector('.LogoMb a img');
    if (this.checked) {
        logoMb.src = 'assets/img/Logo Principal Blanc.png';
    } else {
        logoMb.src = 'assets/img/Logo Principal Couleur.png';
    }
});

const logo = document.querySelector('.Logo a img');

// Ajout de l'événement "mouseover" pour changer l'image en "Logo Principal Blanc"
logo.addEventListener('mouseover', function() {
    logo.src = 'assets/img/Logo Principal Blanc.png';
});

// Ajout de l'événement "mouseout" pour revenir à "Logo Principal Couleur"
logo.addEventListener('mouseout', function() {
    logo.src = 'assets/img/Logo Principal Couleur.png';
});