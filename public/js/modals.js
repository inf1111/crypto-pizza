
var lostPass = document.querySelector('.lost-pass');
var more = document.querySelector('[data-modal="restore-1"] .btn');
var register = document.querySelector('[data-modal="register"] .btn');
var loginAfterReg = document.querySelector('[data-modal="register-ok"] .btn');

if (lostPass) {
    lostPass.addEventListener('click', function (e) {
        e.preventDefault();
        //(0,_modal_modal__WEBPACK_IMPORTED_MODULE_0__.modalRemove)();
        modalRemove();
        //(0,_modal_modal__WEBPACK_IMPORTED_MODULE_0__.modalAdd)('restore-1');
        modalAdd('restore-1');
    });
}

if (more) {
    more.addEventListener('click', function (e) {
        e.preventDefault();
        //(0,_modal_modal__WEBPACK_IMPORTED_MODULE_0__.modalRemove)();
        modalRemove();
        //(0,_modal_modal__WEBPACK_IMPORTED_MODULE_0__.modalAdd)('restore-2');
        modalAdd('restore-2');
    });
}

if (register) {
    register.addEventListener('click', function (e) {
        e.preventDefault();
        //(0,_modal_modal__WEBPACK_IMPORTED_MODULE_0__.modalRemove)();
        modalRemove();
        //(0,_modal_modal__WEBPACK_IMPORTED_MODULE_0__.modalAdd)('register-ok');
        modalAdd('register-ok');
    });
}

if (loginAfterReg) {
    loginAfterReg.addEventListener('click', function (e) {
        e.preventDefault();
        //(0,_modal_modal__WEBPACK_IMPORTED_MODULE_0__.modalRemove)();
        modalRemove();
        //(0,_modal_modal__WEBPACK_IMPORTED_MODULE_0__.modalAdd)('login');
        modalAdd('login');
    });
}

/////////////////////////////////////

var body = document.body;
function overlayAdd() {
    var overlay = document.createElement('div');
    overlay.setAttribute('data-backdrop', 'overlay');
    overlay.classList.add('overlay');
    body.classList.add('is-active');
    setTimeout(function () {
        return body.classList.add('is-animate');
    }, 100);
    body.appendChild(overlay);
}
function overlayRemove() {
    var overlay = document.querySelector('.overlay');

    if (overlay) {
        overlay.remove();
    }

    body.classList.remove('is-animate', 'is-active');
}

/////////////////////////////////////

function modalAdd(datamodal) {
    document.querySelector(".modal[data-modal=".concat(datamodal, "]")).classList.add('is-active');
    overlayAdd();
}
function modalRemove() {
    var modals = document.querySelectorAll('.modal');
    modals.forEach(function (item) {
        item.classList.remove('is-active');
    });
    overlayRemove();
}
document.addEventListener('click', function (e) {
    var target = e.target;

    if (target.closest('.modal .cancel')) {
        e.preventDefault();
        modalRemove();
    }

    if (target.closest('.modal__close')) {
        e.preventDefault();
        modalRemove();
    }

    if (target.closest('[data-modalshow]')) {
        e.preventDefault();
        var btn = target.closest('[data-modalshow]');
        modalAdd(btn.dataset.modalshow);
    }
});
