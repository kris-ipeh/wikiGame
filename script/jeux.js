//Géolocalisation et affichage de la météo pour suggérer des types de jeux

//une premiere fonction qui recupere les coordonnees SI le navigateur le supporte. Si ca fonctionne on declenche la fonction determinerPosition qui va renseigner les variables.
function obtenirLocalisation() {
  if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(determinerPosition, annulerAffichage);
  } else {
      alert("Geolocalisation non implementee.");
  }
}

//on declare les variables en dehors du bloc
var lat;
var long;
var url;
var city;

//si on a la position determinée on remplit les 3 variables
function determinerPosition(position) {
lat=position.coords.latitude;
long=position.coords.longitude;
console.log(lat, long);

// on récupère le nom de la ville grâce à l'API geocode de googlemap
 var GEOCODING = 'https://maps.googleapis.com/maps/api/geocode/json?latlng=' + lat + '%2C' + long + '&language=en';
  $.getJSON(GEOCODING).done(function(location) {
    city = location.results[0].address_components[2].long_name;
  })


//on appelle l'API openweathermap avec la geoloc activée
url = "http://api.openweathermap.org/data/2.5/weather?lat="+lat+"&lon="+long+"&id=kris&APPID=b2d5578f5b4a6205ce508a1f26795330&lang=fr&units=metric";
xmlhttp.open("GET", url, true);
xmlhttp.send();
}

//gestion des erreurs avec un message pour le user
function annulerAffichage(){
  var app = new Vue({
    el: '#meteo',
    data: {
      message:'ATTENTION : probleme de geolocalisation veuillez l\'activer dans votre navigateur'
    }
  })
};


var xmlhttp = new XMLHttpRequest();
var rawdata=null;
var messagemeteo=null;

xmlhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
      rawdata = JSON.parse(this.responseText);

    if ((rawdata.main.temp >= 18) && (rawdata.weather[0].icon === '01d' || rawdata.weather[0].icon === '02d' || rawdata.weather[0].icon === '03d')) {
      messagemeteo = "Avec un temps pareil wikiGame vous conseille des activités exterieures...";
    } else {
      messagemeteo = "C'est le temps idéal pour choisir un jeu d\'intérieur!!!";
    }

    var app = new Vue({
      el: '#meteo',
      data: {
        image: "http://openweathermap.org/img/w/"+rawdata.weather[0].icon+".png",
        ville: city+', ',
        meteo: Math.round(rawdata.main.temp)+ '°C,',
        temps: rawdata.weather[0].description+ '. ',
        message: messagemeteo
      }
    })
  }
};

//on appelle la fonction
obtenirLocalisation();
