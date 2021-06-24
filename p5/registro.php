<?php
  ini_set('display_errors', 1);

	require_once "/usr/local/lib/php/vendor/autoload.php";
	include("controllers/controllerUsers.php");

	$loader = new \Twig\Loader\FilesystemLoader('templates');
	$twig = new \Twig\Environment($loader);

	$formulario = array('nick' => '', 'activado' => false);


	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$formulario['nick'] = $_POST['nick'];
			$formulario['activado'] = true;

			$mail = $_POST['mail'];
			$password = $_POST['pass'];

			if (registraUser($formulario['nick'],$mail,$password)){
				session_start();

				$id = getUserId($formulario['nick']);
				$_SESSION['id_user'] = $id;

				header("Location: index.php");
			 	exit();
			}
		}

	echo $twig->render('registro.html', ['formulario'=>$formulario]);
?>
