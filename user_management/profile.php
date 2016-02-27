<?php
    include 'inc/header.php';// Include header part file
    if(!isset($_SESSION['user_name']) && !isset($_SESSION['user_id'])){
        //check that session is created or not
        header('Location:sign_in.php');
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
            if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {// Check the email is valid or not
                $error['email']='Email is Not Valid.';
                $error_count++;
            }
            // Check the email is already register or not
            $query="SELECT * FROM `registration` WHERE `email`='".$email."' AND `id` <>".$_SESSION['user_id'];
            $result=$con->query($query);
            if ($result->num_rows > 0){
                $error['email']='Email Already Register.';
                $error_count++; 
            }
        }else{
            $error['email']='Email Should not be Blank.';
            $error_count++;
        }

        if($first_name!=""){// Check the firstname is blank or not
            if(!preg_match('/^[a-zA-Z ]*$/',$first_name)){// Check the firstname is valid or not
                $error['fname']='First Name is not Valid.';
                $error_count++;
            }
        }else{
            $error['fname']='First Name Should not be Blank.';
            $error_count++;
        }
    
        if($last_name!=""){// Check the lastname is blank or not
            if(!preg_match('/^[a-zA-Z ]*$/',$last_name)){ // Check the lastname is valid or not
                $error['lname']='Last Name is not Valid.';
                $error_count++;
            }
        }else{
            $error['lname']='Last Name Should not be Blank.';
            $error_count++;
        }
    
        if($user_name!=""){// Check the username is blank or not
            if(!preg_match('/^[a-zA-Z0-9@_]*$/',$user_name)){ // Check the username is valid or not
                $error['user_name']='User Name is not Valid.';
                $error_count++;
            }
            // Check the username alresy register or not
            $query="SELECT * FROM `registration` WHERE `user_name`='".$user_name."' AND `id` <>".$_SESSION['user_id'];
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


        if($_FILES["profile_pic"]["error"] > 0){// Check the file has error or not
            $new_file_name='';
        }else{
            
            $validextensions = array("jpeg", "jpg", "png");
            $temporary = explode(".", $_FILES["profile_pic"]["name"]);
            $file_extension = end($temporary);
            
            if ((($_FILES["profile_pic"]["type"] == "image/png") || ($_FILES["profile_pic"]["type"] == "image/jpg") || ($_FILES["profile_pic"]["type"] == "image/jpeg")) && ($_FILES["profile_pic"]["size"] < 100000)//Approx. 100kb files can be uploaded.
                && in_array($file_extension, $validextensions)) {//checking the extension and file size

                $new_file_name=strtotime("now")."_".$_FILES["profile_pic"]["name"];
                $path='user_profile_pic/';//Directory Name
                
            } else {
                $error['file']='You have to select .jpg, .png, .jpeg file.';
                $error_count++;   
            }
        }
    
        if($error_count==0){
        
            if($new_file_name!=''){
                //Get the pld image name and remove that from the directory
                $query = "SELECT * FROM `registration` WHERE `id`='".$_SESSION['user_id']."'";
                $result = $con->query($query);
                $newarr = $result->fetch_assoc();

                $old_file = $newarr['profile_pic'];//Store the profile picture name

                if($old_file != ''){//Delete the old file if the file is exist
                    $old_path = $path.$old_file;
                    unlink($old_path);    
                }

                $new_path = $path.$new_file_name;//Define the path
                move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $new_path);//Upload the image 
            }

            $query="UPDATE `registration` SET `first_name`='".$first_name."',`last_name`='".$last_name."',`user_name`='".$user_name."',`email`='".$email."',`password`='".$new_pass."'";

            if($new_file_name!=''){
                //Update query if profile picture upload 
                $query .= ",`profile_pic`='".$new_file_name."'";
            }

            $query.=" WHERE `id`=".$_SESSION['user_id'];
            
            if ($con->query($query)) {
                
                header('Location:profile.php?msg=update_success');
            } else {
                
                header('Location:profile.php?msg=update_error'); 
            }
        }
    }
?>

<!-- Start Content -->
<h1 class="page-header">Profile</h1><!-- Heading -->

<form method="post" action="profile.php" id="user_profile" name="user_profile" enctype="multipart/form-data"><!-- profile update form start -->
    <?php if($_GET['msg']=='update_success'){ ?>
        <div class="row"><!-- success block start -->
            <div class="col-md-12"> 
                <label class="form-control alert-success" id="">Update Successfully.</label>
            </div>
        </div><!-- success block end --><br/>
    <?php }else if($_GET['msg']=='update_error' || $_GET['msg']=='error'){ ?>
        <div class="row"><!-- error block start -->
            <div class="col-md-12"> 
                <label class="form-control alert-danger" id="">You Have got error while updating.</label>
            </div>
        </div><!-- error block end --><br/>
    <?php } if(!empty($error)){ ?>
        <div class="row"><!-- error block start -->
            <div class="col-md-12"> 
                <?php foreach ($error as $key => $value) { ?>                        
                    <label class="form-control alert-danger" id=""><?php echo $value; ?></label>                    
                <?php } ?>
            </div>
        </div><!-- error block end -->
    <?php } ?>
    <div class="row"><!-- row -->

        <div class="col-md-12"><!-- column start --><br/> 
            <label for="inputEmail">Email address</label>
            <input type="text" name="email" id="inputEmail" data-validation="email" data-validation-error-msg="You did not enter a valid e-mail" value="<?php echo $row['email']; ?>" class="form-control" placeholder="Email Address" autofocus>
        </div><!-- column end -->

        <div class="col-md-6"><!-- column start --><br/>
            <label for="inputFirstName">First Name</label>
            <input type="text" name="first_name" id="inputFirstName" data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$" value="<?php echo $row['first_name']; ?>" class="form-control" placeholder="First Name" >
        </div><!-- column end -->

        <div class="col-md-6"><!-- column start --><br/>
            <label for="inputLastName">Last Name</label>
            <input type="text" name="last_name" id="inputLastName" data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$" value="<?php echo $row['last_name']; ?>" class="form-control" placeholder="Last Name" >
        </div><!-- column end -->

        <div class="col-md-6"><!-- column start --><br/>
            <label for="inputUser">User Name</label>
            <input type="text" name="user_name" id="inputUser" data-validation="custom" data-validation-regexp="^([a-zA-Z0-9]+)$" value="<?php echo $row['user_name']; ?>" class="form-control" placeholder="User Name">
        </div><!-- column end -->

        <div class="col-md-6"><!-- column start --><br/>
            <label for="inputPassword">Password</label>
            <input type="password" name="password" id="inputPassword" class="form-control" data-validation="required" placeholder="Password" >
        </div><!-- column end -->

    </div><!-- /row --><br/>

    <div class="row"><!-- row -->
        <div class="col-md-6" style="text-align:center;"><!-- column start -->

            <label for="inputFile">Profile Picture</label>
            <div class="fileupload fileupload-new" data-provides="fileupload"><!-- start file upload block -->
                <span class="btn btn-primary btn-file"><span class="fileupload-new">Select file</span>
                <span class="fileupload-exists">Change</span><input type="file" data-validation="mime size" data-validation-allowing="jpg, png, gif" data-validation-max-size="2M" id="inputFile" name="profile_pic" /></span>
                <span class="fileupload-preview"></span>
                <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
            </div><!-- end file upload block -->

        </div><!-- column end -->
        <div class="col-md-6"><!-- column start --><br/>

            <input class="btn btn-lg btn-primary btn-block" type="submit" value="Update Profile"><!-- Submit Button -->

        </div><!-- column end -->
    </div><!-- end row -->

</form><!-- profile update form end -->
<!-- End Content -->
<script src="js/update_profile.js"></script>

<?php include 'inc/footer.php';// Include footer part file ?>