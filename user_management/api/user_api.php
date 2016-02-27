<?php 
include 'db_config.php';
$id=$_GET['id'];
// echo '<pre>';
//To get already exist data
if(($id=='email' || $id=='first_name' || $id=='last_name' || $id=='user_name' || $id=='password') && $_GET['field']!=''){
	if(isset($_GET['extra'])){
		$query="SELECT * FROM `registration` WHERE ".$id."='".$_GET['field']."' AND `id` <>".$_GET['extra'];
	}else{
		$query="SELECT * FROM `registration` WHERE ".$id."='".$_GET['field']."'";
	}
	$result=$con->query($query);
	if ($result->num_rows > 0){
		echo 0;
	}else
		echo 1;
}
//Get user data from the id
if($id=='get_user' && $_GET['field']!=''){
	$query="SELECT * FROM `registration` WHERE `id`='".$_GET['field']."'";
	$result=$con->query($query);
	if ($result->num_rows > 0){
	  	while($row = $result->fetch_assoc()) {
	    	$arr=$row;
	    }
	  	//mysqli_free_result($result);
	}
	if(!empty($arr)){
		print_r(json_encode($arr));
	}else
		echo '';
}
//Get user data for sigin
if($id=='sign_in' && $_GET['user_name']!='' && $_GET['password']!=''){
	$user_name=$_GET['user_name'];
	$password=md5($_GET['password']);
	$query="SELECT * FROM `registration` WHERE `user_name`='".$user_name."' and password='".$password."'";
	$result=$con->query($query);
	if ($result->num_rows > 0){
	  	while($row = $result->fetch_assoc()) {
	    	$arr=$row;
	    }
	  	//mysqli_free_result($result);
	}
	if(!empty($arr)){
		print_r(json_encode($arr));
	}else
		echo '';
}
mysqli_close($con);

