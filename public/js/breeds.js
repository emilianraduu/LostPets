let breed = document.getElementById('breeds');
let dog = document.getElementById('dog');
let species = document.getElementById('species');
var count = 0;
species.addEventListener("change", change);

function change() {
    if (species.value == "Dog") {
        fetch('https://dog.ceo/api/breeds/list/all')
            .then(response => response.json())
            .then(jsonResponse => {
                count = Object.keys(jsonResponse.message).length;
                Object.keys(jsonResponse.message).forEach(function(value, i) {
                    let option = document.createElement('option');
                    option.text = value;
                    breed.append(option);
                });
            })
            .catch(error => {});
    }


    if (species.value == "Cat") {
        for (var i = 0; i < count; i++) {
            breed.remove(breed);
        }
        fetch('https://catfact.ninja/breeds', {
                mode: 'cors',
                headers: {
                    'Access-Control-Allow-Origin': 'localhost'
                }
            })
            .then(response => {
                console.log(response);
            })
            // .then(jsonResponse => {
            // count = Object.keys(jsonResponse.message).length;
            // console.log(count);
            // // for (var i = 1; i <= Object.keys(jsonResponse.message).length; i++) {
            // //     let option = document.createElement('option');
            // //     option.innerHTML = Object.keys(jsonResponse.message);
            // //     console.log(option.innerText);
            // //     body.append(option);
            // // }
            // Object.keys(jsonResponse.message).forEach(function(value, i) {
            //     let option = document.createElement('option');
            //     option.text = value;
            //     console.log(option.text);
            //     breed.append(option);
            // });
            // console.log(jsonResponse);
            // })
            .catch(error => {
                console.log(error);
            });
    }
}