<?php
	ini_set('display_errors', 1);
	require("../controllers/controller.php");
	require("../controllers/controllerUsers.php");
	require("../controllers/controllerComments.php");

	session_start();

	if(isset($_GET['ev'])) {
		$idEv = $_GET['ev'];

		if(isset($_SESSION['id_user'])) {
			$user = getUser($_SESSION['id_user']);
			$nick = $user['nick'];

			if($_SERVER['REQUEST_METHOD'] === 'POST') {
				comentar($idEv, $nick, $_POST['comm']);

				header("Location: ../evento.php?ev=".$idEv);
				exit();
			}
		}
	}

?>
