"use strict"

//меню бургер
const iconMenu = document.querySelector('.menu__icon');
const mobileMenu = document.querySelector('.menu__mobile');

if (iconMenu) {
    iconMenu.addEventListener("click", function (e) {
        document.body.classList.toggle('_lock');
        iconMenu.classList.toggle('_active')
        mobileMenu.classList.toggle('_active')
    });
}

//при нажатии на пункт меню - убрать меню
const menuLinks = document.querySelectorAll('.menu__link');

if (menuLinks.length > 0) {
    menuLinks.forEach(menuLink => {
        menuLink.addEventListener("click", onMenuLinkClick);
    });

    function onMenuLinkClick(e) {
        const menuLink = e.target;
        //console.log(menuLink.innerText)

        menuLink.classList.toggle('_active');
        document.body.classList.remove('_lock');
        iconMenu.classList.remove('_active')
        mobileMenu.classList.toggle('_active')

        e.preventDefault();
    }

}

//меню с точечками
// const dotsMenu = document.querySelector('#toggle');
// const mobileMenu = document.querySelector('.menu__mobile');
// if (dotsMenu) {
//     dotsMenu.addEventListener("click", function (e) {
//         document.body.classList.toggle('_lock');
//         mobileMenu.classList.toggle('_active');
//     });
// }

//при нажатии на пункт меню - убрать меню
// const menuLinks = document.querySelectorAll('.menu__link');
//
// if (menuLinks.length > 0) {
//     menuLinks.forEach(menuLink => {
//         menuLink.addEventListener("click", onMenuLinkClick);
//     });
//
//     function onMenuLinkClick(e) {
//         const menuLink = e.target;
//         //console.log(menuLink.innerText)
//
//         menuLink.classList.toggle('_active');
//         document.body.classList.remove('_lock');
//         dotsMenu.classList.remove('_active')
//         mobileMenu.classList.toggle('_active')
//
//         e.preventDefault();
//     }
//
// }
