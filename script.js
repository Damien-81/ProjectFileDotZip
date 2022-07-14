var map;
var markerGPS = null;
var test = 1;

$(document).ready(function () 
{
    manifestationEnCours();
});

function ajoutMarker() 
{

    var action = "posVehicule"
    var selectVehicule = $("#choixVehicule").val();

    $.ajax(
        {
        url: "Function.php",
        type: "POST",
        data: {
            Vehicule: selectVehicule,
            action: action
        }, 
        success: function choixManif(data) 
        {
            var array = data.split("/");
            var LatitudeVehicule = array[1];
            var LongitudeVehicule = array[0];
            if (markerGPS == null) 
            {
                markerGPS = L.marker([LatitudeVehicule, LongitudeVehicule]).addTo(map);
            } else 
            {
                var newLatLng = new L.LatLng(LatitudeVehicule, LongitudeVehicule);
                markerGPS.setLatLng(newLatLng);
            }
        }

    });
    setTimeout('ajoutMarker();', 1000);
}


function selectManif(date) 
{
    var Action = "Manifestation";
    var string = date.toString();

    $.ajax(
        {
        url: "Function.php", 
        type: "POST",
        data: {
            dateEnvoyer: string,
            action: Action
        }, 
        success: function choixManif(data) 
        {
            var array = data.split("/");
            $('#choixManif').append(new Option('Choix Manifestation', ''));

            for (let i = 0; i < array.length - 1; i++) 
            {
                optionText = array[i];
                optionValue = array[i];

                $('#choixManif').append(new Option(optionText, optionValue));
            }
        }

    });
}


function ajoutMap() 
{

    var action = "map"
    var manifestation = $("#choixManif").val();

    $.ajax(
        {
            url: "Function.php",
            type: "POST",
            data: 
            {
                Manif: manifestation,
                action: action
            },
        success: function(data) 
        {
        var array = data.split("/");

        var Latitude0 = parseFloat(array[0]);
        var Latitude1 = parseFloat(array[1]);
        var Latitude = (Latitude0 + Latitude1) / 2;

        var Longitude0 = parseFloat(array[2]);
        var Longitude1 = parseFloat(array[3]);
        var Longitude = (Longitude0 + Longitude1) / 2;

        var worldImagine = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', 
        {
            attribution: '© World Street Map',
            maxZoom: 19,
            zoomSnap: 0.25
        });

        var osmLayer = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', 
        { // LIGNE 20
            attribution: '© OpenStreetMap contributors',
            maxZoom: 19,
            zoomSnap: 0.25

        });

        if (test == 1 && !(isNaN(Latitude)) ) 
        {
            map = L.map('map', 
            {
                layers: [worldImagine, osmLayer]
            }).setView([Latitude, Longitude], 15.40); // LIGNE 18 

            var baselayer = 
            {
                "osm": osmLayer,
                "worlImagery": worldImagine
            }

            L.control.layers(baselayer).addTo(map);
            test = test + 1;
        } else if(!(isNaN(Latitude))) 
        {
            map.flyTo([Latitude, Longitude], 15)
        }
     }
    });
}

function selectVehicule() 
{
    var action = "Vehicule";
    var manif = $("#choixManif").val();

    $.ajax({
        url: "Function.php",
        type: "POST",
        data: 
        {
            Manifestation: manif,
            action: action
        },
        success: function choixManif(data) 
        {
            $('#choixVehicule').text("");


            var array = data.split("/");

            for (let i = 0; i < array.length - 1; i++) 
            {                  
                optionText = array[i];
                optionValue = array[i];

                $('#choixVehicule').append(new Option(optionText, optionValue));
            }
        }
    });
}

function manifestationEnCours()
{
    var action = "EnCours";

    $.ajax(
        {
        url: "Function.php",
        type: "POST",
        data: 
        {
            action: action
        },
        success: function choixManif(data) 
        {
            var array = data.split("/");

            if ( array[0] == "true")
            {
                document.getElementById("select").style.display = "block"; 
                document.getElementById("table").style.display = "block" 
                selectManif(array[1]);
            }else
            {
                document.getElementById("select").style.display = "none";
                alert("AUCUNE COURSE N'EST ACTUELLEMENT EN COURS VEUILLEZ VERIFIER LES HORAIRES");
            }

        }
    });
}


function getdata()
{
    var vehiculeSelect = $("#choixVehicule").val();
    var manifSelect = $("#choixManif").val();

    $.ajax({
        type: 'post',
        url: 'getdata.php',
        data: {
            vehiculeSelect:vehiculeSelect,
            manifSelect:manifSelect,
        },
        success: function test(response) 
        {

            var table = response.split("/");
            document.getElementById("NomVehicule").innerHTML = table[0];
            document.getElementById("SignalControleur").innerHTML = table[1];
            document.getElementById("PuissanceHumaine").innerHTML = table[2];
            document.getElementById("Vitesse").innerHTML = table[3];
            document.getElementById("CouplePedalier").innerHTML = table[4];
            document.getElementById("Drapeaux").innerHTML = table[5];
        },
        
    });
    setTimeout('getdata()', 1000);
}