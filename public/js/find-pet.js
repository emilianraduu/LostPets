let type = window.location.hash.substr(1);
let locs = {};
let marker;
let circle = {};
let latlng;
let init = () => {
    getPet(type);
    createMap();
    setInterval(() => {
        getLoc()
    }, 3000);
}

init();

function getElementLocation(location) {
    let array = location.split(" ");
    let object = {
        "lat": parseFloat(array[0]),
        "lng": parseFloat(array[1])
    }
    return object;
}

let createCircle = () => {
    circle = L.circle({ 'lat': locs['lat'], 'lng': locs['lng'] }, {
        color: 'red',
        fillColor: '#f03',
        fillOpacity: 0.5,
        radius: 400
    }).addTo(mymap);
    mymap.setView(locs);
}

async function getPet(id) {
    let query = await (fetch('./get/pet/' + id, {
        method: 'GET'
    }));
    let pets = await query.json();
    pets.forEach(pet => {
        // Marcam pe harta
        locs = getElementLocation(pet.location);
        createCircle();

        // Div pt animal
        let card = document.createElement('div');
        card.className = 'card';
        card.innerHTML = "<div class='primary'><a href='./pet#" + pet.id + "'><img class='img-primary' src='./public/img/pets/" + pet.gallery + "' alt=''><div class='user-things'> <p>" + pet.name + "</p> </a></div>";
        document.getElementById('left').appendChild(card);

        let informations = document.createElement('div');
        informations.innerHTML = "<div class='details'><h2> Name: " + pet.name + "</h2> <h2> Species: " + pet.species + "</h2><h2> Breed: " + pet.breed + "</h2> <h2> Reward: " + pet.reward + "</h2> <h2> Details: " + pet.details + "</h2> <a href='./profile#" + pet.uid + "'>" + pet.lname + "</a></div>";
        document.getElementById('center').appendChild(informations);
    });
}

// Verificam locatia actuala comparativ cu locatia de acum 2 secunde
function isEquivalent(temp, latlong) {
    let aProps = Object.getOwnPropertyNames(temp);
    let bProps = Object.getOwnPropertyNames(latlong);
    if (aProps.length != bProps.length) {
        return false;
    }
    for (let i = 0; i < aProps.length; i++) {
        let propName = aProps[i];
        if (temp[propName] !== latlong[propName]) {
            return false;
        }
    }
    return true;
}

function createMap() {
    // initializare mapa
    mymap = L.map('mapid');
    getLoc();

    // adresa + token
    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://mapbox.com">Mapbox</a>',
        maxZoom: 30,
        id: 'mapbox.streets',
        accessToken: 'pk.eyJ1IjoiYmJyb29rMTU0IiwiYSI6ImNpcXN3dnJrdDAwMGNmd250bjhvZXpnbWsifQ.Nf9Zkfchos577IanoKMoYQ'
    }).addTo(mymap);

    mymap.setView([0, 0], 13);
    newMarkerGroup = new L.LayerGroup();

    // mymap.dragging.disable();
    // mymap.setView(latlng);
}

function getLoc() {
    navigator.geolocation.getCurrentPosition(function(location) {
        temp = latlng;
        latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);
        if (!marker) {
            marker = L.marker(latlng).addTo(mymap);
        } else {
            mymap.removeLayer(marker);
            marker = L.marker(latlng).addTo(mymap);
        }
    });
}