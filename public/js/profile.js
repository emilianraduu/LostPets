let type = window.location.hash.substr(1);
let currUser = document.getElementById('currUser');
let input = document.createElement('div');
input.innerHTML = "<div class='left'><form action='./control/profile-controller.php' enctype='multipart/form-data' method='post' class='form'><label for='hide_img'><img src='./public/img/avatars/<?php echo $user->getAvatar(); ?>' id='avatar'></label><input type='file' name='pic' id='hide_img'  onchange='changeProfile();' /></form>"
let body = document.getElementById('profile-page')
body.append(input);
getProfile(type);

// console.log(type);

async function getProfile(id) {
    // if (type == null)
    // id = 
    let query = await (fetch('./get/profile/' + id, {
        method: 'GET'
    }));
    // console.log(query);
    let result = await query.json();
    console.log(result);
}

document.getElementById('hide_img').onchange = function(evt) {
    let tgt = evt.target || window.event.srcElement,
        files = tgt.files;
    if (FileReader && files && files.length) {
        let fr = new FileReader();
        fr.onload = function() {
            let options = {
                method: 'POST',
                body: fr.result,
            }
            console.log(fr.result);
            document.getElementById('avatar').src = fr.result;
            fetch('./upload', options).then((response) => {
                console.log(response);
            }).catch(error => {
                console.log(error);
            })
        }
        fr.readAsDataURL(files[0]);
    }
}

if (type) {
    currUser.setAttribute('value', type);
}

async function getPet(id) {

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
        div2.innerHTML = "<div class='details'><h2> Name: " + element.name + "</h2> <h2> Species: " + element.species + "</h2><h2> Breed: " + element.breed + "</h2> <h2> Reward: " + element.reward + "</h2> <h2> Details: " + element.details + "</h2> <a href='./profile#" + element.id + "'>" + element.lname + "</a></div>";
        document.getElementById('center').appendChild(div2);
    });
}


//     <h2><?php echo $user->getLname() . ' ' . $user->getFname(); ?></h2>
//     <div class='selection'>
//         <a href='tel:<?php echo $user->getPhone(); ?> '><i class='fas fa-phone '></i>call me</a>
//     </div>
//     <div class='selection '>
//         <a href='mailto:<?php echo $user->getEmail(); ?> '> <i class='fas fa-envelope '></i>email me</a>
//     </div>
//     <script src='./public/js/profile.js'></script>
// </div>
// <div class='right'>
//     <h2>Lost</h2>
//     <div class='lost-row'>

//     </div>
// </div>
// </div>"