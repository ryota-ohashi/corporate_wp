document.addEventListener("DOMContentLoaded", function() {

    const menu = document.querySelector('.header-sp-menu');

    menu.addEventListener('click', function() {
        document.body.classList.toggle('sp-menu-open');
        document.documentElement.classList.toggle('sp-menu-open');
    });
});