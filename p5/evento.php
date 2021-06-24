<?php
  ini_set('display_errors', 1);

  require_once "/usr/local/lib/php/vendor/autoload.php";
  include("controllers/controller.php");
	include("controllers/controllerUsers.php");
	include("controllers/controllerComments.php");

  $loader = new \Twig\Loader\FilesystemLoader('templates');
  $twig = new \Twig\Environment($loader);

  if (isset($_GET['ev'])) {
		$idEv = $_GET['ev'];
	} else {
		$idEv = -1;
	}

	session_start();

	$user = '';
	$puedeModerar = false;
	$puedeGestionar = false;

	if(isset($_SESSION['id_user'])){
		$user = getUser($_SESSION['id_user']);

		$tipoactual = getTipoUserNumerico($user['tipo']);
		$tipomod  = getTipoUserNumerico('mod');
		$tipogest = getTipoUserNumerico('gestor');

		if(tienePermisoNumerico($tipoactual,$tipomod)){
			$puedeModerar = true;
		}

		if(tienePermisoNumerico($tipoactual,$tipogest)){
			$puedeGestionar = true;
		}
	}

	$evento = getEvento($idEv);
  $comentarios = getComentariosEvento($idEv);
  $badwords = getBadWords();
	$tags = getTags($idEv);

  echo $twig->render('evento.html', ['evento' => $evento, 'idEv' => $idEv, 'comentarios' => $comentarios,
																		 'badwords' => $badwords, 'user' => $user, 'tags' => $tags,
																		 'puedeModerar' => $puedeModerar, 'puedeGestionar' => $puedeGestionar]);
?>
