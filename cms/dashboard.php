<?php  
require '../config/init.php';
$title = "Dashboard || Admin, News 1200";
require 'inc/checklogin.php';
require 'inc/header.php'; ?>
    <div id="wrapper">
        <?php require 'inc/navbar.php';?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <?php flash();?>
                        <h1 class="page-header">Welcome to Dashboard </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require 'inc/footer.php';?>