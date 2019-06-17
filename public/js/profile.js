let type = window.location.hash.substr(1);
let currUser = document.getElementById('currUser');
let input = document.createElement('div');
let body = document.getElementById('profile-page');

getProfile(type);

async function getProfile(id) {
    let query = await (fetch('./get/profile/' + id, {
        method: 'GET'
    }));
    let result = await query.json();
    input.innerHTML = "<div class='left'><img src='./public/img/avatars/" + result["avatar"] + "' id='avatar'> <h2>" + result["lname"] + " " + result["fname"] + "</h2> <div class='selection'><a href='tel:" + result["phone"] + "'><i class='fas fa-phone '></i>call me</a></div><div class='selection'><a href='mailto:" + result["mail"] + "'><i class='fas fa-envelope '></i>email me</a></div></div"
    body.append(input);
    getPet(type);
}
if (type) {
    currUser.setAttribute('value', type);
}

async function getPet(id) {
    let query = await (fetch('./get/pet/' + id, {
        method: 'POST'
    }));
    let result = await query.json();
    let right = document.createElement('div');
    right.setAttribute('class', 'right');
    right.innerHTML = "<h2>Lost</h2>";
    let found = document.createElement('div');
    body.append(right);
    let row = document.createElement('div');
    row.setAttribute('class', 'lost-row');
    right.append(row);

    result.forEach(element => {
        // console.log(element);
        let lostpet = document.createElement('div');
        lostpet.setAttribute('id', element[0].id);
        lostpet.setAttribute('class', 'lost-pet');
        element[1].forEach(found => {
            console.log(found);

            // lostpet.innerHTML = "<a href='./pet#" + element[0].id + "'><img src='./public/img/pets/" + element[0].gallery + "'></a>"

        })
        lostpet.innerHTML = "<a href='./pet#" + element[0].id + "'><img src='./public/img/pets/" + element[0].gallery + "'></a>"

        row.append(lostpet);
    });

}