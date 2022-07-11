
// форма подписки на новости на главной

$("#home_subs_form").submit(function(e){

    e.preventDefault();

    var email = $("#home_subs_input").val();

    if (email == "") {
        $("#home_subs_input").get(0).setCustomValidity('Введите e-mail');
        return false;
    }

    $.ajax({
        type: 'POST',
        url: config.routes.subscriberCreate,
        data: {
            email: email
        },
        beforeSend: function()
        {
            $("#loading_circle").css("display", "block");
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
            $("#loading_circle").css("display", "none");
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

    $.ajax({
        type: 'POST',
        url: config.routes.subscriberCreate,
        data: {
            email: email
        },
        beforeSend: function()
        {
            $("#loading_circle").css("display", "block");
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
            $("#loading_circle").css("display", "none");
        },
    });

});
