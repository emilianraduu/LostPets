var type = window.location.hash.substr(1);
var locs = [];
fetch('./get/pet/' + type, {
        method: 'POST'
    })
    .then(response => response.json())
    .then(jsonResponse => {
        jsonResponse.forEach(element => {
            locs.push(element.location);
            var div = document.createElement('div');
            div.className = 'card';
            div.innerHTML = "<div class='primary'><a href='./pet#" + element.id + "'><img class='img-primary' src='./public/img/pets/" + element.gallery + "' alt=''><div class='user-things'> <p>" + element.name + "</p> </a></div>";
            document.getElementById('left').appendChild(div);
            var div2 = document.createElement('div');
            div2.innerHTML = "<div class='details'><h2> Name: " + element.name + "</h2> <h2> Species: " + element.species + "</h2><h2> Breed: " + element.breed + "</h2> <h2> Reward: " + element.reward + "</h2> <h2> Details: " + element.details + "</h2> <a href='./profile#" + element.id + "'>" + element.lname + "</a></div>";
            document.getElementById('center').appendChild(div2);
        });
    })
    .catch(error => {
        console.log(error);
    });