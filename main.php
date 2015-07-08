<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header('location: index.php');
	}
	include 'header.php';
	include 'includes/sidebar.php';
?>



<div class='container'>

	<div id='ppmodal' class='modal fade' role='dialog'>
		<div class="modal-dialog">
			<div class='modal-content'>
				<div class='modal-header'>
					<h4 class='modal-title'>Modal Title</h4>
				</div>
				<div class='modal-body'>
					<img src='images/profilepics/1.jpg'>
				</div>
				<div class='modal-footer'>
					<button type='button' class='btn btn-primary' data-dismiss='modal'>Close</button>
				</div>
			</div>
		</div>
	</div>

	<div class='sd'></div>
	<br>
	<div class='col-md-4 text-center pro'>
		<div class='propic' data-toggle='modal' data-target='#ppmodal'><img src='images/profilepics/1.jpg'><br></div>
		<div class='prodet'>
			<h3><?php echo $_SESSION['username']; ?></h3>
		</div>
	</div>
	<div class='col-md-8 posts text-center'>
		
	</div>
</div>


<?php
	include 'footer.php';
?>