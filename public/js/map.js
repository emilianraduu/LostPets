navigator.geolocation.getCurrentPosition(function(location) {
    var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);
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

    var sessionValue = document.getElementById('sid').value;
    locs.forEach(element => {
        var res = element.split(" ");
        var i;
        L.marker(res).addTo(mymap);
    })
    if (sessionValue != '') {
        fetch('./add/' + sessionValue + '/coord/' + location.coords.latitude + '/' + location.coords.longitude, { method: "POST" })
            .then(response => {
                console.log(response);
            })
            .catch(() => {
                console.log("ntnt");
            })
    }

    function addMarker(e) {
        var newMarker = new L.marker(e.latlng).addTo(mymap);
    }

});