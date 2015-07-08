<?php
  session_start();
  include 'config.php';
  include 'functions.php';
  if($_POST['msg']){
   $msg = $_POST['msg'];
   $msg = formdata($msg);
   $sql = "INSERT INTO messages (`to_user`,`from_user`,`message`) VALUES ('".$_POST['msgto']."','".$_SESSION['username']."','".$msg."');";
    $query = mysqli_query($connection,$sql);
    if($query){
     echo "message sent.";
    }else{
     echo "message sending failed";
    }
  }
?>