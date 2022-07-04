<script  src="./assets/js/jquery.min.js"></script>
<?php  
require '../config/init.php';
$title = "Dashboard || Admin, News 1200";
require 'inc/checklogin.php';
require 'inc/header.php'; 
?>
<body>
    <div id="wrapper">

        <?php require 'inc/navbar.php';?>
       
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-13">
                        <?php flash();?>
                        <h1 class="page-header">Change Password </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            <form id="Form" method="post" action="process/forgetpassword1.php" >
                <div class="row">
                    <div class="col-12">

                                <div class="form-group row ">
                                 <label for="" class="col-sm-3"> Current Password </label>
                                      <div  class="col-sm-9">
                                         <input  class="form-control" type="password" name="currentpass" id="currentpass"  placeholder ="Your current password">
                                     </div>
                                </div>


                            <div class="form-group row">
                                <label for="" class="col-sm-3">New password: </label>
                                <div  class="col-sm-9">
                                <input  onkeyup=" " class="form-control" placeholder=" New Password"  id = "pass" name="pass"type="password" value="">
                                   <div style="text-align:right"> <input type="checkbox" onclick="myFunction()"> Show Password </div>
                                
                                        <div id="met">
                                            <meter style="width:80%" title="strengthbar" id="meterbar" value="0" max="3" ></meter>
                                             <span class ="form-group" id = "metertext"></span>
                                        </div> 
                                        <span class="error" id="pass_error"> </span>
                                    </div> 
                                    
                                </div>      
                              
                            </div>
                            <div class="form-group row ">
                            <label for="" class="col-sm-3"> Confirm New password: </label>
                                 <div  class="col-sm-9">
                                   <input  class="form-control" type="password" name="cpass" id="cpassword"  placeholder ="Confirm New  Password">
                                        <span class="error" id="cpassword_err"> </span>
                                        </div>
                                </div>
                            

                            <div class="form-group row">
                                <label for="" class="col-sm-3"></label>
                                <div class="col-sm-9">
                                    <button class="btn btn-success" type="submit">
                                        <i class="fa fa-paper-plane"></i> Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
</form>
            
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <script type="text/javascript" src="./validation.js"></script>
</body>
<script>
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

