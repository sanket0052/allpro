<?php include 'api/db_config.php';// Include database config file  ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>User Management</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/dashboard.css" rel="stylesheet">
        <link href="css/new.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries 
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.2.8/jquery.form-validator.min.js"></script>
        <script src="js/fileupload.js"></script>
        <script src="js/validate.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="dashboard.php">User Management</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse"><!-- Navigation Menu Start -->
                    <ul class="nav navbar-nav navbar-right">
                        <?php if(isset($_SESSION['user_name']) && isset($_SESSION['user_id'])){ ?>
                            <li><a href="dashboard.php">Dashboard</a></li>           
                            <li><a href="profile.php">Profile</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        <?php }else{ ?>
                            <li><a href="sign_up.php">Sign Up</a></li>
                            <li><a href="sign_in.php">Sign In</a></li>
                        <?php } ?>
                        </ul>
                </div><!-- Navigation Menu End -->
            </div>
        </nav><br/>
        <div class="container-fluid"><!-- container-fluid -->
            <div class="row"><!-- row -->
            <?php if(isset($_SESSION['user_name']) && isset($_SESSION['user_id'])){
                //fetch the detail of current login user.
                $query="SELECT * FROM `registration` WHERE `id`='".$_SESSION['user_id']."'";
                $result = $con->query($query);
                $row = $result->fetch_assoc();
            ?>
                <div class="col-sm-3 col-md-2 sidebar"><!-- left sidebar start -->
                    <div class="col-xs-12 col-sm-12 placeholder" style="text-align:center;">
                        <?php $image_path = $row['profile_pic']; ?>
                        <!-- profile image of login user -->
                        <img src="user_profile_pic/<?= $image_path ?>" width="200" height="200" class="img-responsive" alt="Profile Picture">
                        <!-- user name -->
                        <h4><?php echo $row['user_name']; ?></h4>
                        <!-- full name -->
                        <span class="text-muted"><?php echo $row['first_name']." ".$row['last_name']; ?></span>
                    </div>
                </div><!-- left sidebar end-->
            <?php } ?>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">