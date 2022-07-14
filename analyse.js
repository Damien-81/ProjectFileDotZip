$(document).ready(function () 
{
    selectManif();
    AfficherCacher();
});

function selectManif() 
{
    $.ajax(
    {
        type: "GET",
        url: "AnalyseManifestation.php",
        dataType: 'text',
        success: function choixManif(data) 
        {
            var array = data.split("/");

            for (var i = 0; i < array.length - 1; i++) 
            {
                optionText = array[i];
                optionValue = array[i];

                $('#choixManif').append(new Option(optionText, optionValue));
            }
        }
    });
}

function selectVehicule() 
{
    var Manif = $("#choixManif").val();
    var selectAnnee = $("#choixAnnee").val();

    $.ajax(
    {
        url: "selectVehicule.php",
        type: "POST",
        data: 
        {
            Annee: selectAnnee,
            Manifestation: Manif
        },
        success: function choixManif(data) 
        {
            $('#choixVehicule').text("");
            $('#choixVehicule').append(new Option('Choix Véhicule', ''));


            var array = data.split("/");

            for (var i = 0; i < array.length - 1; i++) 
            {
                optionText = array[i];
                optionValue = array[i];

                $('#choixVehicule').append(new Option(optionText, optionValue));
            }
        }
    });
}

function selectAnnee() 
{
    var Manif = $("#choixManif").val();
    $.post("Annee.php", 
    {
        data: Manif
    },
    function (data) 
    {
        $('#choixAnnee').text("");
        $('#choixAnnee').append(new Option('Choix Année', ''));

        var array = data.split("/");

        for (var i = 0; i < array.length - 1; i++) 
        {
            optionText = array[i];
            optionValue = array[i];

            $('#choixAnnee').append(new Option(optionText, optionValue));
        }
    });
}

function AfficherCacher() 
{
    var Vehicule = $("#choixVehicule").val();
    var Manifestation = $("#choixManif").val();
    if (Vehicule > 'Choix Véhicule' && Manifestation > 'Choix Manifestation') 
    {
        document.getElementById("button").style.display = "block";
        document.getElementById("buttonCsv").style.display = "block";
    } 
    else 
    {
        document.getElementById("button").style.display = "none";
        document.getElementById("buttonCsv").style.display = "none";
    }
    setTimeout('AfficherCacher();', 300);
}
