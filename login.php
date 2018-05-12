<?php
include "db.php";
$error = '';
if(isset($_POST['submit'])){
	$username = mysqli_escape_string($con, $_POST['username']);
	$password = mysqli_escape_string($con, $_POST['password']);
	if(empty($username) || empty($password)){
		$error .= "<p>Input fields cannot be empty</p>";
		header("Location: index.php?error=".$error);
	}else{
		$sql = "SELECT * FROM login WHERE username = '$username'";
		$query = mysqli_query($con, $sql);
		$row = mysqli_num_rows($query);
		if($row < 0){
			$error .= "Invalid username or password";
			header("Location: index.php?error=".$error);
		}else{
			$sql = "SELECT * FROM login WHERE username = '$username'";
			$query = mysqli_query($con, $sql);
			$rows = mysqli_fetch_assoc($query);
			$salt = 'eng100271@@-';
			$password = md5($rows['id'].$password.$salt);
			//var_dump($rows);
			if($password != $rows['password']){
				$error .= "Invalid username or password";
				header("Location: index.php?error=".$error);
			}else{
				echo "You are login";
			}
			//echo "Registration was successful, to continue <a href='home.php'>click here</a>";
		}
	}
}