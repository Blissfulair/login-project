<?php include "db.php";?>
<?php
$error = '';
	if(isset($_GET['error'])){
		$error = $_GET['error'];
	}
?>
<?php include_once "header.php";?>
	<div class="container">
		<div class="forms wrap">
			<form method="post" action="signup.php" id='signup' class="signup">
			<p>Already a member? <a href="#" class="login">click</a>  to login</p>
				<?=$error;?>
				<div class="form-group">
					<input type="text" name="username" placeholder="Username" class="form-control">
				</div>
				<div class="form-group">
					<input type="email" name="email" placeholder="Email" class="form-control">
				</div>
				<div class="form-group">
					<input type="password" name="password" placeholder="Password" class="form-control">
				</div>
				<button name="submit" class="btn btn-primary">Sign Up</button>
			</form>
			<form method="post" action="login.php" id='login' class="hide">
				<p>Are you new?<a href="#" class="login">click</a>  to sign up</p>
				<?=$error;?>
				<div class="form-group">
					<input type="text" name="username" placeholder="Username" class="form-control">
				</div>
				<div class="form-group">
					<input type="password" name="password" placeholder="Password" class="form-control">
				</div>
				<button name="submit" class="btn btn-primary">Login</button>
				<p><a href="recoverpass.php">Password recovery</a></p>
			</form>
		</div>
	</div>
<script type="text/javascript" src="script.js"></script>						
<?php include_once "header.php";?>