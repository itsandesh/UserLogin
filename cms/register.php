<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
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


// Checking valid form is submitted or not
if (isset($_POST['submitbtn'])) {
      
    // Storing name in $name variable
    $name = $_POST['name'];
    
    // Storing google recaptcha response
    // in $recaptcha variable
    $recaptcha = $_POST['g-recaptcha-response'];
  
    // Put secret key here, which we get
    // from google console
    $secret_key = '6LcYGkkgAAAAAI1l12cKl6__FkKhtSzw3GMVX64O';
  
    // Hitting request to the URL, Google will
    // respond with success or error scenario
    $url = 'https://www.google.com/recaptcha/api/siteverify?secret='
          . $secret_key . '&response=' . $recaptcha;
  
    // Making request to verify captcha
    $response = file_get_contents($url);
  
    // Response return by google is in
    // JSON format, so we have to parse
    // that json
    $response = json_decode($response);
  
    // Checking, if response is true or not
    if ($response->success == true) {
        echo '<script>alert("Google reCAPTACHA verified")</script>';
    } else {
        echo '<script>alert("Error in Google reCAPTACHA")</script>';
    }
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
                                    <input  onkeyup=" " class="form-control" placeholder="Password"  id = "pass" name="pass" type="password" value="">
                                    <div id="met">
                                        <meter style="width:80%" title="strengthbar" id="meterbar" value="0" max="3" ></meter>
                                        <span class ="form-group" id = "metertext"></span>
                                    </div>
                                <span class="error" id="pass_error"> </span>
                                </div>
                                <div class="g-recaptcha" data-sitekey="6LfjbkMgAAAAAAcL0eM778zYsK7-_tg32m2Tqi0g"></div>
                                <!-- <div class="form-group g-recaptcha" data-sitekey=”6LcYGkkgAAAAAA00sBn96f3nYzrCvusQgmTNisc9”></div>  -->

                                <button type="button" id="submitbtn" class="btn btn-lg btn-success btn-block">Register</button>

                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="./validation.js"></script>
</body>
        
<?php require 'inc/footer.php';?>