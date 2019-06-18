let menuBtn = document.getElementById('mobile');
let rmBtn = document.getElementById('rmBtn');
let menu = document.querySelector('.links');
let init1 = () => {
    createMap();
    setInterval(() => {
        getLoc()
    }, 3000);
}

init1();
menuBtn.addEventListener('click', () => {
    menu.classList.add('show');
});
rmBtn.addEventListener('click', () => {
    menu.classList.remove('show');
});

function show_hide() {
    let click = document.getElementById("drop-content");
    if (click.style.display === "none") {
        click.style.display = "block";
    } else {
        click.style.display = "none";
    }
}


function createMap() {

    // initializare mapa
    mymap = L.map('mapid_hide');
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
    newMarkerGroup = new L.LayerGroup();
}

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
            fetchNotif();
        }
    });
}

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

async function fetchNotif() {
    // fetch
    console.log(sessionValue);
    let query = await (fetch('./get/notif/' + sessionValue, {
        method: 'GET'
    }));

}


let notifications = document.getElementById('drop-content');
notifications.innerHTML = "<a href='#' class='dropdown-item'>Un animal a fost pierdut in jurul tau!</a>";