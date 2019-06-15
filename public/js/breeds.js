let breed = document.getElementById('breeds');
let dog = document.getElementById('dog');
let species = document.getElementById('species');
species.addEventListener("change", change);


function change() {
    if (species.value == "Dog") {
        deleteOptions();
        getDogBreeds();
    }
    if (species.value == "Cat") {
        deleteOptions();
        getCatBreeds();
    }
}

function deleteOptions() {
    let child = breed.lastElementChild;
    while (child) {
        breed.removeChild(child);
        child = breed.lastElementChild;
    }
}

async function getDogBreeds() {
    let breeds = await (fetch('https://dog.ceo/api/breeds/list/all'));
    let response = await (breeds.json());

    Object.keys(response.message).forEach(function (value, i) {
        let option = document.createElement('option');
        option.text = value;
        breed.append(option);
    });
}

async function getCatBreeds() {
    let breeds = await (fetch('https://api.thecatapi.com/v1/breeds', {
        headers: {
            'x-api-key': "3aab24bf-1e6a-45c1-bc7f-24ec43299289"
        }
    }));
    let response = await breeds.json();
    response.forEach(element => {
        let option = document.createElement('option');
        option.text = element.name;
        breed.append(option);
    })
}