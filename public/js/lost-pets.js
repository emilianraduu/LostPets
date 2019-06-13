let locs = []
let userLocations = []
let latlng;
let marker;
let sessionValue = document.getElementById('sid').value;
let mymap;
let temp = {
    "lat": 0,
    "lng": 0
};
let sid = document.getElementById('sid').value;
let body = document.getElementsByClassName('cards');
let existingElements = {};
let fetchElementId = [];
let petMarkers = [];
let container = document.getElementById('cards');


function getElementLocation(location) {
    let array = location.split(" ");
    let object = {
        "lat": parseFloat(array[0]),
        "lng": parseFloat(array[1])
    }
    return object;
}

function removePetLocation(id) {

}

function removeCard(element) {
    document.getElementById(element).remove();
    mymap.removeLayer(petMarkers[element]);

}

function createCard(element) {
    let div = document.createElement('div');
    div.className = 'card';
    div.setAttribute('id', element.id);
    loc = element.location.split(" ");
    console.log(loc);
    petMarkers[element.id] = L.circle({ 'lat': loc[0], 'lng': loc[1] }, {
        color: 'red',
        fillColor: '#f03',
        fillOpacity: 0.5,
        radius: 400
    }).addTo(mymap);
    div.innerHTML = "<div class='primary' ><a href='./pet#" + element.id + "'><img class='img-primary' src='./public/img/pets/" + element.gallery + "' alt=''><div class='user-things'> <p>" + element.name + "</p> </a></div>";
    container.appendChild(div)
}

async function fetchPet() {
    // fetch
    let query = await (fetch('./get/' + latlng.lat + '/' + latlng.lng, {
        method: 'GET'
    }));
    // check fetch
    let result = await query.json();
    if (result) {
        // daca nu exista animale le luam pe toate din jur
        if (container.children.length == 0) {
            result.forEach(element => {
                createCard(element);
                // fetchElementId.push(element.id);
                existingElements[element.id] = true;
            });
        }
        // altfel adaugam doar animalele noi aparute
        else {

            for (let i = 0; i < container.children.length; i++) {
                if (!existingElements[container.children[i].id]) {
                    existingElements[container.children[i].id] = true;
                    console.log(existingElements);
                }
                let found = result.find((element) => {
                    return container.children[i].id == element.id;
                });
                if (!found) {
                    delete(existingElements[container.children[i].id]);
                    removeCard(container.children[i].id);


                }
            }
            result.forEach(element => {
                console.log("2");
                if (!existingElements[element.id]) {
                    console.log("1");
                    createCard(element);

                    // console.log(arr_diff(fetchElementId, existingElements));

                }
            });
            // if () {
            //     console.log(existingElements)
            //     console.log(element.id)
            //     removeCard(element.id);
            // }
        }
        // de implementat stergerea animalelor cand ies din raza (nu le mai primesc id-ul in fetch)
    }
}

function createMap() {

    // initializare mapa
    // latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);

    mymap = L.map('mapid');
    getLoc();
    mymap.dragging.disable();


    // adresa + token
    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://mapbox.com">Mapbox</a>',
        maxZoom: 30,
        id: 'mapbox.streets',
        accessToken: 'pk.eyJ1IjoiYmJyb29rMTU0IiwiYSI6ImNpcXN3dnJrdDAwMGNmd250bjhvZXpnbWsifQ.Nf9Zkfchos577IanoKMoYQ'
    }).addTo(mymap);

    mymap.setView([0, 0], 13);

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

// nu trebuie sa tin locatia in baza de date, o am pe front mereu si fac interogarile din api cu coordonatele latlng
async function insertLocation(lat, long) {
    if (sessionValue != '') {
        let x = await (fetch('./add/' + sessionValue + '/coord/' + lat + '/' + long, { method: "POST" }));
        console.log(await x);
    }
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

// iau locatia actuala a utilizatorului
function getLoc() {
    navigator.geolocation.getCurrentPosition(function(location) {
        temp = latlng;
        latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);
        mymap.setView(latlng);
        if (!marker) {
            marker = L.marker(latlng).addTo(mymap);
        } else {
            mymap.removeLayer(marker);
            marker = L.marker(latlng).addTo(mymap);
        }
        if (isEquivalent(temp, latlng)) {
            fetchPet();
        }
    });
}

createMap();
getLoc();
fetchPet();
setInterval(() => {
    getLoc()
}, 3000)



// a.push(element.id);
// jsonResponse.forEach(element => {
// document.getElementById('cards').remove();
// var cards = document.createElement('div');
// cards.setAttribute('class', 'cards');
// cards.setAttribute('id', 'cards');
// cont.appendChild(cards);



// var childs = cont.children;

// if (childs.length == 0) {
//     var div = document.createElement('div');
//     div.className = 'card';
//     div.setAttribute('id', element.id);
//     // console.log(cont[i]);
//     div.innerHTML = "<div class='primary' ><a href='./pet#" + element.id + "'><img class='img-primary' src='./public/img/pets/" + element.gallery + "' alt=''><div class='user-things'> <p>" + element.name + "</p> </a></div>";
//     cont.appendChild(div)
// } else
//     for (let i = 0; i < childs.length; i++) {
//         console.log(childs[i].id);
//         if (childs[i].id != element.id) {
//             var div = document.createElement('div');
//             div.className = 'card';
//             div.setAttribute('id', element.id);
//             // console.log(cont[i]);
//             div.innerHTML = "<div class='primary' ><a href='./pet#" + element.id + "'><img class='img-primary' src='./public/img/pets/" + element.gallery + "' alt=''><div class='user-things'> <p>" + element.name + "</p> </a></div>";
//             cont.appendChild(div);
//         }

//     }




// }


// locs.push(element.location);
// var div = document.createElement('div');
// div.className = 'card';

// div.innerHTML = "<div class='primary' id ='" + element.id + "'><a href='./pet#" + element.id + "'><img class='img-primary' src='./public/img/pets/" + element.gallery + "' alt=''><div class='user-things'> <p>" + element.name + "</p> </a></div>";
// cont.appendChild(div);
// });
// if (jsonResponse[0] == null) {
//     var div = document.createElement('div');
//     div.className = 'card';
//     div.innerHTML = "<h2> All animals around you have been found </h2>";
//     document.getElementById('cards').appendChild(div);
// }