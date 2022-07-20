
///////////// All modals

var lostPass = document.querySelector('.lost-pass');
var more = document.querySelector('[data-modal="restore-1"] .btn');
var register = document.querySelector('[data-modal="register"] .btn');
var loginAfterReg = document.querySelector('[data-modal="register-ok"] .btn');
//var eee = $('div.post-comment__noauth.');

$('#enter_from_comments_btn').on("click", function(e) {
    e.preventDefault();
    modalRemove();
    modalAdd('login');
});

$('#register_from_comments_btn').on("click", function(e) {
    e.preventDefault();
    modalRemove();
    modalAdd('register');
});

if (lostPass) {
    lostPass.addEventListener('click', function (e) {
        e.preventDefault();
        modalRemove();
        modalAdd('restore-1');
    });
}

/*if (more) {
    more.addEventListener('click', function (e) {
        e.preventDefault();
        //(0,_modal_modal__WEBPACK_IMPORTED_MODULE_0__.modalRemove)();
        modalRemove();
        //(0,_modal_modal__WEBPACK_IMPORTED_MODULE_0__.modalAdd)('restore-2');
        modalAdd('restore-2');
    });
}*/

/*if (register) {
    register.addEventListener('click', function (e) {
        e.preventDefault();
        //(0,_modal_modal__WEBPACK_IMPORTED_MODULE_0__.modalRemove)();
        modalRemove();
        //(0,_modal_modal__WEBPACK_IMPORTED_MODULE_0__.modalAdd)('register-ok');
        modalAdd('register-ok');
    });
}*/

if (loginAfterReg) {
    loginAfterReg.addEventListener('click', function (e) {
        e.preventDefault();
        //(0,_modal_modal__WEBPACK_IMPORTED_MODULE_0__.modalRemove)();
        modalRemove();
        //(0,_modal_modal__WEBPACK_IMPORTED_MODULE_0__.modalAdd)('login');
        modalAdd('login');
    });
}

//////

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

//////

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

///////////// Login

$("#modal_enter_form").submit(function(e){

    e.preventDefault();

    var email = $("#modal_enter_inp_email").val();
    var pass = $("#modal_enter_inp_pass").val();

    $.ajax({
        type: 'POST',
        url: config.routes.login,
        data: {
            email: email,
            pass: pass
        },
        beforeSend: function()
        {
            $("#loading_circle").css("display", "block");
        },
        success: function(response)
        {
            if (response["status"] == "ok") {
                window.location.href = config.routes.profileIndex;
            }
            else {
                $("#modal_enter_msg").html(response["error_msg"]);
            }

            $("#loading_circle").css("display", "none");
        },
    });

});

///////////// Register

/*$( document ).ready(function() {
    modalAdd('register');
});*/

$("#modal_register_form").submit(function(e){

    e.preventDefault();

    var email = $("#modal_register_inp_email").val();
    var pass = $("#modal_register_inp_pass").val();
    var passRepeat = $("#modal_register_inp_pass_repeat").val();

    $.ajax({
        type: 'POST',
        url: config.routes.register,
        data: {
            email: email,
            pass: pass,
            passRepeat: passRepeat
        },
        beforeSend: function()
        {
            $("#loading_circle").css("display", "block");
        },
        success: function(response)
        {
            if (response["status"] == "ok") {
                modalRemove();
                modalAdd('register-ok');
            }
            else {
                $("#modal_register_msg").html(response["error_msg"]);
            }

            $("#loading_circle").css("display", "none");
        },
    });

});

///////////// Restore-1 (enter email)

$("#modal_restore_1_form").submit(function(e){

    e.preventDefault();

    var email = $("#modal_restore_1_inp_email").val();

    $.ajax({
        type: 'POST',
        url: "https://pizza.wowcall.ru/post-email",
        data: {
            email: email,
        },
        beforeSend: function()
        {
            $("#loading_circle").css("display", "block");
        },
        success: function(response)
        {
            if (response["status"] == "ok") {
                modalRemove();
                modalAdd('restore-2');
            }
            else {
                $("#modal_restore_1_msg").html(response["error_msg"]);
            }

            $("#loading_circle").css("display", "none");
        },
    });

});
