<?php
    include 'inc/header.php'; // Include header part file
    if(isset($_SESSION['user_name']) && isset($_SESSION['user_id'])){
        //check that session is created or not
        header('Location:dashboard.php');
        exit;
    }

    if(!empty($_POST)){
        $email=$_POST['email'];
        $first_name=$_POST['first_name'];
        $last_name=$_POST['last_name'];
        $user_name=$_POST['user_name'];
        $password=$_POST['password'];
        $error_count=0;
        $error=array();

        if($email!=""){// Check the email is blank or not
            if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                $error['email']='Email is Not Valid.';
                $error_count++;
            }
            // Check the email is already register or not
            $query="SELECT * FROM `registration` WHERE `email`='".$email."'";
            $result=$con->query($query);
            if ($result->num_rows > 0){
                $error['email']='Email Already Register.';
                $error_count++; 
            }
        }else{
            $error['email']='Email Should Not be Blank.';
            $error_count++;
        }

        if($first_name!=""){// Check the firstname is blank or not
            if(!preg_match('/^[a-zA-Z ]*$/',$first_name)){// Check the firstname is valid or not
                $error['fname']='First Name is Not Valid.';
                $error_count++;
            }
        }else{
            $error['fname']='First Name Should Not be Blank.';
            $error_count++;
        }
        
        if($last_name!=""){// Check the lastname is blank or not
            if(!preg_match('/^[a-zA-Z ]*$/',$last_name)){ // Check the lastname is valid or not
                $error['lname']='Last Name is Not Valid.';
                $error_count++;
            }
        }else{
            $error['lname']='Last Name Should Not be Blank.';
            $error_count++;
        }
          
        if($user_name!=""){// Check the username is blank or not
            if(!preg_match('/^[a-zA-Z0-9@_]*$/',$user_name)){// Check the username is valid or not
                $error['user_name']='User Name is Not Valid.';
                $error_count++;
            }
            // Check the username alresy register or not
            $query="SELECT * FROM `registration` WHERE `user_name`='".$user_name."'";
            $result=$con->query($query);
            if ($result->num_rows > 0){
                $error['user_name']='User Name Already Use By Another.';
                $error_count++;   
            }
        }else{
            $error['user_name']='User Name Should Not be Blank.';
            $error_count++;   
        }

        if($password=="") {// Check the email is blank or not
            $error['password']='Password Should Not be Blank.';
            $error_count++;   
        }else{
            // Convert password in md5
            $new_pass=md5($password);
        }

        if($_FILES["profile_pic"]["error"] > 0){
            $new_file_name='';
        }else{
            $validextensions = array("jpeg", "jpg", "png");
            $temporary = explode(".", $_FILES["profile_pic"]["name"]);
            $file_extension = end($temporary);
            
            if ((($_FILES["profile_pic"]["type"] == "image/png") || ($_FILES["profile_pic"]["type"] == "image/jpg") || ($_FILES["profile_pic"]["type"] == "image/jpeg")) && ($_FILES["profile_pic"]["size"] < 100000)//Approx. 100kb files can be uploaded.
                && in_array($file_extension, $validextensions)) {//checking the extension and file size

                $new_file_name=strtotime("now")."_".$_FILES["profile_pic"]["name"];
                $path='user_profile_pic/';
                
            } else {
                $error['file']['0']='You have to select .jpg, .png, .jpeg file.';
                $error_count++;
            }
        }

        if($error_count==0){

            if($new_file_name!=''){
                $new_path = $path.$new_file_name;
                move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $new_path);//Upload the image 
            }
            
            //Insert data in registration table
            $query="INSERT INTO `registration` (`first_name`,`last_name`,`user_name`,`email`,`password`,`profile_pic`) VALUES 
                ('".$first_name."','".$last_name."','".$user_name."','".$email."','".$new_pass."','".$new_file_name."')";
            if ($con->query($query) === TRUE) {

                //Get last inserted id
                $last_id = $con->insert_id;

                //Create session 
                $_SESSION['user_id']=$last_id;
                $_SESSION['user_name']=$user_name;

                header('Location:dashboard.php');
            }else {
                header('Location:sign_up.php?msg=error');
            }
        }
    }
?>

<!-- Start Content -->
<div class="container"><!-- container -->
    <div class="row"><!-- row -->
        <div class="col-md-9"><!-- col-md-9 -->
            <form method="post" action="sign_up.php" id="user_signup" name="user_signup" enctype="multipart/form-data"><!-- User Sign Up Form -->

                <h2 class="user-signup-heading">Sign Up Form</h2><!-- Heading -->

                <?php if(!empty($error)){ ?>
                    <div class="form-error alert alert-danger"><!-- error block start -->
                        <strong>Form submission failed!</strong>
                        <ul>
                            <?php foreach ($error as $key => $value) { ?>                        
                                <li><?php echo $value; ?></li>                    
                            <?php } ?>
                        </ul>
                    </div><!-- error block end -->
                <?php } ?>

                <div class="row"><!-- Row -->
                    <div class="col-md-12"><!-- col-md-12 --> 
                        <label for="inputEmail">Email Address</label><!-- Email address Label -->
                        <input type="text" name="email" id="inputEmail" data-validation="email" data-validation-error-msg="You did not enter a valid e-mail" class="form-control" placeholder="Email Address"  autofocus><!-- Email input field -->
                    </div>
                
                    <div class="col-md-6"><br/>
                        <label for="inputFirstName">First Name</label><!-- First Name Label -->
                        <input type="text" name="first_name" id="inputFirstName" data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$" class="form-control" placeholder="First Name"><!-- First Name input field -->
                    </div>

                    <div class="col-md-6"><br/>
                        <label for="inputLastName">Last Name</label><!-- Last Name Label -->
                        <input type="text" name="last_name" id="inputLastName" data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$" class="form-control" placeholder="Last Name"><!-- Last Name input field -->
                    </div>

                    <div class="col-md-6"><br/>
                        <label for="inputUser">User Name</label><!-- User Name Label -->
                        <input type="text" name="user_name" id="inputUser" data-validation="custom" data-validation-regexp="^([a-zA-Z0-9]+)$"  class="form-control" placeholder="User Name"><!-- User Name input field -->
                    </div>

                    <div class="col-md-6"><br/><!-- Label -->
                        <label for="inputPassword">Password</label>
                        <input type="password" name="password" id="inputPassword" data-validation="required" class="form-control" placeholder="Password" ><!-- Password input field -->
                    </div>
                    <div class="col-md-12"><br/>
                        <!-- File upload field -->
                        <label for="inputFile">Profile Picture</label>
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <span class="btn btn-primary btn-file"><span class="fileupload-new">Select file</span>
                            <span class="fileupload-exists">Change</span><input type="file" id="inputFile" data-validation="mime size" data-validation-allowing="jpg, png, gif" data-validation-max-size="2M" name="profile_pic" /></span>
                            <span class="fileupload-preview"></span>
                            <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
                        </div>
                    </div>
                </div>
                <div class="row"><!-- row -->
                    <div class="col-md-6">
                        <input class="btn btn-lg btn-primary btn-block" type="submit" value="Sign Up">
                    </div><!-- /column -->
                    <div class="col-md-6"><!-- column -->
                        <a href="sign_in.php" class="btn btn-lg btn-default btn-block">Sign In</a>
                    </div><!-- /column -->
                </div><!-- /row -->
            </form><!-- User Sign Up Form End -->
            <script src="js/sign_up.js"></script>
        </div>
    </div>
</div> <!-- /container -->
<!-- End Content -->
<?php include 'inc/footer.php';// Include footer part file ?>    
