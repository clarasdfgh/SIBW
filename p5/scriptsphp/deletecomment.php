<?php
	ini_set('display_errors', 1);
	require("../controllers/controller.php");
	require("../controllers/controllerUsers.php");
	require("../controllers/controllerComments.php");

	session_start();

		if(isset($_SESSION['id_user'])) {
			if($_SERVER['REQUEST_METHOD'] === 'POST') {

					$idEv = $_GET['ev'];
					$idCom = $_GET['com'];

				borrarComentario($idEv, $idCom);

				header("Location: ../evento.php?ev=".$idEv);
				exit();
			}
		}

?>
