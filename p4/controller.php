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


        for($i = 1; $i <= mysqli_num_rows($queryevento) ; $i++){

          $selectcomments = "SELECT * FROM comentarios WHERE id_evento=" . $i;
          $querycomments = mysqli_query($mysqli,$selectcomments);

          echo "en el evento " .$i. "hay.... ";
            for($j = 1; $j <= mysqli_num_rows($querycomments) ; $j++){
                echo ".. ".$j." comentarios";
                $comentarios[$j] = getComentario($i, $j);
            }
        }

        return $comentarios;
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


?>
