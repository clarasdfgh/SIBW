<?php
  ini_set('display_errors', 1);

  require_once "/usr/local/lib/php/vendor/autoload.php";
  include("controllers/controller.php");
	include("controllers/controllerUsers.php");

  $loader = new \Twig\Loader\FilesystemLoader('templates');
  $twig = new \Twig\Environment($loader);

  $eventos = getEventos();

	session_start();

	$user = '';

	if(isset($_SESSION['id_user'])){
		$user = getUser($_SESSION['id_user']);
	}


  echo $twig->render('index.html', ['eventos' => $eventos, 'user'=>$user]);
?>
