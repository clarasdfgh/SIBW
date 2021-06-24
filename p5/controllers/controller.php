<?php
  ini_set('display_errors', 1);

	function conectarBD() {
		$mysqli = new mysqli("localhost", "clr", "password", "plannr");
		if ($mysqli->connect_errno) {
		echo ("Fallo al conectar: " . $mysqli->connect_error);
		}

		return $mysqli;
	}


	function getEvento($idEv) {
		$mysqli = conectarBD();

		$evento = array('id_evento' => $idEv,
                    'nombre' => 'XXX',
                    'fecha'  => 'XXXX-XX-XX',
                    'organiza' => 'YYY',
                    'telefono' => 'ZZZZZZZZZ',
		                'descripcion' => '---',
						        'imagen' => '../images/error.png');


		if(is_numeric($idEv)){
			$res = $mysqli->query("SELECT nombre, fecha, organiza, telefono, descripcion, imagen
				                    FROM eventos WHERE id_evento=" . $idEv);
			if ($res->num_rows > 0) {

				$row = $res->fetch_assoc();

				$evento = array('id_evento' => $idEv,
                        'nombre'   => $row['nombre'],
                        'fecha'    => $row['fecha'],
				                'organiza' => $row['organiza'],
                        'telefono' => $row['telefono'],
                        'descripcion' => $row['descripcion'],
								        'imagen'      => $row['imagen']);
			}
		}

		return $evento;
	}

  function getEventos() {
  		$mysqli = conectarBD();

      $eventos = array();
      $selectevento = "SELECT * FROM eventos";
      $query = mysqli_query($mysqli,$selectevento);

      for($i = 1; $i <= mysqli_num_rows($query) ; $i++){
        $eventos[$i] = getEvento($i);
      }

  		return $eventos;
  	}

    function getComentario($idEv,$idCom) {
      $mysqli = conectarBD();

      $comentario = array('id_comentario' => $idCom,
                          'id_evento' => $idEv,
                          'nombre' => 'XXX',
                          'fecha'  => 'XXXX-XX-XX',
                          'comentario' => '---');


      if(is_numeric($idEv) && is_numeric($idCom)){
        $res = $mysqli->query("SELECT nombre, fecha, comentario
                              FROM comentarios WHERE id_evento=" . $idEv . " AND id_comentario=" . $idCom);
        if ($res->num_rows > 0) {

          $row = $res->fetch_assoc();

          $comentario = array('id_comentario' => $idCom,
                              'id_evento' => $idEv,
                              'nombre'   => $row['nombre'],
                              'fecha'    => $row['fecha'],
                              'comentario' => $row['comentario']);
        }
      }

      return $comentario;
    }


    function getComentariosEvento($idEv) {
        $mysqli = conectarBD();

        $comentarios = array();

        $selectcomments = "SELECT * FROM comentarios WHERE id_evento=" . $idEv;
        $querycomments = mysqli_query($mysqli,$selectcomments);

          for($j = 1; $j <= mysqli_num_rows($querycomments) ; $j++){
              $comentarios[$j] = getComentario($idEv, $j);
          }

        return $comentarios;
    }

    //Esta función devuelve TODOS los comentarios en todos los eventos.
    //No creo que le saque ninguna utilidad pero se queda por si acaso
    function getComentarios() {
        $mysqli = conectarBD();

        $comentarios = array();

        $selectevento = "SELECT * FROM eventos";
        $queryevento = mysqli_query($mysqli,$selectevento);

				$iterador = 1;

        for($i = 1; $i <= mysqli_num_rows($queryevento) ; $i++){

          $selectcomments = "SELECT * FROM comentarios WHERE id_evento=" . $i;
          $querycomments = mysqli_query($mysqli,$selectcomments);

            for($j=1; $j <= mysqli_num_rows($querycomments) ; $j++){
                $comentarios[$iterador] = getComentario($i, $j);
								$iterador++;
            }

        }

				for($k=1; $k<=count($comentarios);$k++){
					echo($comentarios[$k]['nombre']);
				}

        return $comentarios;
    }

		function getNextComment($idEv){
			$comentarios = getComentariosEvento($idEv);

			return count($comentarios)+1;
		}

    function getBadWord($idWord) {
  		$mysqli = conectarBD();

  		$word = array('id_word' => $idWord,
                      'badword' => 'WWWW');


  		if(is_numeric($idWord)){
  			$res = $mysqli->query("SELECT badword
  				                    FROM badwords WHERE id_word=" . $idWord);
  			if ($res->num_rows > 0) {

  				$row = $res->fetch_assoc();

  				$word = array('id_word' => $idWord,
                        'badword' => $row['badword']);
  			}
  		}

  		return $word['badword'];
  	}

    function getBadWords() {
        $mysqli = conectarBD();

        $badwords = array();

        $select = "SELECT badword FROM badwords";
        $query = mysqli_query($mysqli,$select);


        for($i = 1; $i <= mysqli_num_rows($query) ; $i++){

          $badwords[$i] = getBadWord($i);

        }

        $badwordsjson = json_encode($badwords);

        return $badwordsjson;
    }

		function crearEvento($nombre, $fecha, $org, $tfno, $descr, $img){
			$mysqli = conectarBD();
			$id  = -1;

			$mysqli->query("INSERT INTO eventos (nombre, fecha, organiza, telefono, descripcion, imagen)
											VALUES ('". $nombre ."','". $fecha ."','". $org ."','". $tfno ."','". $descr ."','".$img ."')"
										);
		}

		function editarEvento($nombre, $fecha, $org, $tfno, $descr, $img){
			$mysqli = conectarBD();
			$id  = -1;

			$mysqli->query("UPDATE eventos (nombre, fecha, organiza, telefono, descripcion, imagen)
											VALUES ('". $nombre ."','". $fecha ."','". $org ."','". $tfno ."','". $descr ."','".$img ."')"
										);
		}

		function getTag($idEv,$idTag){
			$mysqli = conectarBD();

			$tag = array('id_tag' => $idTag,
									 'texto' => 'aaa');


			if(is_numeric($idEv) && is_numeric($idTag)){
				$res = $mysqli->query("SELECT texto
															FROM tags WHERE id_evento=" . $idEv . " AND id_tag=" . $idTag);
				if ($res->num_rows > 0) {

					$row = $res->fetch_assoc();


				$tag = array('id_tag' => $idTag,
									   'texto' => $row['texto']);
				}
			}

			return $tag;
		}

		function getTags($idEv){
			$mysqli = conectarBD();

			$tags = array();

			$select = "SELECT * FROM tags WHERE id_evento=" . $idEv;
			$query = mysqli_query($mysqli,$select);

				for($j = 1; $j <= mysqli_num_rows($query) ; $j++){
						$tags[$j] = getTag($idEv, $j);
				}

			return $tags;
		}

		function borrarEvento($idEv){
			$mysqli = conectarBD();

			$mysqli->query("DELETE FROM eventos WHERE eventos.id_evento='". $idEv ."'");
		}

		function editaEvento($idEv,$nombre,$fecha,$organiza,$telefono,$descripcion,$imagen){
			$mysqli = conectarBD();

			$mysqli -> query("UPDATE eventos SET ".
				                 "nombre = '" . $nombre . "', ".
				                 "fecha = '" . $fecha . "', ".
												 "organiza = '" . $organiza . "', ".
												 "telefono = '" . $telefono . "', ".
												 "descripcion = '" . $descripcion . "', ".
				                 "imagen = ". $imagen."' ".
				                 "WHERE eventos.id_evento='". $idEv."'");
		}



?>
