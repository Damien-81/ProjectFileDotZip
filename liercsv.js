function liercsv() 
{
    var Manif = $("#choixManif").val();
    var selectAnnee = $("#choixAnnee").val();
    var Vehicule = $("#choixVehicule").val();

    $.ajax(
    {
        url: "csv.php",
        type: "POST",
        data: 
        {
            Annee: selectAnnee,
            Manifestation: Manif,
            Voiture: Vehicule
        },
    });
}
