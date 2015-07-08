<?php
	session_start();
	require_once 'includes/config.php';
	require 'includes/functions.php';
	if(isset($_SESSION['username'])){
		header("location: main.php");
	}
	if(isset($_POST['username'])){
		$username = formdata($_POST['username']);
		$password = formdata($_POST['password']);
		$sql = "SELECT * FROM users WHERE username = '$username' and password = '$password';";
		$query = mysqli_query($connection,$sql);
		$validity = 0;
		if($query){
			$validity = mysqli_num_rows($query);	
			$result = mysqli_fetch_array($query);
		}
		if($validity == 0){
			echo "<script>alert('Invalid username password combination');</script>";
		}elseif($validity == 1){
			$sql1 = "SELECT * FROM connections WHERE username = '".$_POST['username']."';";
			$result1 = mysqli_fetch_array(mysqli_query($connection,$sql1));
			$_SESSION['uno'] = $result['user_no'];
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['fid'] = $result1['friends'];
			$_SESSION['requests'] = $result1['requests'];
			$_SESSION['sent_req'] = $result1['sent_req'];
			header("location: main.php");
		}
	}

?>

<?php include 'header.php'; ?>


<div class='sidebar text-center'>
	<h3>LegBook</h3>
	<hr>
	<a href='index.php'><div class='item'>Home</div></a>
	<a href='signup.php'><div class='item'>Register</div></a>
	<a href='blogs.php'><div class='item'>Read Blogs</div></a>
	<a href='contactus.php'><div class='item'>Contact Us</div></a>
</div>
<div class="container">
	<div class='sd'></div>
	<br>
	<div class='col-md-3'></div>
	<div class='col-md-6'>
		<div class='panel panel-primary'>
			<div class='panel-heading'>
				<h3>Login form</h3>
			</div>
			<div class='panel-body'>
				<form role='form' method='post' action='index.php'>
					<div class='form-group'>
						<label for='username'>Username</label>
						<input type='text' class='form-control' name='username' required>
					</div>
					<div class='form-group'>
						<label for='password'>Password</label>
						<input type='password' class='form-control' name='password' required>
					</div>
					<button class='btn btn-primary login'>Login</button>
				</form>
			</div>
		</div>
	</div>
	<div class='col-md-3'></div>
</div>


<?php include 'footer.php'; ?>