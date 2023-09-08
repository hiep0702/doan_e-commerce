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

// topUpdate

setInterval(function () {
    var update = document.querySelectorAll('.header__update-1');
    document.getElementById('topUpdate').appendChild(update[0]);
}, 3000);


// show log

document.getElementById('log').onclick = function (e) {
    e.preventDefault();
    document.getElementById('openLog').classList.toggle('active');
    document.getElementById('shoppingCart').classList.remove('activeCart');
}

// shoppingCart

document.getElementById('showCart').onclick = function (e) {
    e.preventDefault();
    document.getElementById('shoppingCart').classList.toggle('activeCart');
    document.getElementById('openLog').classList.remove('active');

}

document.getElementById('hideCart').onclick = function (e) {
    e.preventDefault();
    document.getElementById('shoppingCart').classList.toggle('activeCart');
    document.getElementById('openLog').classList.remove('active');
}



// drop small menu

// object.onmousemove = function(){myScript};

var hoverMenu = document.getElementById('dropSmallMenu');
var dropMenu = document.getElementById('showSmallMenu');

hoverMenu.onmouseover = function () {
    dropMenu.style.display = 'block';
}
hoverMenu.onmouseout = function () {
    dropMenu.style.display = 'none';
}
dropMenu.onmouseover = function () {
    dropMenu.style.display = 'block';
}
dropMenu.onmouseout = function () {
    dropMenu.style.display = 'none';
};

// scroll to show

var prevScroll = window.pageYOffset;
window.addEventListener("scroll", function () {
    var currentScroll = window.pageYOffset;
    if (prevScroll < currentScroll) {
        // document.getElementById("smallHeader").style.top = "0";
        // document.getElementById("smallHeader").style.display = "block";
        document.getElementById('smallHeader').classList.add('showSmallMenu');
        document.getElementById('header__side').classList.remove('activeMenu');
        document.getElementById('drop1').classList.remove('header__side-category-active');
        document.getElementById('drop2').classList.remove('header__side-collection-active');
        document.getElementById('drop3').classList.remove('header__side-brand-active');
        document.getElementById('dropdown2').classList.remove('icon2');
        document.getElementById('dropdown1').classList.remove('icon1');
        document.getElementById('dropdown3').classList.remove('icon3');
    } else {
        document.getElementById('smallHeader').classList.remove('showSmallMenu');
        dropMenu.style.display = 'none';

        // document.getElementById("smallHeader").style.top = "-55px";
    }
    prevScroll = currentScroll;

});

// let mybutton = document.getElementById("scrollUp");

window.onscroll = function () { scrollHeader() };

function scrollHeader() {
    if (document.documentElement.scrollTop > 112) {
        document.getElementById('smallHeader').style.display = "block";
    } else {
        document.getElementById('smallHeader').style.display = "none";
    }

};
