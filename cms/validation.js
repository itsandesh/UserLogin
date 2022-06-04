

$(document).ready(function () {
    $('#username').on('input', function () {
        checkusername();
    });
    $('#email').on('input', function () {
        checkemail();
    });
    $('#pass').on('input', function () {
        checkpass();
    });

    $('#submitbtn').click(function () {

        if (!checkusername() && !checkemail() && !checkpass()) {
            console.log("er1");
            $("#message").html(
                `<div class=" alert alert-warning">Please fill all required field</div>`);
            // alert('Fuck you')
        } else if (!checkusername() || !checkemail() || !checkpass()) {
            $("#message").html(`<div class="alert alert-warning">Please fill all required field</div>`);
            console.log("er");
        }
        else {

            console.log("in Submit");
            $("#message").html("");
            var form = $('#myform')[0];
            var data = new FormData(form);
            $.ajax({
                type: "",
                url: " ",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                beforeSend: function () {
                    $('#submitbtn').html('<i class="fa-solid fa-spinner fa-spin"></i>');
                    $('#submitbtn').attr("disabled", true);
                    $('#submitbtn').css({ "border-radius": "100%" });
                },

                success: function (data) {
                    $('#message').html(data);
                },
                complete: function () {
                    setTimeout(function () {
                        $('#myform').trigger("reset");
                        $('#submitbtn').html('Submit');
                        $('#submitbtn').attr("disabled", false);
                        $('#submitbtn').css({ "border-radius": "4px" });
                    }, 50000);
                }
            });
        }
    });
});


function checkusername() {
    var pattern = /^[A-Za-z0-9]+$/;
    var user = $('#username').val();
    console.log(user)
    var validuser = pattern.test(user);
    if (user == "") {
        $('#username_error').html('username cannot be empty');
        return false;
    }
    else if (!validuser) {
        $('#username_error').html('username must be between  a-z or A-Z only');
        return false;
    } else {
        $('#username_error').html('');
        return true;
    }
}


function checkemail() {
    var pattern1 = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    var email = $('#email').val();
    console.log(email)
    var validemail = pattern1.test(email);
    if (email == "") {
        $('#email_error').html('email cannot be empty');
        return false;
    } else if (!validemail) {
        $('#email_error').html('invalid email');
        return false;
    } else {
        $('#email_error').html('');
        return true;
    }
}

function checkpass() {
    var pattern2 = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    var pass = $('#pass').val();
    console.log(pass)
    var validpass = pattern2.test(pass);
    if (pass == "") {
        $('#pass_error').html('password can not be empty');
        return false;
    } else if (!validpass) {
        $('#pass_error').html('Minimum 5 and upto 15 characters, at least one uppercase letter, one lowercase letter, one number and one special character:');
        return false;

    } else {
        $('#pass_error').html("");
        return true;
    }
}