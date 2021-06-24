<?php
  ini_set('display_errors', 1);

	require_once "/usr/local/lib/php/vendor/autoload.php";
	include("controllers/controllerUsers.php");

	$loader = new \Twig\Loader\FilesystemLoader('templates');
	$twig = new \Twig\Environment($loader);

	$formulario = array('nombre' => '',
											'fecha' => '',
											'organiza' => '',
											'telefono' => '',
											'descripcion' => '',
											'imagen' => '',
	 										'activado' => false);


	session_start();

	$user = '';
	$permitidocrear = false;

	if(isset($_SESSION['id_user'])){
		$user = getUser($_SESSION['id_user']);

		$tipoactual = getTipoUserNumerico($user['tipo']);
		$tipocrear  = getTipoUserNumerico('gestor');

		if(tienePermisoNumerico($tipoactual, $tipocrear)){
			$permitidocrear = true;
		}
	}

	if(isset($_SESSION['id_user'])){
		$user = getUser($_SESSION['id_user']);
	}

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$formulario['nombre'] = $_POST['nombre'];
			$formulario['fecha'] = $_POST['fecha'];
			$formulario['organiza'] = $_POST['organiza'];
			$formulario['telefono'] = $_POST['telefono'];
			$formulario['descripcion'] = $_POST['descripcion'];
			$formulario['imagen'] = $_POST['imagen'];
			$formulario['activado'] = true;

			print_r("eee");

			crearEvento($formulario['nombre'],$formulario['fecha'],	$formulario['organiza'],$formulario['telefono'],$formulario['descripcion'],$formulario['imagen']);

			header("Location: index.php");
		 	exit();
		}

	echo $twig->render('nuevoEvento.html', ['user' => $user, 'permitidocrear' => $permitidocrear]);

?>
