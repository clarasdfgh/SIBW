<?php
  ini_set('display_errors', 1);

	require_once "/usr/local/lib/php/vendor/autoload.php";
	include("controllerUsers.php");

	$loader = new \Twig\Loader\FilesystemLoader('templates');
	$twig = new \Twig\Environment($loader);

	$formulario = array('nick' => '',
	 										'mail' => '',
											'activado' => false);

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$formulario['nick'] = $_POST['nick'];
			$formulario['mail'] = $_POST['mail'];
			$formulario['activado'] = true;

			$password = $_POST['pass'];

			$mi_id = login($formulario['nick'],$password))

			if(is_set($mi_id)){
				session_start();
				$_SESSION['id_user'] = $mi_id;

				header("Location: index.php");
			 	exit();
			}
		}


	echo $twig->render('entrar.html', ['formulario'=>$formulario]);

?>
