let body = document.querySelector('body');
fetch('https://api.chucknorris.io/jokes/categories')
.then(resp => resp.json())
.then(jsonResp =>{
    addButton(jsonResp);
    function addButton(jsonResp){
        jsonResp.forEach(obj => {
            let button = document.createElement('input');
            let label = document.createElement('label');
            button.setAttribute('type', 'radio');
            button.innerText = obj;
            button.setAttribute('name', 'radio');
            button.setAttribute('data-form', obj);
            label.innerText = obj;
            label.setAttribute('for', obj);
            button.addEventListener('click', onClick);
            body.append(label);
            body.append(button);
        });
    }
    
})
function onClick(e){
    fetch('https://api.chucknorris.io/jokes/random?category=' + e.target.dataset.form)
    .then(response => response.json())
    .then((jsonResp)=>{
        let p = document.createElement('p');
        p.innerText = jsonResp.value;
        body.append(p);
    }
    )
}