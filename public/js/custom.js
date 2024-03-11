// tabs for location
function openLocation(evt, action) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(action).style.display = "block";
    evt.currentTarget.className += " active";
}

function openUserLocation(evt, locationAction) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(locationAction).style.display = "block";
    evt.currentTarget.className += " active";
}

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
                // $('#edit_blood_group')[0].reset();
            },
            error: function (error) {
                swal.fire("Error", "Something went wrong, please try again", "error");
            }
        });
    });


    // delete_blood_group
    $(document).on('click', '#delete_blood_group', function () {
        var id = $(this).data('id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "/blood/delete_blood_group/" + id,
            type: "DELETE",
            dataType: 'json',
            data: {
                "id": id
            },
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

    // delete_new
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


    // contact-messages
    $('#send_my_message').on('submit', function (e) {
        e.preventDefault();
        let url = "sendPost";
        let formData = new FormData(this);
        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            // cache: false,
            success: function (response) {
                if (response === 'success') {
                    alert('Message sent successfully');
                }
                $('#send_my_message')[0].reset();
            },
            error: function (error) {
                swal.fire("error", "Something Went Wrong, Please Try Again", "error");
            }
        });
    });


    // delete_user_query
    $(document).on('click', '#delete_query', function () {
        var id = $(this).data('id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/contact-messages/delete_user_query/" + id,
            type: "DELETE",
            dataType: 'json',
            data: {
                "id": id
            },
            success: function (response) {
                if (response.success) {
                    swal.fire("success", "User Query Deleted Successfully", "success");
                }
                window.location.href = response.success;
                $('#delete_query')[0].reset();
            },
            error: function (error) {
                swal.fire("Error", "Something went wrong, please try again", "error");
            }
        });
    });


    // send_replay
    $('#send_sms_replay').on('submit', function (e) {
        e.preventDefault();
        let id = $('#id').val();
        let url = "/contact-messages/send_sms_replay";
        let formData = new FormData(this);
        $('.loader').show();
        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                $('.loader').hide();
                // if (response.success) {
                    swal.fire("Success", "replation sent successfully", "success").then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "/contact-messages";
                            $('#send_sms_replay')[0].reset();
                        }
                    });
                // }
            },
            error: function(xhr, status, error) {
                $('.loader').hide();
                var errorMessage = (xhr.responseJSON && xhr.responseJSON.message) ? xhr.responseJSON.message : "Something went wrong, please try again";
                swal.fire("Error", errorMessage, "error");
            }
        });
    });



    // submit csv for tz regions
    $('#saveLocations').on('submit', function (e) {
        e.preventDefault();
        let url = "/residence-locations/uploadLocation";
        let formData = new FormData(this);
        $('.loader').show();
        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                $('.loader').hide();
                // if (response.success) {
                    swal.fire("Success", "Location Inserted", "success").then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "/residence-locations";
                            $('#saveLocations')[0].reset();
                        }
                    });
                // }
            },
            error: function(xhr, status, error) {
                $('.loader').hide();
                var errorMessage = (xhr.responseJSON && xhr.responseJSON.message) ? xhr.responseJSON.message : "Something went wrong, please try again";
                swal.fire("Error", errorMessage, "error");
            }
        });
    });


    // regions
    $('#saveRegions').on('submit', function (e) {
        e.preventDefault();
        let url = "/residence-locations/uploadRegions";
        let formData = new FormData(this);
        $('.loader').show();
        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                $('.loader').hide();
                // if (response.success) {
                    swal.fire("Success", "Regions Inserted", "success").then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "/residence-locations";
                            $('#saveRegions')[0].reset();
                        }
                    });
                // }
            },
            error: function(xhr, status, error) {
                $('.loader').hide();
                var errorMessage = (xhr.responseJSON && xhr.responseJSON.message) ? xhr.responseJSON.message : "Something went wrong, please try again";
                swal.fire("Error", errorMessage, "error");
            }
        });
    });

    // getting value of streets
    // Enable district field when region is selected
    $('#region').change(function() {
        var regionId = $(this).val();
        // console.log("Selected region Name: " + regionId);

        if (regionId) {
            $('#district').prop('disabled', false);
            $('#district').empty().append('<option selected hidden disabled>Fetching Districts...</option>');

            // Fetch districts based on selected region
            $.ajax({
                url: '/fetchdistricts/' + regionId,
                type: 'GET',
                success: function(data) {
                    // console.log(data); // Debugging line
                    $('#district').empty().append('<option selected hidden disabled>Choose District</option>');
                    $.each(data, function(index, district) {
                        $('#district').append('<option value="' + district.district + '">' + district.district + '</option>');
                    });
                }
            });
        } else {
            $('#district').prop('disabled', true);
        }
    });

// Enable ward field when district is selected
$('#district').change(function() {
        var districtId = $(this).val();
        if (districtId) {
            $('#ward').prop('disabled', false);
            $('#ward').empty().append('<option selected hidden disabled>Fetching Wards...</option>');

            // Fetch wards based on selected district
            $.ajax({
                url: '/fetchwards/' + districtId,
                type: 'GET',
                success: function(data) {
                    $('#ward').empty().append('<option selected hidden disabled>Choose Ward</option>');
                    $.each(data, function(key, value) {
                        $('#ward').append('<option value="' + value.ward + '">' + value.ward + '</option>');
                    });
                }
            });
        } else {
            $('#ward').prop('disabled', true);
        }
    });

    // Enable street field when ward is selected
    $('#ward').change(function() {
        var wardId = $(this).val();
        // console.log(wardId);
        if (wardId) {
            $('#street').prop('disabled', false);
            $('#street').empty().append('<option selected hidden disabled>Fetching Streets...</option>');

            // Fetch streets based on selected ward
            $.ajax({
                url: '/fetchstreets/' + wardId,
                type: 'GET',
                success: function(data) {
                    // console.log(data);
                    $('#street').empty().append('<option selected hidden disabled>Choose Street</option>');
                    $.each(data, function(index, street) {
                        $('#street').append('<option value="' + street.street + '">' + street.street + '</option>');
                    });
                }
            });
        } else {
            $('#street').prop('disabled', true);
        }
    });

    // Update place returned from street selection
    $('#street').change(function() {
        var place = $(this).find('option:selected').text();
        $('#placereturnedfromstreetselection').val(place);
    });


    // user regtration
    $('#register_me_to_become_donor').on('submit', function (e) {
        e.preventDefault();
        let url = "/Auth/registerMe";
        let formData = new FormData(this);
        $('.loader').show();

        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                $('.loader').hide();
                // if (response.success) {
                    swal.fire("Success", "Your Registration Is Complite Login Via Email and password sent", "success").then((result) => {
                        if (result.isConfirmed) {
                            // window.location.href = "/";
                            $('#register_me_to_become_donor')[0].reset();
                        }
                    });
                // }
            },
            error: function (xhr, status, error) {
                $('.loader').hide();
                swal.fire("Success", "Your Registration Is Complite Login Via Email and password sent", "success").then((result) => {
                    if (result.isConfirmed) {
                        $('#register_me_to_become_donor')[0].reset();
                    }
                });
                // var errorMessage = (xhr.responseJSON && xhr.responseJSON.message) ? xhr.responseJSON.message : "Something went wrong, please try again";
                // swal.fire("Error", errorMessage, "error");
            }
        })
    });

    // register_new_donor action performed by admn
    $('#register_new_donor').on('submit', function (e) {
        e.preventDefault();
        let url = "/donar/register_new_donor";
        let formData = new FormData(this);

        $('.loader').show();
        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                $('.loader').hide();
                swal.fire("Success", "Your Registration Is Complite Login Via Email and password sent", "success").then(($result) => {
                    if (result.isConfirmed) {
                        window.location.href = "/donar/";
                        $('#register_new_donor')[0].reset();
                    }
                });
            },
            error: function (xhr, status, error) {
                $('.loader').hide();
                swal.fire("Success", "Your Registration Is Complite Login Via Email and password sent", "success").then((result) => {
                    if (result.isConfirmed) {
                        $('#register_me_to_become_donor')[0].reset();
                    }
                });
                // var errorMessage = (xhr.responseJSON && xhr.responseJSON.message) ? xhr.responseJSON.message : "Something went wrong, please try again";
                // swal.fire("Error", errorMessage, "error");
            }
        });
    });


    // send sms notification about donation
    $('#send_sms_notification').on('submit', function (e) {
        e.preventDefault();
        let url = "/donar/sendNotification";
        let formData = new FormData(this);
            $('.loader').show();
        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                $('.loader').hide();
                swal.fire("Success", "Notification Sent To All Members Successfully", "success").then((result) => {
                    if (result.isConfirmed) {
                        // window.location.href = "/";
                        $('#send_sms_notification')[0].reset();
                    }
                });
            },
            error: function (xhr, error, status) {
                $('.loader').hide();
                var errorMessage = (xhr.responseJSON && xhr.responseJSON.message) ? xhr.responseJSON.message : "Something went wrong, please try again";
                swal.fire("Error", errorMessage, "error");
            }
        });
    });

    // register_new_hospital
    $('#register_new_hospital').on('submit', function (e) {
        e.preventDefault();
        let url = "/hospital/registerHospital";
        let formData = new FormData(this);
            $('.loader').show();
        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                $('.loader').hide();
                swal.fire("Success", "New Hospital Registered Successfully", "success").then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "/hospital/";
                        $('#register_new_hospital')[0].reset();
                    }
                });
            },
            error: function (xhr, error, status) {
                $('.loader').hide();
                var errorMessage = (xhr.responseJSON && xhr.responseJSON.message) ? xhr.responseJSON.message : "Something went wrong, please try again";
                swal.fire("Error", errorMessage, "error");
            }
        });
    });

    // saveRecord
    $('#saveRecord').on('submit', function (e) {
        e.preventDefault();
        let url = "/blood/saveRecord";
        let formData = new FormData(this);
            $('.loader').show();
        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                $('.loader').hide();
                swal.fire("Success", "New Record Inserted Successfully", "success").then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "/blood/blood-donation";
                        $('#saveRecord')[0].reset();
                    }
                });
            },
            error: function (xhr, error, status) {
                $('.loader').hide();
                var errorMessage = (xhr.responseJSON && xhr.responseJSON.message) ? xhr.responseJSON.message : "Something went wrong, please try again";
                swal.fire("Error", errorMessage, "error");
            }
        });
    });

    // updateSavedRecord
    $('#updateSavedRecord').on('submit', function (e) {
        e.preventDefault();
        let url = "/blood/updateSavedRecord";
        let formData = new FormData(this);
            $('.loader').show();
        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                $('.loader').hide();
                swal.fire("Success", "Blood Used", "success").then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "/blood/blood-donation";
                        $('#updateSavedRecord')[0].reset();
                    }
                });
            },
            error: function (xhr, error, status) {
                $('.loader').hide();
                var errorMessage = (xhr.responseJSON && xhr.responseJSON.message) ? xhr.responseJSON.message : "Something went wrong, please try again";
                swal.fire("Error", errorMessage, "error");
            }
        });
    });

    // sendBloodRequest
    $('#sendBloodRequest').on('submit', function (e) {
        e.preventDefault();
        let url = "/blood/sendBloodRequest";
        let formData = new FormData(this);
            $('.loader').show();
        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                $('.loader').hide();
                swal.fire("Success", "Request Sent Successfully, Wait For Response", "success").then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "/blood/blood-request";
                        $('#sendBloodRequest')[0].reset();
                    }
                });
            },
            error: function (xhr, error, status) {
                $('.loader').hide();
                var errorMessage = (xhr.responseJSON && xhr.responseJSON.message) ? xhr.responseJSON.message : "Something went wrong, please try again";
                swal.fire("Error", errorMessage, "error");
            }
        });
    });


    //acceptRequest blood request
    $('#acceptRequest').on('submit', function (e) {
        e.preventDefault();
        let url = "/blood/acceptRequest";
        let formData = new FormData(this);
            $('.loader').show();
        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                $('.loader').hide();
                swal.fire("Success", "Request Accepted Successfully, Thank You", "success").then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "/blood/blood-requested";
                        $('#acceptRequest')[0].reset();
                    }
                });
            },
            error: function (xhr, error, status) {
                $('.loader').hide();
                var errorMessage = (xhr.responseJSON && xhr.responseJSON.message) ? xhr.responseJSON.message : "Something went wrong, please try again";
                swal.fire("Error", errorMessage, "error");
            }
        });
    });

    // denyRequest blood-request
    $('#denyRequest').on('submit', function (e) {
        e.preventDefault();
        let url = "/blood/denyRequest";
        let formData = new FormData(this);
            $('.loader').show();
        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                $('.loader').hide();
                swal.fire("Success", "Request Denied, Due To Blood Out Of Stock", "success").then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "/blood/blood-requested";
                        $('#denyRequest')[0].reset();
                    }
                });
            },
            error: function (xhr, error, status) {
                $('.loader').hide();
                var errorMessage = (xhr.responseJSON && xhr.responseJSON.message) ? xhr.responseJSON.message : "Something went wrong, please try again";
                swal.fire("Error", errorMessage, "error");
            }
        });
    });

    // updateResidence
    $('#updateResidence').on('submit', function (e) {
        e.preventDefault();
        let url = "/donar/updateResidence";
        let formData = new FormData(this);
            $('.loader').show();
        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                $('.loader').hide();
                swal.fire("Success", "PRofile Updated Sucessfully", "success").then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "/donar/profile";
                        $('#updateResidence')[0].reset();
                    }
                });
            },
            error: function (xhr, error, status) {
                $('.loader').hide();
                var errorMessage = (xhr.responseJSON && xhr.responseJSON.message) ? xhr.responseJSON.message : "Something went wrong, please try again";
                swal.fire("Error", errorMessage, "error");
            }
        });
    });
});

