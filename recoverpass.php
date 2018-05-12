<?php include "db.php";?>
<?php
$error = '';
	if(isset($_GET['error'])){
		$error = $_GET['error'];
	}
	if(isset($_GET['submit'])){
		$email = mysqli_escape_string($con, $_GET['email']);
		if(empty($email)){
			$error .= "Email cannot be empty";
			header("Location: recoverpass.php?error=".$error);
		}else{
		$sql = "SELECT * FROM login WHERE email = '$email'";
		$query = mysqli_query($con, $sql);
		$row = mysqli_num_rows($query);
			if($row < 1){
			$error .= "Invalid email";
			header("Location: recoverpass.php?error=".$error);
			}else{
			$str = 'ysRmsOkbdnU569e122';
			$str = str_shuffle($str);
			$str = substr($str, 3, 5);
			$st = md5($str);
			$sql = "UPDATE login SET token='$st' WHERE email = '$email'";
			$query = mysqli_query($con, $sql);
			echo '<a href="recover.php?token='.$str.'&email='.$email.'"> Your token is '.$str.' click this link to change password</a>';

			}

		}
	}
	include_once "header.php";
?>

	<div class="container">
		<div class="wrap forms">
			<form method="get">
				<?=$error;?>
				<div class="form-group">
					<input type="email" name="email" placeholder="Email" class="form-control">
				</div>
				<button name="submit" class="btn btn-primary">Send</button>
			</form>
		</div>
	</div>						
<?php include_once "footer.php";?>