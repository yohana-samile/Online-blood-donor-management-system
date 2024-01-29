$(document).ready(function () {
    $('#log_me_in').on('submit', function (e) {
        e.preventDefault();
        let url = $(this).attr("action");
        let formData = new FormData(this);

        $.ajax({
            url: "Auth.login",
            type: "POST",
            data: formData,
            success: function (response) {
                alert('wwww');
            },
            error: function (error) {
                alert('wwww');
            }
        });
    });
});

