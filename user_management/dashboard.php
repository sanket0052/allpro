<?php
    include 'inc/header.php';// Include header part file
    // Check that session is created or not
    if(!isset($_SESSION['user_name']) && !isset($_SESSION['user_id'])){
        // If user is not login than it will move to sign_in page
        header('Location:sign_in.php');
        exit;
    }

    if(!empty($_GET['id']) && isset($_GET['id']) && !isset($_GET['msg'])){        
        
        if($_GET['id']=='' || $_GET['status']=='' || $_SESSION['user_name']!='admin'){
            header('Location:dashboard.php');
        }else{
            //Update the user status
            $query="UPDATE `registration` SET `status`='".$_GET['status']."' WHERE `id`='".$_GET['id']."'";
            //echo $query;
            $result=$con->query($query);
            //echo $result;exit;
            if ($result!=0) {
                header('Location:dashboard.php?msg=update_success');
            } else {
                header('Location:dashboard.php?msg=update_error'); 
            }
        }

        if(($_GET['id']=='' || $_GET['type']=='') && $_SESSION['user_name']!='admin'){
            header('Location:dashboard.php');
        }else{
            if($_GET['type']=='delete'){
                //Delete Record 
                $query="SELECT * FROM `registration` WHERE `id`='".$_GET['id']."'";
                $result = $con->query($query);
                $row = $result->fetch_assoc();
                $old_file=$row['profile_pic'];

                if($old_file != ''){//Delete the old file if the file is exist
                    $path='user_profile_pic/'.$old_file;
                    //Remove the image 
                    unlink($path);
                }
                 
                //Delete the record 
                $query="DELETE FROM `registration` WHERE `id`=".$_GET['id'];

                if ($con->query($query) === TRUE) {
                    header('Location:dashboard.php?msg=delete_success');
                } else {
                    header('Location:dashboard.php?msg=delete_error'); 
                }       
            }
        }
    }
?>

<!-- Start Content -->
<h1 class="page-header">Dashboard</h1><!-- heading -->
<?php   //admin user can see the register user list
    if($_SESSION['user_name']=='admin' && $_SESSION['user_id']==2){
        //fetch the detail of registred user.
        $query="SELECT * FROM `registration` WHERE `id` <> ".$_SESSION['user_id'];
        $result = $con->query($query);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                //store data in $arr 
                $arr1[]=$row;
            }
        } 
    ?>
    <h2 class="sub-header">Register User</h2><!-- sub header -->
    <?php if($_GET['msg']=='update_success' || $_GET['msg']=='delete_success'){ ?>
    
        <div class="row"><!-- row -->
            <div class="col-md-12"><!-- column -->
                <label class="form-control alert-success" id="">Done Successfully.</label>
            </div><!-- /column -->
        </div><!-- /row --><br/>

    <?php }else if($_GET['msg']=='update_error' || $_GET['msg']=='error' || $_GET['msg' ]=='delete_error'){ ?>
    
        <div class="row"><!-- row -->
            <div class="col-md-12"><!-- column -->
                <label class="form-control alert-danger" id="">You have got error. Please try again.</label>
            </div><!-- /column -->
        </div><!-- /row --><br/>
    
    <?php } ?>

    <div class="table-responsive"><!-- table div start -->
        <table class="table table-striped"><!-- table tag start -->
            <thead><!-- table title start -->
                <tr>
                    <th>No.</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead><!-- table title end -->
            <tbody><!-- table body start -->
            <?php 
                $count=1;
                foreach ($arr1 as $key => $value) { ?>
                    <tr id="Row<?php echo $value['id'] ?>"><!-- start tr -->
                        <td><?php echo $count; ?></td>
                        <td><?php echo $value['first_name']; ?></td><!-- dispaly first name -->
                        <td><?php echo $value['last_name']; ?></td><!-- dispaly last name -->
                        <td><?php echo $value['user_name']; ?></td><!-- dispaly user name -->
                        <td><?php echo $value['email']; ?></td><!-- dispaly email -->
                        <td><!-- action td start -->
                            <?php if($value['status']==1){ ?>
                                <a href="dashboard.php?id=<?= $value['id'] ?>&status=0" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-eye-close text-danger" aria-hidden="true"></span></a>
                            <?php }else{ ?>
                                <a href="dashboard.php?id=<?= $value['id'] ?>&status=1" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-eye-open text-success" aria-hidden="true"></span></a>
                            <?php } ?>
                                <a href="edit_user.php?id=<?= $value['id'] ?>" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                <a href="dashboard.php?id=<?= $value['id'] ?>&type=delete" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span></a>
                        </td><!-- action td end -->
                    </tr><!-- end tr -->
            <?php $count++; } ?>
            </tbody><!-- table body end -->
        </table><!-- table tag end -->
    </div><!-- table div start -->
    <!-- End Content -->
<?php }
    include 'inc/footer.php';// Include footer part file
?>
