<?php 
    include 'inc/header.php';// Include header part file
    if(isset($_SESSION['user_name']) && isset($_SESSION['user_id'])){
        header('Location:dashboard.php');
    }

    // Check if form is submit 
    if(!empty($_POST)){
        // Store the input field password and username in local variable
        $user_name=$_POST['user_name'];
        $password=md5($_POST['password']);
        //check the username and password and status for sign in 
        $query="SELECT * FROM `registration` WHERE `user_name`='".$user_name."' and password='".$password."' and `status`=1";
        $result = $con->query($query);
        if ($result->num_rows > 0) {
            $arr = $result->fetch_assoc();
            //create session
            $_SESSION["user_name"]=$arr['user_name'];
            $_SESSION['user_id']=$arr['id'];
            //Redirect to dashboard page
            header('Location:dashboard.php');
        }else{
            header('Location:sign_in.php?msg=error');
        }
    }
?>

<!-- Start Content -->
<div class="container"><!-- container -->
    <?php if($_GET['msg']=='error'){ ?>
        <div class="row"><!-- row -->
            <div class="col-md-2"></div>
            <div class="col-md-6"><!-- Error Messeage Block Start -->
                <label class="form-control alert-danger" id="inputFirstName-error">Username & Password Does not match.</label>
            </div><!-- Error Messeage Block End -->
        </div><!-- /row -->
    <?php } ?>
    <div class="row"><!-- row -->
        <div class="col-md-2"></div>
        <div class="col-md-6"><!-- Column -->

            <!-- sign in form start -->
            <form class="user-signin" action="sign_in.php" method="post" id="user-signin">
                <h2 class="user-signin-heading">Please sign in</h2>
                <div class="col-md-12"><!-- column start --><br/>
                    <label for="inputUser">User Name</label><!-- user name label -->
                    <input type="text" id="inputUser" data-validation="custom" data-validation-regexp="^([a-zA-Z0-9]+)$" name="user_name" class="form-control" placeholder="User Name" autofocus><!-- username input -->
                </div>
                <div class="col-md-12"><!-- column start --><br/>
                    <label for="inputPassword">Password</label><!-- password label -->
                    <input type="password" id="inputPassword" data-validation="required" name="password" class="form-control" placeholder="Password" ><!-- password input -->
                </div>
                <div class="col-md-12"><!-- column start --><br/>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button><br/>
                    <a href="sign_up.php" class="btn btn-lg btn-default btn-block">Sign Up</a>
                </div>
            </form>
            <!-- sign in form end -->

        </div> <!-- /Column -->
    </div> <!-- /row -->
</div> <!-- /container -->
<!-- End Content -->
<script src="js/update_profile.js"></script>

<?php include 'inc/footer.php';// Include footer part file ?>    