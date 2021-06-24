<?php
  ini_set('display_errors', 1);

  require_once("controller.php");


	function comentar($idEv, $nick, $comentario){
		$mysqli = conectarBD();

		$idCom = getNextComment($idEv);

		$mysqli->query("INSERT INTO comentarios (id_evento, id_comentario, nombre, comentario) VALUES ('". $idEv ."','".
																																																				$idCom ."','".
																																																				$nick ."','".
																																																				$comentario . "')");
	}

  function editarComentario($idEv, $idCom, $comentario){
		/*$mysqli = conectarBD();

		$mysqli->query("UPDATE comentarios SET comentario='" . $comentario . "'
										WHERE comentarios.id_evento= '"  . $idEV . "'
										AND comentarios.id_comentario='" . $idCom ."'");

		$mysqli->query("UPDATE comentarios SET editado=1
										WHERE comentarios.id_evento= '"  . $idEV . "'
										AND comentarios.id_comentario='" . $idCom ."'");*/
  }

	function borrarComentario($idCom, $idEv){
		$mysqli = conectarBD();

		$comentario = getComentario($idEv, $idCom);

		$mysqli->query("DELETE FROM comentarios WHERE comentarios.comentario='". $comentario['comentario']. "'");

	}
