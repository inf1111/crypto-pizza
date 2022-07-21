// комментарии

$(".replyLink").on("click", function(){
    var commentId = $(this).attr("data-commentId");
    $("#parentIdInput").val(commentId);
});

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

// див, всплывающий в профиле при нажании на аватар

var profile = document.querySelector('.profile')
var profileHeader = document.querySelector('.profile__btn')

if (profile) {
    profileHeader.addEventListener('click', (e) => {
        e.preventDefault()
        profile.classList.toggle('is-active')
    })
}

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
