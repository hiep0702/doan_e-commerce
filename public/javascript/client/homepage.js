// Top Collections

document.getElementById("next").onclick = function (e) {
    e.preventDefault();
    let lists = document.querySelectorAll(".container__slideCol-item");
    document.getElementById("slideS").appendChild(lists[0]);
};

document.getElementById("prev").onclick = function (e) {
    e.preventDefault();
    let lists = document.querySelectorAll(".container__slideCol-item");
    document.getElementById("slideS").prepend(lists[lists.length - 1]);
};

setInterval(function () {
    var slideTop = document.querySelectorAll(".container__slideCol-item");
    document.getElementById("slideS").appendChild(slideTop[0]);
}, 3000);
// New Arrivals Collection slide

document.getElementById("nextNew").onclick = function (e) {
    e.preventDefault();
    let colLists = document.querySelectorAll(".container__newArrivals-collection-list");
    document.getElementById("colListNew").appendChild(colLists[0]);

};

document.getElementById("prevNew").onclick = function (e) {
    e.preventDefault();
    let colLists = document.querySelectorAll(".container__newArrivals-collection-list");
    document.getElementById("colListNew").prepend(colLists[colLists.length - 1]);
};

// play game

var x;
var a;
var b;
var i = 0;
var c = 15;
var d = 0;
var gameOver = false;

document.getElementById("click").onclick = function (e) {
    e.preventDefault();
    x = document.getElementById("click");
    x.style.background = "red";
    document.getElementById("point").innerHTML = ++d;
};

document.getElementById("startGame").onclick = function (e) {
    e.preventDefault();

    document.getElementById("startBoard").style.display = "none";
    document.getElementById("time").innerHTML = c;
    document.getElementById("point").innerHTML = d;

    var y = setInterval(function () {
        if (gameOver) {
            return;
        }
        a = Math.floor(Math.random() * 200) + 1;
        b = Math.floor(Math.random() * 200) + 1;
        x = document.getElementById("click");
        x.style.left = a + "px";
        x.style.top = b + "px";
        x.style.background = "aquamarine";
    }, 650);
    var z = setInterval(function () {
        if (document.getElementById("time").innerHTML > 0) {
            document.getElementById("time").innerHTML = --c;
        } else {
            gameOver = true;
            document.getElementById("pointResult").innerHTML =
                document.getElementById("point").innerHTML;
            document.getElementById("percent").innerHTML =
                document.getElementById("point").innerHTML;
            document.getElementById("resultBoard").style.display = "block";
            clearInterval(y);
            clearInterval(z);
        }
    }, 1000);
};

document.getElementById("restartGame").onclick = function (e) {
    e.preventDefault();
    gameOver = false;
    document.getElementById("resultBoard").style.display = "none";
    c = 15;
    d = 0;
    document.getElementById("time").innerHTML = c;
    document.getElementById("point").innerHTML = 0;

    var y = setInterval(function () {
        if (gameOver) {
            return;
        }
        a = Math.floor(Math.random() * 200) + 1;
        b = Math.floor(Math.random() * 200) + 1;
        x = document.getElementById("click");
        x.style.left = a + "px";
        x.style.top = b + "px";
        x.style.background = "aquamarine";
    }, 650);
    var z = setInterval(function () {
        if (document.getElementById("time").innerHTML > 0) {
            document.getElementById("time").innerHTML = --c;
        } else {
            gameOver = true;
            document.getElementById("pointResult").innerHTML =
                document.getElementById("point").innerHTML;
            document.getElementById("percent").innerHTML =
                document.getElementById("point").innerHTML;
            document.getElementById("resultBoard").style.display = "block";
            clearInterval(y);
            clearInterval(z);
        }
    }, 1000);
};

// flag
setInterval(function () {
    document.getElementById("flag").style.display = "none";
}, 300);
setInterval(function () {
    document.getElementById("flag").style.display = "block";
}, 600);

document.getElementById("openBoardGame").onclick = function (e) {
    e.preventDefault();
    document.getElementById("openGame").classList.toggle("open");
};
document.getElementById("openBoardGame2").onclick = function (e) {
    e.preventDefault();
    document.getElementById("openGame").classList.toggle("open");
};


