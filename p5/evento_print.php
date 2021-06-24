<?php
  ini_set('display_errors', 1);

  require_once "/usr/local/lib/php/vendor/autoload.php";
  include("controllers/controller.php");

  $loader = new \Twig\Loader\FilesystemLoader('templates');
  $twig = new \Twig\Environment($loader);

  if (isset($_GET['ev'])) {
    $idEv = $_GET['ev'];
  } else {
    $idEv = -1;
  }

	session_start();

	$user = '';

	if(isset($_SESSION['id_user'])){
		$user = getUser($_SESSION['id_user']);
	}


  $evento = getEvento($idEv);


  echo $twig->render('evento_print.html', ['evento' => $evento, 'user' => $user]);
?>
