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