<!-- Navigation -->



<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <!-- <a class="navbar-brand" href="#"> Navbar</a> -->
    <!-- /.navbar-header -->
    <ul class="nav navbar-top-links navbar-left">

        <a  class="navbar-brand" style="color:darkblue" href ="./dashboard.php">
          
         Dashboard
     
        </a>
    </ul>

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <?php echo($_SESSION['name']) ?><i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li>
                    <a href="./forgetpassword.php">
                        <i class="fa fa-sign-out fa-fw"></i> Change Password 
                    </a>
                    <a href="logout.php">
                        <i class="fa fa-sign-out fa-fw"></i> Logout
                    </a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    </div>
    <!-- /.navbar-static-side -->
</nav>