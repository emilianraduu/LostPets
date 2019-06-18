let menuBtn = document.getElementById('mobile');
let rmBtn = document.getElementById('rmBtn');
let menu = document.querySelector('.links');


menuBtn.addEventListener('click', () => {
    menu.classList.add('show');
});
rmBtn.addEventListener('click', () => {
    menu.classList.remove('show');
});

function show_hide() {
    let click = document.getElementById("drop-content");
    if (click.style.display === "none") {
        click.style.display = "block";
    } else {
        click.style.display = "none";
    }
}