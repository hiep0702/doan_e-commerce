// Menu Sidebar

document.getElementById('openMenu').onclick = function (e) {
    e.preventDefault();
    document.getElementById('header__side').classList.toggle('activeMenu');

}

document.getElementById('closeMenu').onclick = function (e) {
    e.preventDefault();
    document.getElementById('header__side').classList.toggle('activeMenu');
    document.getElementById('drop1').classList.remove('header__side-category-active');
    document.getElementById('drop2').classList.remove('header__side-collection-active');
    document.getElementById('drop3').classList.remove('header__side-brand-active');
    document.getElementById('dropdown2').classList.remove('icon2');
    document.getElementById('dropdown1').classList.remove('icon1');
    document.getElementById('dropdown3').classList.remove('icon3');
}

document.getElementById('dropdown1').onclick = function (e) {
    e.preventDefault();
    document.getElementById('drop1').classList.toggle('header__side-category-active');
    document.getElementById('dropdown1').classList.toggle('icon1');
    document.getElementById('drop2').classList.remove('header__side-collection-active');
    document.getElementById('drop3').classList.remove('header__side-brand-active');
}

document.getElementById('dropdown2').onclick = function (e) {
    e.preventDefault();
    document.getElementById('drop2').classList.toggle('header__side-collection-active');
    document.getElementById('dropdown2').classList.toggle('icon2');
    document.getElementById('drop1').classList.remove('header__side-category-active');
    document.getElementById('drop3').classList.remove('header__side-brand-active');
}

document.getElementById('dropdown3').onclick = function (e) {
    e.preventDefault();
    document.getElementById('drop3').classList.toggle('header__side-brand-active');
    document.getElementById('dropdown3').classList.toggle('icon3');
    document.getElementById('drop1').classList.remove('header__side-category-active');
    document.getElementById('drop2').classList.remove('header__side-collection-active');
}

// Top Collections

document.getElementById('next').onclick = function (e) {
    e.preventDefault();
    let lists = document.querySelectorAll('.container__slideCol-item');
    document.getElementById('slideS').appendChild(lists[0]);
}

document.getElementById('prev').onclick = function (e) {
    e.preventDefault();
    let lists = document.querySelectorAll('.container__slideCol-item');
    document.getElementById('slideS').prepend(lists[lists.length - 1]);
}

// New Arrivals Collection slide

document.getElementById('nextNew').onclick = function (e) {
    e.preventDefault();
    let colLists = document.querySelectorAll('.container__newArrivals-collection-list');
    document.getElementById('colListNew').appendChild(colLists[0]);
}

document.getElementById('prevNew').onclick = function (e) {
    e.preventDefault();
    let colLists = document.querySelectorAll('.container__newArrivals-collection-list');
    document.getElementById('colListNew').prepend(colLists[colLists.length - 1]);
}

// Scroll Up

let mybutton = document.getElementById("scrollUp");

window.onscroll = function () { scrollFunction() };

function scrollFunction() {
    if (document.documentElement.scrollTop > 1800) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
}

function topFunction() {
    document.documentElement.scrollTop = 0;
}