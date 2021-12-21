$(document).ready(function () {

    $("body").on('click', '.toggle-password', function () {
        $(this).toggleClass("bi bi-eye-slash-fill bi bi-eye-fill");
        var input = $("#password");
        if (input.attr("type") === "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }

    });
});