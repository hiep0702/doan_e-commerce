document.getElementById('toRegister').onclick = function (e) {
    e.preventDefault();
    document.getElementById('registerForm').classList.add('active');
    document.getElementById('signInForm').classList.remove('active');

}

document.getElementById('toSignIn').onclick = function (e) {
    e.preventDefault();
    document.getElementById('signInForm').classList.add('active');
    document.getElementById('registerForm').classList.remove('active');

}

// document.getElementById('signUp').onclick = function (e) {
//     e.preventDefault();
//     document.getElementById('registerForm').classList.add('active');
//     document.getElementById('signInForm').classList.remove('active');

// }

setInterval(function(){
    var item = document.querySelectorAll('.slideShow-image');
    document.getElementById('abc').appendChild(item[0]);
},3000);


