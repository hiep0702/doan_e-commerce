// slide product
var main = document.querySelector('.container__productImage-mainImage');
var choose = document.querySelectorAll('.container__productImage-preview-image');

choose.forEach(imgItem=>{
    imgItem.addEventListener('mouseover',e=>{
        main.style = e.target.getAttribute('style');
    })
});


