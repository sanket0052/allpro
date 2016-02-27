<?php
    include 'inc/header.php';// Include header part file
    if(!isset($_SESSION['user_name']) && !isset($_SESSION['user_id'])){
        header('Location:sign_in.php');
        exit; 
    }
    if($_SESSION['user_name']!='admin'){
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
        //echo '<pre>';
        // print_r($_POST);
        // print_r($_FILES);       

        if($email!=""){
            if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                $error['email']='Email is Not Valid.';
                $error_count++;
            }
                $query="SELECT * FROM `registration` WHERE `email`='".$email."' AND `id` <>".$_POST['id'];
                $result=$con->query($query);
                if ($result->num_rows > 0){
                    $error['email']='Email Already Register.';
                    $error_count++; 
                }
        }else{
            $error['email']='Email Should not be Blank.';
            $error_count++;
        }

        if($first_name!=""){
            if(!preg_match('/^[a-zA-Z ]*$/',$first_name)){
                $error['fname']='First Name is not Valid.';
                $error_count++;
            }
        }else{
            $error['fname']='First Name Should not be Blank.';
            $error_count++;
        }
        
        if($last_name!=""){
            if(!preg_match('/^[a-zA-Z ]*$/',$last_name)){ 
                $error['lname']='Last Name is not Valid.';
                $error_count++;
            }
        }else{
            $error['lname']='Last Name Should not be Blank.';
            $error_count++;
        }
    
        if($user_name!=""){
            if(!preg_match('/^[a-zA-Z0-9@_]*$/',$user_name)){
                $error['user_name']='User Name is not Valid.';
                $error_count++;
            }
            $query="SELECT * FROM `registration` WHERE `user_name`='".$user_name."' AND `id` <>".$_POST['id'];
            $result=$con->query($query);
            if ($result->num_rows > 0){
                $error['user_name']='User Name Already Use By Another.';
                $error_count++;   
            }
        }else{
            $error['user_name']='User Name Should Not be Blank.';
            $error_count++;   
        }

        if($password=="") {
            $error['password']='Password Should Not be Blank.';
            $error_count++;   
        }else{
            $new_pass=md5($password);
        }

        if($_FILES["profile_pic"]["error"] > 0){
            $new_file_name='';
        }else{
            $validextensions = array("jpeg", "jpg", "png");
            $temporary = explode(".", $_FILES["profile_pic"]["name"]);
            $file_extension = end($temporary);

            if ((($_FILES["profile_pic"]["type"] == "image/png") || ($_FILES["profile_pic"]["type"] == "image/jpg") || ($_FILES["profile_pic"]["type"] == "image/jpeg")) && ($_FILES["profile_pic"]["size"] < 100000)//Approx. 100kb files can be uploaded.
                && in_array($file_extension, $validextensions)) {

                $new_file_name=strtotime("now")."_".$_FILES["profile_pic"]["name"];
                $path='user_profile_pic/';        

            } else {
                $error['file']='Please select .jpg, .png, .jpeg file extension.';
                $error_count++;
            }
        }

        if($error_count==0){

            if($new_file_name!=''){

                //Get the old image name and remove that from the directory
                $query="SELECT * FROM `registration` WHERE `id`='".$_POST['id']."'";
                $result = $con->query($query);
                $newarr = $result->fetch_assoc();
                $old_file = $newarr['profile_pic'];
                
                if($old_file != ''){//Delete the old file if the file is exist
                    $old_path = $path.$old_file;
                    unlink($old_path);    
                }

                $new_path = $path.$new_file_name;//Define the path
                move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $new_path);//Upload the image 
            }

            $query = "UPDATE `registration` SET `first_name`='".$first_name."',`last_name`='".$last_name."',`user_name`='".$user_name."',`email`='".$email."',`password`='".$new_pass."'";
          
            if($new_file_name!=''){
                //Update query if profile picture upload 
                $query .= ",`profile_pic`='".$new_file_name."'";
            }
                $query .= " WHERE `id`=".$_POST['id'];

            if ($con->query($query)) {
                header('Location:dashboard.php?msg=update_success');
            } else {
                header('Location:edit_user.php?msg=update_error&id='.$_POST['id']); 
            }
        }
    }

    if(isset($_GET) && !empty($_GET)){
        if(!isset($_GET['id']) || $_GET['id']=='' || $_SESSION['user_name']!='admin'){
            header('Location:dashboard.php?msg=error');
        }else{  
            $query="SELECT * FROM `registration` WHERE `id`=".$_GET['id'];
            $result = $con->query($query);
            if ($result->num_rows > 0) {
                $arr1=$result->fetch_assoc();
            }else{
                header('Location:dashboard.php?msg=error');
            }
        }
    }
?>

<!-- Start Content -->
<h1 class="page-header"><?php echo $arr1['user_name']; ?> Profile</h1><!-- profile name -->

<?php if($_GET['msg']=='update_success' || $_GET['msg']=='delete_success'){ ?>        
    <div class="row"><!-- row -->
        <div class="col-md-12"><!-- column -->
            <label class="form-control alert-success" id="">Done Successfully.</label>
        </div><!-- /column -->
    </div><!-- /row --><br/>
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

<form method="post" action="edit_user.php?id=<?php echo $_GET['id']; ?>" id="edit_user_profile" name="edit_user_profile" enctype="multipart/form-data"><!-- profile edit form start -->
    <div class="row"><!-- row -->

        <div class="col-md-3" style="text-align:center;"><!-- column -->

            <div class="col-xs-12 col-sm-12 placeholder"><!-- sub-column start -->
                <?php $image_path = $arr1['profile_pic']; ?><!-- profile image -->
                <img src="user_profile_pic/<?= $image_path ?>" width="200" height="200" class="img-responsive" alt="Profile Picture">
            </div><!-- sub-column end -->

            <div class="col-md-12"><!-- sub-column start -->
                <label for="inputFile">Profile Picture</label>
                    <div class="fileupload fileupload-new" data-provides="fileupload"><!-- File Upload div start -->
                        <span class="btn btn-primary btn-file"><span class="fileupload-new">Select Another Image</span>
                        <span class="fileupload-exists">Change</span><input type="file" data-validation="mime size" data-validation-allowing="jpg, png, gif" data-validation-max-size="2M" id="inputFile" name="profile_pic" /></span>
                        <span class="fileupload-preview"></span>
                        <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
                    </div><!-- File Upload div end -->
            </div><!-- sub-column end -->

        </div><!-- /Column -->
        <div class="col-md-6"><!-- column -->

            <div class="col-md-12"> <!-- sub-column-start -->
                <label for="inputEmail">Email address</label>
                <input type="text" name="email" id="inputEmail" data-validation="email" data-validation-error-msg="You did not enter a valid e-mail" value="<?php echo $arr1['email']; ?>" class="form-control" placeholder="Email Address" autofocus>                   
            </div><!-- sub-column-end -->

            <div class="col-md-6"><!-- sub-column-start --> <br/>
                <label for="inputFirstName">First Name</label>
                <input type="text" name="first_name" id="inputFirstName" data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$" value="<?php echo $arr1['first_name']; ?>" class="form-control" placeholder="First Name" >
            </div><!-- sub-column-end -->

            <div class="col-md-6"><!-- sub-column-start --><br/>
                <label for="inputLastName">Last Name</label>
                <input type="text" name="last_name" id="inputLastName" data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$" value="<?php echo $arr1['last_name']; ?>" class="form-control" placeholder="Last Name" >
            </div><!-- sub-column-end -->

            <div class="col-md-12"><!-- sub-column-start --><br/>
                <label for="inputUser">User Name</label>
                <input type="text" name="user_name" id="inputUser" data-validation="custom" data-validation-regexp="^([a-zA-Z0-9]+)$" value="<?php echo $arr1['user_name']; ?>" class="form-control" placeholder="User Name">
            </div><!-- sub-column-end -->

            <div class="col-md-12"><!-- sub-column-start --><br/>
                <label for="inputPassword">Password</label>
                <input type="password" name="password" id="inputPassword"  data-validation="required" class="form-control" placeholder="Password" >
            </div><!-- sub-column-end -->

            <div class="col-md-12"><!-- sub-column-start --><br/>
                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"><!-- Hidden ID -->
                <input class="btn btn-lg btn-primary btn-block" type="submit" value="Update Profile"><!-- Submit Button -->
            </div><!-- sub-column-end -->

        </div><!-- /Column -->

    </div><!-- row end--><br/>

</form><!-- profile edit form start -->
<!-- End Content -->
<script src="js/edit_user.js"></script>
    
<?php include 'inc/footer.php';// Include footer part file  ?>