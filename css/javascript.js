let menuBtn = document.getElementById('menuBtn');
let menu = document.querySelector('.non-mobile');
let rmmenu = document.getElementById('rmBtn');

menuBtn.addEventListener('click', () => {
    menu.classList.add('is--open');
});

rmBtn.addEventListener('click', () => {
    menu.classList.remove('is--open');
});