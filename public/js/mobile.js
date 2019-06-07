let menuBtn = document.getElementById('mobile');
let rmBtn = document.getElementById('rmBtn');
let menu = document.querySelector('.links');

menuBtn.addEventListener('click', () => {
    menu.classList.add('show');
});
rmBtn.addEventListener('click', () => {
    menu.classList.remove('show');
});