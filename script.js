function toggleMenu() {
    const menu = document.querySelector('.menu');
    const hamburgerMenu = document.querySelector('.hamburger-menu');
    hamburgerMenu.classList.toggle('active');
    menu.classList.toggle('active');
}
