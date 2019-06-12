var locs = [];
let body = document.getElementsByClassName('cards');
fetch('./get/98', {
        method: 'GET'
    })
    .then(response => response.json())
    .then(jsonResponse => {
        jsonResponse.forEach(element => {
            locs.push(element.location);
            var div = document.createElement('div');
            div.className = 'card';
            div.innerHTML = "<div class='primary'><a href='./pet#" + element.id + "'><img class='img-primary' src='./public/img/pets/" + element.gallery + "' alt=''><div class='user-things'> <p>" + element.name + "</p> </a></div>";
            document.getElementById('cards').appendChild(div);
        });
        if (jsonResponse[0] == null) {
            var div = document.createElement('div');
            div.className = 'card';
            div.innerHTML = "<h2> All animals around you have been found </h2>";
            document.getElementById('cards').appendChild(div);
        }
    })
    .catch(error => {
        console.log(error);
    });