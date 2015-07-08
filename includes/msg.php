<?php
  session_start();
  include 'config.php';
  include 'functions.php';
  $thi = formdata($_SESSION['username']);
  if(isset($_POST['msgto'])){
   $to = formdata($_POST['msgto']);
   $_SESSION['msgto'] = $to;
  }else{
    $to = formdata($_SESSION['msgto']);
  }
  $sql = "SELECT from_user,to_user,message FROM messages WHERE from_user = '$thi' and to_user = '$to' or from_user = '$to' and to_user = '$thi';";
   $query = mysqli_query($connection,$sql);
   if($query){
    while($result = mysqli_fetch_array($query)){
     if($thi == $result['to_user']){
      echo "<div class='recv'>".$result['from_user']." : ".$result['message']."</div>";
     }else{
      echo "<div class='sent'>".$result['from_user']." : ".$result['message']."</div>";
     }
    }
   }
?>