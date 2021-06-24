<?php
  ini_set('display_errors', 1);

	require_once "/usr/local/lib/php/vendor/autoload.php";
	include("controllers/controllerUsers.php");

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

			$mi_id = login($formulario['nick'],$password);

			if(isset($mi_id)){
				session_start();
				$_SESSION['id_user'] = $mi_id;

				header("Location: index.php");
			 	exit();
			}
		}

		session_start();

		$user = '';

		if(isset($_SESSION['id_user'])){
			$user = getUser($_SESSION['id_user']);
		}



	echo $twig->render('entrar.html', ['formulario'=>$formulario, 'user'=>$user]);

?>
