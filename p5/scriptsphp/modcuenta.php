<?php
	ini_set('display_errors', 1);
	include("../controllers/controllerUsers.php");

  session_start();

	$newnick = $_POST['nuevonick'];
	$newmail = $_POST['nuevomail'];
	$newpass = $_POST['nuevopass'];

	if(isset($newnick) && !empty($newnick)){
		cambiarNick($_SESSION['id_user'],$newnick);
	}

	if(isset($newmail)&& !empty($newmail)){
		cambiarMail($_SESSION['id_user'],$newmail);
	}

	if(isset($newpass)&& !empty($newpass)){
		cambiarPass($_SESSION['id_user'],$newpass);
	}



  header("Location: ../loginorsignup.php");
  exit();

?>
