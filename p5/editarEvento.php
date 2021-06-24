<?php
	ini_set('display_errors', 1);

	require_once "/usr/local/lib/php/vendor/autoload.php";
	include("controllers/controller.php");

	$loader = new \Twig\Loader\FilesystemLoader('templates');
	$twig = new \Twig\Environment($loader);

	$user = '';
	$evento = '';

	if(isset($_SESSION['id_user'])){
		$user = getUser($_SESSION['id_user']);
	}

	if(isset($_GET['ev'])) {
		$idEv = $_GET['ev'];
		$evento = getEvento($idEv);
	}

  session_start();

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$newnombre = $_POST['nuevonombre'];
		$newfecha = $_POST['nuevofecha'];
		$neworganiza = $_POST['nuevoorganiza'];
		$newtelefono = $_POST['nuevotelefono'];
		$newdescripcion = $_POST['nuevodescripcion'];
		$newimagen = $_POST['nuevoimagen'];

			if(empty($newnombre)){
				$newnombre  = $evento['nombre'];
			} else if(empty($newfecha)){
				$newfecha  = $evento['fecha'];
			} else if(empty($neworganiza)){
				$neworganiza  = $evento['organiza'];
			} else if(empty($newtelefono)){
				$newtelefono  = $evento['telefono'];
			} else if(empty($newdescripcion)){
				$newdescripcion  = $evento['descripcion'];
			} else if(empty($newimagen)){
				$newimagen  = $evento['imagen'];
			}

			editaEvento($idEv, $newnombre, $newfecha, $neworganiza, $newtelefono, $newdescripcion, $newimagen);

			header("Location: evento.php?ev=".$idEv);
		  exit();
	}

	echo $twig->render('editarEvento.html', ['evento'=>$evento, 'user'=>$user, 'ev'=>$idEv]);

?>
