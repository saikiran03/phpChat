<?php
	session_start();
	include 'includes/config.php';
	include 'header.php';
	include 'includes/sidebar.php';
?>
<script type="text/javascript">
	var to_user = '';
</script>
<div class='container'>
	<div class='sd'></div>
	<div class='col-md-1'></div>
	<div class='col-md-10 alert alert-default chatbox' style='margin-top:5%;'>
		
		<form>
				<?php
					$sql = "SELECT username FROM users WHERE username != '".$_SESSION['username']."' LIMIT 35;";
					$query = mysqli_query($connection,$sql);
					echo "<div class='col-md-4 text-center users'>";
						if($query){
						while($result = mysqli_fetch_array($query)){
							echo "<div class='msgto' onclick='pstat=1'>";
							echo $result['username'];
							echo "</div>";
						}
					}else{
						echo "no active users";
					}
					echo "</div>";
				?><br>
				<div class='col-md-8 msgarea'>
					<div id='userhead' class='h2 bg-warning'></div>
					<div id='msgarea'></div><br>
					<textarea id='msg' autofocus></textarea>
				</div>
		</form>
	</div>
	<div class='col-md-1'></div>
</div>

<script>
$(document).ready(function(){
	loadmsg();
	$('#userhead').html('choose a user to chat');
	$('.msgto').click(function(){
		to_user = $(this).html();
		$('#userhead').html(to_user);
	});
	$("#msg").keydown(function(e){
		if(e.which == 13){
			e.preventDefault();
			if($("#msg").val() == ''){
				alert('please enter some message.');
			}else{
				sendmsg();
			}
		}
	});
});

function sendmsg(){
	$.post("includes/sendmsg.php",{msg: $("#msg").val(), msgto: to_user },function(data,status){
		$("#msg").val('');
	});
}

var pstat = 1;
function loadmsg(){
	if(pstat){
		$.post('includes/msg.php',{msgto: to_user},function(data,status){
			pstat = 0;	
		});
	}
	$("#msgarea").load("includes/msg.php",function(data,status){
		setTimeout(function(){ loadmsg(); }, 200);
	});
}

</script>
<?php
	include 'footer.php';
?>