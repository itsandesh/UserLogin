

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

    $('#cpassword').on('input', function () {
        checkcpass();
    });


    $('#submitbtn').click(function () {

        // const form = document.getElementById("myform")
        // const formData = new FormData(form)

        if (!checkusername() && !checkemail() && !checkpass() && !checkcpass()) {
            console.log("er1");
            $("#message").html(
                `<div class=" alert alert-warning">Please fill all required field first</div>`);

        } else if (!checkusername() || !checkemail() || !checkpass() || !checkcpass()) {
            $("#message").html(`<div class="alert alert-warning">Please fill all required field</div>`);
            console.log("er");
        }
        else {

            var username = $('input[name=username]').val();
            var email = $('input[name=email]').val();
            var password = $('input[name=pass]').val();

            // const data = {
            //     username: formData.get('username'),
            //     email: formData.get('email'),
            //     password: formData.get('password')
            // }

            var formData = { name: username, email: email, password: password };
            console.log("in Submit");
            console.log(username);
            console.log(email);
            console.log(password);
            console.log(formData)
            $.ajax({
                url: "http://login-acs.san/cms/process/register1.php",
                type: 'POST',
                data: formData,
                dataType: "json",
                success: function (response) {
                    console.log(response)
                    $('#message').html('<span style="color: green">Form submitted successfully</span>');
                },
                error: function (response) {
                    console.log(response)
                    $('#message').html('<span style="color: red">Form not submitted. Some error in running the database query.</span>');
                }
            })
        }
    });
});


function checkusername() {
    var pattern = /^[A-Za-z0-9]+$/;
    var user = $('#username').val();
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
    var pattern3 = /^(?=.*[!@#$%^&*])/;
    var pattern4 = /^(?=.*[a-z])/;
    var pattern5 = /^(?=.*[A-Z])/;
    var pattern6 = /^(?=.*\d)/;
    var pass = $('#pass').val();
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

function checkcpass() {
    var pass = $('#pass').val();
    var cpass = $('#cpassword').val();
    if (cpass == "") {
        $('#cpassword_err').html('confirm password cannot be empty');
        return false;
    } else if (pass !== cpass) {
        $('#cpassword_err').html('confirm password did not match');
        return false;
    } else {
        $('#cpassword_err').html('');
        return true;
    }
}

function password_show_hide() {
    console.log('ok');
    var x = document.getElementById("pass");
    console.log(x);
    var show_eye = document.getElementById("show_eye");
    var hide_eye = document.getElementById("hide_eye");
    hide_eye.classList.remove("d-none");
    if (x.type === "password") {
        x.type = "text";
        show_eye.style.display = "none";
        hide_eye.style.display = "block";
    } else {
        x.type = "password";
        show_eye.style.display = "block";
        hide_eye.style.display = "none";
    }

}
