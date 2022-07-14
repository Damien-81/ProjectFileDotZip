function getChart() 
{
  var Manif = $("#choixManif").val();
  var selectAnnee = $("#choixAnnee").val();
  var Vehicule = $("#choixVehicule").val();

  $.ajax(
  {
    method: "POST",
    url: "graph.php",
    data: 
    {
      Manifestation: Manif,
      Annee: selectAnnee,
      NomVehicule: Vehicule
    },
    success: function (reponse) 
    {
      var error = "Erreur le formulaire est vide.";
      if (reponse!="]]]]]]]")
      {
        var array = reponse.split("]");
        var tabVitesse = array[0].split("/");
        var tabDistance = array[1].split("/");
        var tabTemperature = array[2].split("/");
        var tabCadance = array[3].split("/");
        var tabPuissance = array[4].split("/");
        var tabCouple = array[5].split("/");
        var tabFreinage = array[6].split("/");

        tabVitesse.splice(tabVitesse.length - 1);
        tabDistance.splice(tabDistance.length - 1);
        tabTemperature.splice(tabTemperature.length - 1);
        tabCadance.splice(tabCadance.length - 1);
        tabPuissance.splice(tabPuissance.length - 1);
        tabCouple.splice(tabCouple.length - 1);
        tabFreinage.splice(tabFreinage.length - 1);

        new Chart(document.getElementById("line-chart"), 
        {
          type: 'line',
          data: 
          {
            labels: [0, 1,2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15],
            datasets: 
            [{
              data: tabVitesse,
              label: "Vitesse",
              borderColor: "#3e95cd",
              fill: false
            }, 
            {
              data: tabDistance,
              label: "Distance parcourue",
              borderColor: "#8e5ea2",
              fill: false
            },
            {
              data: tabTemperature,
              label: "Température",
              borderColor: "#008000",
              fill: false
            },
            {
              data: tabCadance,
              label: "Cadence",
              borderColor: "#FEF000",
              fill: false
            },
            {
              data: tabPuissance,
              label: "Puissance humaine",
              borderColor: "#FF0000",
              fill: false
            },
            {
              data: tabCouple,
              label: "Couple pédalier",
              borderColor: "#FFFF00",
              fill: false
            },
            {
              data: tabFreinage,
              label: "Freinage",
              borderColor: "#FFFO00",
              fill: false
            },
          ]},
          options: 
          {
            title: 
            {
              display: true,
              text: 'Statistiques des véhicules'
            }
          }
        });

    }
    else
    {
      alert(error);
    }
    },
    error: function () 
    {
      console.log('une erreur est survenue');
      return false;
    }
  });
}