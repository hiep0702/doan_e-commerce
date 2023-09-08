$ = function (ID) {
    return document.getElementById(ID);
}

$('returnPolicy').addEventListener('click', function (e) {
    e.preventDefault();
    // window.scrollTo(0, 500);
    window.scrollTo({top: 500, behavior: "smooth"});
});


$('warranty').addEventListener('click', function (e) {
    e.preventDefault();
    // window.scrollTo(0, 1500);
    window.scrollTo({top: 1500, behavior: "smooth"});
});

$('payment').addEventListener('click', function (e) {
    e.preventDefault();
    // window.scrollTo(2000, 2000);
    window.scrollTo({top: 2000, behavior: "smooth"});
});


$('contact').addEventListener('click', function (e) {
    e.preventDefault();
    // window.scrollTo(2500, 2500);
    window.scrollTo({top: 2500, behavior: "smooth"});
});

