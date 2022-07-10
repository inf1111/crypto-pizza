
// формы поиска (декстоп и мобайл)

var searchBtn = document.querySelectorAll('.search__button');
var searchForm = document.querySelectorAll('.search__form');
searchBtn.forEach(function (item) {
    item.addEventListener('click', function () {
        item.nextElementSibling.classList.add('is-active');
    });
});
document.addEventListener('click', function (e) {
    var target = e.target;

    if (!target.closest('.search')) {
        searchForm.forEach(function (item) {
            return item.classList.remove('is-active');
        });
    }
});

// форма подписки на новости на главной

$("#home_subs_form").submit(function(e){

    e.preventDefault();

    var email = $("#home_subs_input").val();

    if (email == "") {
        $("#home_subs_input").get(0).setCustomValidity('Введите e-mail');
        return false;
    }

    $("#home_subs_loading").css("display", "block");

    $.ajax({
        type: 'POST',
        url: config.routes.subscriberCreate,
        data: {
            email: email
        },
        beforeSend: function()
        {
            $("#home_subs_loading").css("display", "block");
        },
        success: function(response)
        {
            if (response["status"] == "ok") {
                $("#home_subs_msg > span").html("E-mail успешно добавлен");
                $("#home_subs_msg").css("color", "green");
            } else {
                $("#home_subs_msg > span").html("E-mail уже есть в базе");
                $("#home_subs_msg").css("color", "#F94C02");
            }

            $("#home_subs_msg").css("display", "block");
            $("#home_subs_input").val("");
            $("#home_subs_loading").css("display", "none");
        },
    });

});

// форма подписки на новости в футере

$("#footer_subs_form").submit(function(e){

    e.preventDefault();

    var email = $("#footer_subs_input").val();

    if (email == "") {
        $("#footer_subs_input").get(0).setCustomValidity('Введите e-mail');
        return false;
    }

    $("#footer_subs_loading").css("display", "block");

    $.ajax({
        type: 'POST',
        url: config.routes.subscriberCreate,
        data: {
            email: email
        },
        beforeSend: function()
        {
            $("#footer_subs_loading").css("display", "block");
        },
        success: function(response)
        {
            if (response["status"] == "ok") {
                $("#footer_subs_msg > span").html("E-mail успешно добавлен");
                $("#footer_subs_msg").css("color", "green");
            } else {
                $("#footer_subs_msg > span").html("E-mail уже есть в базе");
                $("#footer_subs_msg").css("color", "#F94C02");
            }

            $("#footer_subs_msg").css("display", "block");
            $("#footer_subs_input").val("");
            $("#footer_subs_loading").css("display", "none");
        },
    });

});

// див, всплывающий при нажатии на мигающую иконку телеги в шапке

var tgIcon = document.querySelector('.tgStatus__icon');
tgIcon.addEventListener('click', function () {
    tgIcon.nextElementSibling.classList.toggle('is-active');
});
document.addEventListener('click', function (e) {
    var target = e.target;

    if (!target.closest('.tgStatus')) {
        tgIcon.nextElementSibling.classList.remove('is-active');
    }
});

// свайпер ютюб

var youtube = new Swiper('.youtube__swiper', {
    slidesPerView: 10,
    spaceBetween: 20,
    navigation: {
        prevEl: '.youtube__nav--prev',
        nextEl: '.youtube__nav--next'
    },
    breakpoints: {
        375: {
            slidesPerView: 1
        },
        540: {
            slidesPerView: 2
        },
        1200: {
            slidesPerView: 3
        }
    }
})

// свайпер новостей

var newsSwiper = new Swiper('.newsSwiper', {
    slidesPerView: 10,
    spaceBetween: 20,
    navigation: {
        prevEl: '.newsSwiper__prev',
        nextEl: '.newsSwiper__next'
    },
    breakpoints: {
        375: {
            slidesPerView: 1
        },
        540: {
            slidesPerView: 2
        },
        1200: {
            slidesPerView: 3
        }
    }
})
