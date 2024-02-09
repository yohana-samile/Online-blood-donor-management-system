$(document).ready(function () {
    $('#log_me_in').on('submit', function (e) {
        e.preventDefault();
        // let url = $(this).attr("action");
        let url = "Auth/login";
        let formData = new FormData(this);
        $('.loader').show();
        $.ajax({
            url: url,
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


    // register_blood_group
    $('#register_blood_group').on('submit', function (e) {
        e.preventDefault();
        let url = "/blood/register_blood_group";
        let formData = new FormData(this);

        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.success) {
                    swal.fire("success", "New Blood Group Registered", "success");
                }
                window.location.href = response.success;
                $('#register_blood_group')[0].reset();
            },
            error: function (error) {
                swal.fire("Error", "Something went wrong, please try again", "error");
            }
        });
    });

    // edit_blood_group
    $('#edit_blood_group').on('submit', function (e) {
        e.preventDefault();
        let url = "/blood/editBloodGroup";
        let formData = new FormData(this);

        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.success) {
                    swal.fire("success", "Blood Group Updated Successfully", "success");
                }
                window.location.href = response.success;
                $('#edit_blood_group')[0].reset();
            },
            error: function (error) {
                swal.fire("Error", "Something went wrong, please try again", "error");
            }
        });
    });


    // delete_blood_group
    $('#delete_blood_group').on('submit', function (e) {
        e.preventDefault();
        let url = "/blood/delete_blood_group";
        let formData = new FormData(this);

        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.success) {
                    swal.fire("success", "Blood Group Deleted Successfully", "success");
                }
                window.location.href = response.success;
                $('#delete_blood_group')[0].reset();
            },
            error: function (error) {
                swal.fire("Error", "Something went wrong, please try again", "error");
            }
        });
    });


    // roles
    $('#register_role').on('submit', function (e) {
        e.preventDefault();
        let url = "/roles/register_role";
        let formData = new FormData(this);

        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.success) {
                    swal.fire("success", "New Role Registered", "success");
                }
                window.location.href = response.success;
                $('#register_role')[0].reset();
            },
            error: function (error) {
                swal.fire("Error", "Something went wrong, please try again", "error");
            }
        });
    });

    // editRole
    $('#editRole').on('submit', function (e) {
        e.preventDefault();
        let url = "roles/edit_role";
        let formData = new FormData(this);
        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.success) {
                    swal.fire("success", "Role Updated Successfully", "success");
                }
                window.location.href = response.success;
                $('#edit_role')[0].reset();
            },
            error: function (error) {
                swal.fire("Error", "Something went wrong, please try again", "error");
            }
        });
    });


    // delete_role
    $('#delete_role').on('submit', function (e) {
        e.preventDefault();
        let url = "/roles/delete_role";
        let formData = new FormData(this);

        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.success) {
                    swal.fire("success", "One Role Deleted Successfully", "success");
                }
                window.location.href = response.success;
                $('#delete_role')[0].reset();
            },
            error: function (error) {
                swal.fire("Error", "Something went wrong, please try again", "error");
            }
        });
    });


    // add_news_and_update
    $('#add_news_and_update').on('submit', function (e) {
        e.preventDefault();
        let url = "/news/add_news_and_update";
        let formData = new FormData(this);
        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.success) {
                    swal.fire("success", "New And Update Are Uploaded Successfully", "success");
                }
                window.location.href = response.success;
                $('#add_news_and_update')[0].reset();
            },
            error: function (error) {
                swal.fire("Error", "Something went wrong, please try again", "error");
            }
        });
    });

    // edit_news_and_update
    $('#edit_news_and_update').on('submit', function (e) {
        e.preventDefault();
        let url = "/news/edit_news_and_update";
        let formData = new FormData(this);
        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.success) {
                    swal.fire("success", "news and update deleted Successully", "success");
                    window.location.href = response.success;
                    $('#edit_news_and_update')[0].reset();
                }
            },
            error: function (error) {
                swal.fire("error", "something went wrong, try again", "error");
            }
        });
    });


    $('#delete_new').on('submit', function (e) {
        e.preventDefault();
        let url = "/news/delete_news_and_update";
        let formData = new FormData(this);
        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.success) {
                    swal.fire("success", "news and update deleted Successully", "success");
                    window.location.href = response.success;
                    $('#delete_new')[0].reset();
                }
            },
            error: function (error) {
                swal.fire("error", "something went wrong, try again", "error");
            }
        });
    });

    // publish new
    $('.publish_new').click(function (e) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        e.preventDefault();
        swal.fire({
            title: "confirmation",
            text: "Are You Sure Want Publish This New? You Can't Revert This Action",
            icon: "warning",
            buttons: ["Cansel", "Okay, Proceed"],
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
        }).then((willDeny) => {
            if (willDeny) {
                form.submit();
            }
        });
    });

    $('#publish_new').on('submit', function (e) {
        e.preventDefault();
        var url = "/news/publish_new";
        var formData = new FormData(this);
        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.success) {
                    swal.fire({
                        title: "success!",
                        text: "New Published Successfully",
                        icon: "success"
                    })
                    .the(() =>{
                        window.location.href = response.success;
                    });
                }
                else{
                    swal.fire("error", "Something Went Wrong, Please Try Again", "error");
                }
            },
            error: function (error){
                swal.fire("error", "Something Went Wrong, Please Try Again", "error");
            }
        });
    });
});

