// Mobile Menu Toggle
const menuToggle = document.getElementById('menu-toggle');
const mainMenu = document.getElementById('main-menu');

menuToggle.addEventListener('click', () => {
    mainMenu.classList.toggle('open');
});

// when scrolling hide
let lastScrollTop = 0;
const mainNav = document.getElementById('main-nav');
const scrollThreshold = 20; // Adjust this value as needed

window.addEventListener('scroll', function() {
    let currentScroll = window.pageYOffset || document.documentElement.scrollTop;

    if (currentScroll > lastScrollTop + scrollThreshold) {
        mainNav.classList.add('hide-nav');
    } else if (currentScroll < lastScrollTop - scrollThreshold) {
        mainNav.classList.remove('hide-nav');
    }

    lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
});