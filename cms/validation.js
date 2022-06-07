

$(document).ready(function () {
    $('#met').hide();
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

    console.log(meterbar.value);
    var pattern2 = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    var pattern3 = /^(?=.*[!@#$%^&*])/;
    var pattern4 = /^(?=.*[a-z])/;
    var pattern5 = /^(?=.*[A-Z])/;
    var pattern6 = /^(?=.*\d)/;
    var pass = $('#pass').val();
    console.log(pass);
    var validpass = pattern2.test(pass);
    var validpattern1 = pattern3.test(pass);
    var validpattern2 = pattern4.test(pass);
    var validpattern3 = pattern5.test(pass);
    var validpattern4 = pattern6.test(pass);
    const div = document.getElementById('metertext');
    if (validpattern1 && validpattern2 && validpattern3 && validpattern4) {
        document.getElementById("meterbar").value = "3";
        div.textContent = 'strong';
        div.style.color = 'green';
        $('#met').show();
    } else if ((validpattern1 && validpattern2)
        || (validpattern1 && validpattern3) || (validpattern1 && validpattern4) || (validpattern2 && validpattern3) || (validpattern2 && validpattern4) || (validpattern3 && validpattern4)) {
        document.getElementById("meterbar").value = "2";
        div.textContent = 'medium';
        div.style.color = 'blue';
        $('#met').show();

    } else if ($('#pass').val().length > 0) {
        document.getElementById("meterbar").value = "1";

        div.textContent = 'weak';
        div.style.color = 'red';
        $('#met').show();
    }
    else {
        $('#met').hide();
    }

    if (pass == "") {
        $('#pass_error').html('password can not be empty');
        return false;
    } else if (!validpass) {
        $('#pass_error').html('*requires minimum 8 characters, uppercase, lowercase, number and symbol');
        return false;

    } else {
        $('#pass_error').html("");
        return true;
    }
}