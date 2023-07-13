// *****************************************************************
 // Disparaître le message de succès après 2 secondes
 setTimeout(function() {
    $('#successMessage').fadeOut('slow');
}, 2000);

// Disparaître le message d'erreur après 2 secondes
setTimeout(function() {
    $('#errorMessage').fadeOut('slow');
}, 2000);import './bootstrap';
// *****************************************************************




// *****************************************************************
// Sélectionnez tous les liens de la navbar
var navLinks = document.querySelectorAll('.navbar-nav:not(#admin-nav) .nav-link');

// Parcourez les liens et ajoutez un gestionnaire d'événements clic à chacun
navLinks.forEach(function (navLink) {
    navLink.addEventListener('click', function () {
        // Vérifiez si la navbar est actuellement déployée
        var navbarCollapse = document.getElementById('navbarSupportedContent');
        if (navbarCollapse.classList.contains('show')) {
            // Repliez la navbar
            navbarCollapse.classList.remove('show');
        }
    });
});
// *****************************************************************
