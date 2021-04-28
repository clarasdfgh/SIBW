<?php
  ini_set('display_errors', 1);

  require_once "/usr/local/lib/php/vendor/autoload.php";
  include("controller.php");

  $loader = new \Twig\Loader\FilesystemLoader('templates');
  $twig = new \Twig\Environment($loader);

  if (isset($_GET['ev'])) {
		$idEv = $_GET['ev'];
	} else {
		$idEv = -1;
	}

	$evento = getEvento($idEv);
  $comentarios = getComentarios();


  echo $twig->render('evento.html', ['evento' => $evento,'comentarios' => $comentarios]);
?>
