let type = window.location.hash.substr(1);
let locs = {};
let marker;
let circle = {};
let latlng;

getPet(type);
createMap();
setInterval(() => {
    getLoc()
}, 3000)

function getElementLocation(location) {
    let array = location.split(" ");
    let object = {
        "lat": parseFloat(array[0]),
        "lng": parseFloat(array[1])
    }
    return object;
}

async function getPet(id) {
    let query = await (fetch('./get/pet/' + id, {
        method: 'GET'
    }));
    let result = await query.json();
    result.forEach(element => {
        locs = getElementLocation(element.location);
        var div = document.createElement('div');
        div.className = 'card';
        console.log(locs)
        circle = L.circle({ 'lat': locs['lat'], 'lng': locs['lng'] }, {
            color: 'red',
            fillColor: '#f03',
            fillOpacity: 0.5,
            radius: 400
        }).addTo(mymap);
        mymap.setView(locs);
        div.innerHTML = "<div class='primary'><a href='./pet#" + element.id + "'><img class='img-primary' src='./public/img/pets/" + element.gallery + "' alt=''><div class='user-things'> <p>" + element.name + "</p> </a></div>";
        document.getElementById('left').appendChild(div);
        var div2 = document.createElement('div');
        console.log(element.id);
        div2.innerHTML = "<div class='details'><h2> Name: " + element.name + "</h2> <h2> Species: " + element.species + "</h2><h2> Breed: " + element.breed + "</h2> <h2> Reward: " + element.reward + "</h2> <h2> Details: " + element.details + "</h2> <a href='./profile#" + element.uid + "'>" + element.lname + "</a></div>";
        document.getElementById('center').appendChild(div2);
    });
}

function isEquivalent(temp, latlong) {
    // Create arrays of property names
    // console.log(Object.getOwnPropertyNames(temp))
    // if (Object.getOwnPropertyNames(temp)) {
    let aProps = Object.getOwnPropertyNames(temp);
    let bProps = Object.getOwnPropertyNames(latlong);
    // }
    // If number of properties is different,
    // objects are not equivalent
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
    // mymap.dragging.disable();


    // adresa + token
    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://mapbox.com">Mapbox</a>',
        maxZoom: 30,
        id: 'mapbox.streets',
        accessToken: 'pk.eyJ1IjoiYmJyb29rMTU0IiwiYSI6ImNpcXN3dnJrdDAwMGNmd250bjhvZXpnbWsifQ.Nf9Zkfchos577IanoKMoYQ'
    }).addTo(mymap);

    mymap.setView([0, 0], 13);
    // mymap.setView(latlng);
    newMarkerGroup = new L.LayerGroup();


    // Adaugarea markerelor pentru animale se face la fetch! de preferat functie separata
    // locs.forEach(element => {
    //     var res = element.split(" ");
    //     var i;
    //     console.log("element" + element)
    //     L.marker(res).addTo(mymap);
    // })

    // inseram coordonatele actuale in baza de date
    // insertLocation(location.coords.latitude, location.coords.longitude);

    // function addMarker(e) {
    //     var newMarker = new L.marker(e.latlng).addTo(mymap);
    // }
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
        // if (isEquivalent(temp, latlng)) {
        //     getPet();
        // }
    });
}