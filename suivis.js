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
        if (reponse!="]]]]]]]")
        {

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