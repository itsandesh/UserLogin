
<script  src="./assets/js/jquery.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
<?php  
require '../config/init.php';
$title = "Userlogin";
require 'inc/header.php'; 

if(isset($_SESSION, $_SESSION['token']) && !empty($_SESSION['token'])){
    redirect('dashboard.php','success', 'You are already logged in.');
}
if(isset($_COOKIE, $_COOKIE['_au']) && !empty($_COOKIE['_au'])){
    redirect('dashboard.php','success', 'Welcome back to admin panel.');
}
?>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Register</h3>
                    </div>
                    <div id="message"></div>
                    <div class="panel-body">
                        <?php flash();?>
                        <form id="myform" method="post" action="process/register1.php" >
                            <fieldset>
                            <div class="form-group">
                            <div id="message"></div>
                                    <input class="form-control" placeholder="Username" name="name" id="username" type="username" required autofocus>
                                    <span class="error" id="username_error"> </span>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Email" id ="email" name="email" type="email" required autofocus>
                                    <span class="error" id="email_error"> </span>
                                </div>
                                <form>
                                <div class="form-group">
                                    <input type="checkbox" onclick="myFunction()">Show Password
                                    <div class="form-group">
                                    <input  onkeyup=" " class="form-control" placeholder="Password"  id = "pass" name="pass" required type="password" value="">
                                        </div>

                                        <!-- Password Strength Bar -->

                                    <div id="met">
                                        <meter style="width:80%" title="strengthbar" id="meterbar" value="0" max="3" ></meter>
                                        <span class ="form-group" id = "metertext"></span>
                                    </div>
                                <span class="error" id="pass_error"> </span>
                                    <div class="form-group">
                                   <input  class="form-control" type="password" name="cpass" id="cpassword" required  placeholder ="confirm Password">
                                        <span class="error" id="cpassword_err"> </span>
                                    </div>

                                     <!-- Used recaptcha V2 -->

                                <div class="g-recaptcha" id="divCaptcha"></div></br>
                                <input type="hidden" name="recaptcha" id="txtCaptcha">
                                <div><button type="submit" id="asubmitbtn" class="btn btn-lg btn-success btn-block">Register</button></div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="./validation.js"></script>
</body>
<script>

    // Recaptcha Function 

var onloadCallback = function () {
    grecaptcha.render('divCaptcha', {
        'sitekey': '6LfjbkMgAAAAAAcL0eM778zYsK7-_tg32m2Tqi0g',
        'callback': function (response) {
            console.log('ASD')
            $('#txtCaptcha').val(window.grecaptcha.getResponse());
        }
    })
}

 // Show Password 
 
function myFunction() {
  var x = document.getElementById("pass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

</script>       
<?php require 'inc/footer.php';?>