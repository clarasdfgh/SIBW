<?php
  ini_set('display_errors', 1);

	require_once "/usr/local/lib/php/vendor/autoload.php";
	include("controllerUsers.php");

	$loader = new \Twig\Loader\FilesystemLoader('templates');
	$twig = new \Twig\Environment($loader);



	if ($_SERVER['REQUEST_METHOD'] === 'POST') {


	  header("Location: gestor.php");

	  exit();
	}

	echo $twig->render('gestor.html', []);

?>
