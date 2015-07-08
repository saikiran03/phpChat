<?php
	session_start();
	require 'includes/config.php';
	if(isset($_POST['username'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$sql = "SELECT username FROM users WHERE username = '$username' and password = '$password';";
		$query = mysqli_query($connection,$sql);
		if(mysqli_num_rows($query) == 0){
			$sql = "INSERT INTO users (`username`,`password`) VALUES ('$username','$password'); INSERT INTO connections (`username`) VALUES ('$username');";
			echo $sql;
			$query = mysqli_multi_query($connection,$sql);
			if($query){
				echo "<script>alert('Congrats! You have been registered');</script>";
				header('location: index.php');
			}
		}else{
			echo "<script>alert('user already exists');</script>";
			$_SESSION['username'] = $username;
			header('location: main.php');
		}
	}
	include 'header.php';
?>

<div class='container'>
	<div class='col-md-3'></div>
	<div class='col-md-6'>
		<div class='panel panel-primary'>
			<div class='panel-heading'>
				<h3>Register</h3>
			</div>
			<div class='panel-body'>
				<form role='form' method='post' action='signup.php'>
					<div class='form-group'>
						<label for='username'>Username:</label>
						<input class='form-control' type='username' name='username' required>
					</div>
					<div class='form-group'>
						<label for='password'>Password:</label>
						<input class='form-control' type='password' name='password' required>
					</div>
					<button class='btn btn-primary' type='submit'>Sign up</button>
				</form>
			</div>
		</div>
	</div>
	<div class='col-md-3'></div>
</div><!--end of container-->

<?php
	include 'footer.php';
?>