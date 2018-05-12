<?php include "db.php";?>
<?php
$error = '';
	if(isset($_GET['token'])){
		$token = mysqli_escape_string($con, $_GET['token']);
		$email = mysqli_escape_string($con, $_GET['email']);

			$sql = "SELECT * FROM login WHERE email = '$email'";
			$query = mysqli_query($con, $sql);
			$rows = mysqli_fetch_assoc($query);
$token = md5($token);
echo $rows['id'];

	}
include_once "header.php";
?>
<div class="container">
<?php if($token != $rows['token']){
$error .= "Invalid token";
header("Location: recoverpass.php?error=".$error);
}else{
			if(isset($_POST['submit'])){
			$password = mysqli_escape_string($con, $_POST['password']);
			$salt = 'eng100271@@-';
			$password = md5($rows['id'].$password.$salt);
			$sql = "UPDATE login SET password='$password' WHERE email = '$email'";
			$query = mysqli_query($con, $sql);
			header("Location: index.php");
		}
?>	
	<div class="forms wrap">
		<form method="post">
			<div class="form-group">
				<input type="password" name="password" placeholder="Password" class="form-control">
			</div>
			<div class="form-group">
				<input type="password" name="password1" placeholder="Confirm Password" class="form-control">
			</div>
			<button name="submit" class="btn btn-primary">Change</button>
		</form>
	</div>
<?php }?>
	</div>						
<?php include_once "footer.php";?>