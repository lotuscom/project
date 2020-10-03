const hamburger = document.getElementById('hamburger');
const navUL = document.getElementById('menu');

hamburger.addEventListener('click', () => {
    navUL.classList.toggle('show');
});