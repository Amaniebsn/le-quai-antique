$.ajax({
    url: "{{ path('siRetourExist') }}",
    type: "POST",
    dataType: 'json',
    data: {
        "retour": nameClicked //les données que tu veux envoyer à ta requête
    },
    
});


$(document).ready(function() {
    setInterval(function() {
      $.ajax({
        url: '/disponibilites', // URL de l'action Symfony qui renvoie les données
        dataType: 'json',
        success: function(data) {
          // Mettre à jour le contenu de la page avec les données de la réponse AJAX
          if (data.placesDisponibles > 0) {
            $('#places-disponibles').text('Il reste ' + data.placesDisponibles + ' places.');
          } else {
            $('#places-disponibles').text('Toutes les places ont été réservées.');
          }
        },
        error: function() {
          console.log('Une erreur s\'est produite lors de la requête AJAX.');
        }
      });
    }, 5000); // Effectuer une requête AJAX toutes les 5 secondes
  });
  
