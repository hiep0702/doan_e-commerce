document.getElementById('edit').onclick = function (e) {
    e.preventDefault();
    document.getElementById('showEdit').classList.add('active');
    document.getElementById('showOff').classList.add('off');
}

document.getElementById('change').onclick = function (e) {
    e.preventDefault();
    document.getElementById('showChange').classList.add('active');
    document.getElementById('showOff').classList.add('off');
}

document.getElementById('offEdit').onclick = function (e) {
    e.preventDefault();
    document.getElementById('showEdit').classList.remove('active');
    document.getElementById('showOff').classList.remove('off');
}

document.getElementById('offChange').onclick = function (e) {
    e.preventDefault();
    document.getElementById('showChange').classList.remove('active');
    document.getElementById('showOff').classList.remove('off');
}

document.getElementById('showMenu').onclick = function (e) {
    e.preventDefault();
    document.getElementById('menu').classList.toggle('abc');
}

document.getElementById('changeAvatar').onclick = function (e) {
    e.preventDefault();
    document.getElementById('upload_form').classList.toggle('on');
}
