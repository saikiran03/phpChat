//javascript code



//jquery code

function sendreq(user){
	$.post('includes/sendrequest.php',{to_user : user},function(data,status){
		$(this).hide();
		alert(data);
	});
}

function acceptreq(user){
	$.post('includes/processreq.php',{to_user: user, task: 1},function(data,status){
		alert(data);
	});
}

function declinereq(user){
	$.post('includes/processreq.php',{to_user: user, task: 0},function(data,status){
		alert(data);
	});
}

$(document).ready(function(){
	$('#userdet').load('includes/userdet.php');
	$('.posts').load('includes/post.php');
	//$('#friends').load('includes/friends.php');
});

$(document).ready(function(){
	$('.sd').click(function(){
		if($('.sidebar').css('left')== '-180px'){
			$('.sidebar').css('left','0px');
			$('.container').css('left','200px');	
		}else{
			$('.sidebar').css('left','-180px');
			$('.container').css('left','0px');	
		}
		
	});
});



