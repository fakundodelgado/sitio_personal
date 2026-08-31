const btrMenu = document.getElementById('btn-menu');
const navMenu = document.getElementById('nav-menu');

btrMenu.addEventListener('click', () => {
    navMenu.classList.toggle('activo');
});