<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>




<script src="https://www.google.com/recaptcha/api.js"></script>
<script>
$recaptcha = $_POST['g-recaptcha-response'];
$res = reCaptcha($recaptcha);
if($res['success']){
  // Send email
}else{
  // Error
} 
function reCaptcha($recaptcha){
  $secret = "6LfjbkMgAAAAAAcL0eM778zYsK7-_tg32m2Tqi0    g";
  $ip = $_SERVER['REMOTE_ADDR'];

  $postvars = array("secret"=>$secret, "response"=>$recaptcha, "remoteip"=>$ip);
  $url = "https://www.google.com/recaptcha/api/siteverify";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_TIMEOUT, 10);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
  $data = curl_exec($ch);
  curl_close($ch);

  return json_decode($data, true);
}

</script>

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

// if (isset($_POST['submit']) && $_POST['g-recaptcha-response'] != "") {
//     include "db_config.php";
//     $secret = 'secret key';
//     $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
//     $responseData = json_decode($verifyResponse);
//     if ($responseData->success) {

//         //first validate then insert in db
//         // $name = $_POST['name'];
//         // $email = $_POST['email'];
//         // $pass = $_POST['password'];
//         // mysqli_query($conn, "INSERT INTO signup(name, email ,password) VALUES('" . $_POST['name'] . "', '" . $_POST['email'] . "', '" . md5($_POST['password']) . "')");
//         echo "Your registration has been successfully done!";
//     }
// }
// }


?>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Register</h3>
                    </div>
                    <div class="panel-body">
                        <?php ?>
                        <form role="form" method="post" action="process/login.php">
                            <fieldset>
                            <div class="form-group">
                            <div id="message"></div>
                                    <input class="form-control" placeholder="Username" name="username" id="username" type="username"  autofocus>
                                    <span class="error" id="username_error"> </span>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Email" id ="email" name="email" type="email" autofocus>
                                    <span class="error" id="email_error"> </span>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password"  id = "pass" name="pass" type="password" value="">
                                    <meter style="width:100%" title="strengthbar" id="meterbar" value="0" max="3" ></meter>
                                </span>
                                <span class="error" id="pass_error"> </span>
                                <!-- <div class="form-group  g-recaptcha" data-sitekey="site key"></div> -->
                                </div>
                                
                                <div class="form-group g-recaptcha brochure__form__captcha" data-sitekey="6LfjbkMgAAAAAAcL0eM778zYsK7-_tg32m2Tqi0g"></div>
                                <!-- Change this to a button or input when using this as a form -->

                                <button type="button" id="submitbtn" class="btn btn-lg btn-success btn-block">Register</button>

                                <!-- <a href="#" onclick="checkpass()" class="btn btn-lg btn-success btn-block">Register</a> -->
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="./validation.js"></script>
</body>
    


    <!-- <script>
        function checkpass() {
          var pass =  document.getElementById('pass').value
        console.log(pass.length)
    
          if(pass.length<8){
              console.log("short")
              
          }else{
          console.log('long');
        
          }
        }
    </script> -->
    
<?php require 'inc/footer.php';?>