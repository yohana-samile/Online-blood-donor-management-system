$(document).ready(function () {
    $('#log_me_in').on('submit', function (e) {
        e.preventDefault();
        let url = $(this).attr("action");
        let formData = new FormData(this);
        $('.loader').show();
        $.ajax({
            url: "Auth/login",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.success) {
                    if (document.readyState !== "complete") {
                        document.querySelector("body").style.visibility = "hidden";
                        document.querySelector(
                            ".loader").style.visibility = "visible";
                    }
                    else {
                        document.querySelector( ".loader").style.display = "none";
                        document.querySelector(
                            "body").style.visibility = "visible";
                    }
                    window.location.href = response.success;
                }
                else {
                    $('.loader').hide();
                    swal.fire("Error", "Wrong Username Or Password", "error");
                }
                $('#log_me_in')[0].reset();
            },
            error: function (error) {
                $('.loader').hide();
                swal.fire("Error", "An error occurred. Please try again later.", "error");
            }
        });
    });
});

