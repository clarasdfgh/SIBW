<?php
  ini_set('display_errors', 1);

	require_once "/usr/local/lib/php/vendor/autoload.php";
	require_once("controllers/controllerUsers.php");
	require_once("controllers/controller.php");
	require_once("controllers/controllerComments.php");

	$loader = new \Twig\Loader\FilesystemLoader('templates');
	$twig = new \Twig\Environment($loader);

	session_start();

	$user = '';
	$comentarios = getComentarios();
	$eventos = getEventos();
	$permitidoeditar = false;
	$permitidopermisos = false;
	$permitidomod = false;

	if(isset($_SESSION['id_user'])){
		$user = getUser($_SESSION['id_user']);

		$tipoactual = getTipoUserNumerico($user['tipo']);
		$tipoeditar = getTipoUserNumerico('gestor');
		$tipomod		= getTipoUserNumerico('mod');
		$tipopermisos  = getTipoUserNumerico('super');

		if(tienePermisoNumerico($tipoactual, $tipoeditar)){
			$permitidoeditar = true;
		}

		if(tienePermisoNumerico($tipoactual, $tipopermisos)){
			$permitidopermisos = true;
		}

		if(tienePermisoNumerico($tipoactual, $tipomod)){
			$permitidomod = true;
		}
	}

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {


	  header("Location: panel.php");
	  exit();
	}



	echo $twig->render('panel.html', ['user' => $user, 'permitidoeditar' => $permitidoeditar,
																		'permitidomod' => $permitidomod, 'permitidopermisos' => $permitidopermisos,
																		'comentarios' => $comentarios, 'eventos' => $eventos]);

?>
