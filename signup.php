<?php
include "db.php";
$error = '';
if(isset($_POST['submit'])){
	$username = mysqli_escape_string($con, $_POST['username']);
	$email = mysqli_escape_string($con, $_POST['email']);
	$password = mysqli_escape_string($con, $_POST['password']);
	if(empty($username) || empty($password) || empty($email)){
		$error .= "<p>Input fields cannot be empty</p>";
		header("Location: index.php?error=".$error);
	}else{
		$sql = "SELECT * FROM login WHERE username = '$username'";
		$query = mysqli_query($con, $sql);
		$row = mysqli_num_rows($query);
		if($row > 0){
			$error .= "username already exists";
			header("Location: index.php?error=".$error);
		}else{
			$sql = "INSERT INTO login(username,email) VALUES('$username','$email')";
			$query = mysqli_query($con, $sql);
			$salt = 'eng100271@@-';
			$id = mysqli_insert_id($con);
			$password = md5($id.$password.$salt);
			$sql = "UPDATE login SET password ='$password' WHERE id='$id'";
			$query = mysqli_query($con, $sql);
			echo "Registration was successful, to continue <a href='home.php'>click here</a>";
		}
	}
}