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
document.getElementById('scrollUp').onclick = function (e){
    e.preventDefault();
    window.scrollTo({top: 0, behavior: "smooth"});
    // document.documentElement.scrollTop = 0;
}

