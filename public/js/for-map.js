navigator.geolocation.getCurrentPosition(function(location) {
    var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);

    var loc = document.getElementById("location");
    var latit = "";
    var long = "";

    var mymap = L.map('mapid').setView(latlng, 13)
    L.circle(latlng, {
        color: 'red',
        fillColor: '#f03',
        fillOpacity: 0.5,
        radius: 500
    }).addTo(mymap);
    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://mapbox.com">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox.streets',
        accessToken: 'pk.eyJ1IjoiYmJyb29rMTU0IiwiYSI6ImNpcXN3dnJrdDAwMGNmd250bjhvZXpnbWsifQ.Nf9Zkfchos577IanoKMoYQ'
    }).addTo(mymap);
    newMarkerGroup = new L.LayerGroup();
    var theMarker = {};
    var i = 0;

    mymap.on('click', addMarker);

    // var marker = L.marker(latlng).addTo(mymap);

    var sessionValue = document.getElementById('sid').value;

    if (sessionValue != '') {
        fetch('./add/' + sessionValue + '/coord/' + location.coords.latitude + '/' + location.coords.longitude, { method: "POST" })
            .then(response => {
                console.log(response);
            })
            .catch(error => {
                console.log(error);
            })
    }

    function addMarker(e) {

        lat = e.latlng.lat;
        lon = e.latlng.lng;

        if (theMarker != undefined) {
            mymap.removeLayer(theMarker);
        };

        latit = lat;
        long = lon;
        loc.value = latit + " " + long;

        console.log(loc.value);

        //Add a marker to show where you clicked.
        theMarker = L.marker([lat, lon]).addTo(mymap);
    }

});