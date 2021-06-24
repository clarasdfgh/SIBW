<?php
  ini_set('display_errors', 1);

  require_once("controller.php");

	/*function conectarBD() {
		$mysqli = new mysqli("localhost", "clr", "password", "plannr");
		if ($mysqli->connect_errno) {
		echo ("Fallo al conectar: " . $mysqli->connect_error);
		}

		return $mysqli;
	}*/

  function existeNick($nick){
		$mysqli = conectarBD();
		$existe = false;

		$res = $mysqli->query("SELECT *
													FROM users WHERE nick='" . $nick . "'");

		if ($res->num_rows > 0) {
			$existe = true;
		}

    return $existe;
  }

  function existeMail($mail){
		$mysqli = conectarBD();
		$existe = false;

		$res = $mysqli->query("SELECT *
													FROM users WHERE mail='" . $mail . "'");

		if ($res->num_rows > 0) {
			$existe = true;
		}

		return $existe;
  }

  //Registra al usuario y devuelve si ha habido exito
  function registraUser($nick, $mail, $pass) {
    $mysqli = conectarBD();
    $exito  = false;

    $pass = password_hash($pass, PASSWORD_DEFAULT);

    if(!existeMail($mail) && !existeNick($nick)){
      print_r("registrando");
      $mysqli->query("INSERT INTO users (nick, password, mail) VALUES ('". $nick .
                                                                      "','". $pass .
                                                                      "','". $mail .
                                                                      "')"
                    );
      $exito = true;
    }

    return $exito;
		}

  function getUserId($nick){
    $mysqli = conectarBD();
		$user = array('nick' => $nick,
									'id_user' => 'ID');

		$res = $mysqli->query("SELECT id_user
													FROM users WHERE nick='" . $nick . "'");

		if ($res->num_rows > 0) {

			$row = $res->fetch_assoc();

			$user = array('nick' => $nick,
										'id_user' => $row['id_user']);
		}

		return $user['id_user'];
  }

  function getUser($id){
    $mysqli = conectarBD();

		$user = array('id_user' => $id,
                    'nick' => 'XXXX',
                    'mail' => 'MM@MM',
										'tipo' => 'aaa'
                  );

		$select_user = "SELECT id_user, nick, mail, tipo
										FROM users WHERE id_user=" . $id;

    if(is_numeric($id)){
      $res = $mysqli->query($select_user);
      if ($res->num_rows > 0) {

        $row = $res->fetch_assoc();

        $user = array('id_user' => $id,
                        'nick'  => $row['nick'],
                        'mail'  => $row['mail'],
												'tipo'  => $row['tipo']);
      }
    }

    return $user;
  }

  function getPass($id) {
		$mysqli = conectarBD();
		$user = array('password' => 'xxx');

		$res = $mysqli->query("SELECT password
													FROM users WHERE id_user='" . $id . "'");

		if ($res->num_rows > 0) {

			$row = $res->fetch_assoc();

			$user = array('password' => $row['password']);
		}

		return $user['password'];
  }

  function login($nick,$pass){
    $mysqli = conectarBD();
    $id  = NULL;

		$res = $mysqli->query("SELECT * FROM users WHERE nick='" . $nick . "'");

		if($res->num_rows > 0) {
			$row = $res->fetch_assoc();

			if(password_verify($pass, $row['password']));
				$id = $row['id_user'];
		}

		return $id;
  }

	function getTipoUser($id){
		$mysqli = conectarBD();
		$user = array('id_user' => $id,
									'tipo' => 'TYPE');

		$res = $mysqli->query("SELECT tipo FROM users WHERE id_user=" . $id);

		if(is_numeric($id)){
			if ($res->num_rows > 0) {

				$row = $res->fetch_assoc();

				$user = array('id_user' => $id,
											'tipo' => $row['tipo']);
			}
		}

		return $user['tipo'];
	}

	function getTipoUserNumerico($tipo){
		if($tipo === 'usr'){
			$tipo = 1;
		} else if ($tipo === 'mod'){
			$tipo = 2;
		} else if ($tipo === 'gestor'){
			$tipo = 3;
		} else if ($tipo === 'super'){
			$tipo = 4;
		} else{
			$tipo = 0;
		}

		return $tipo;
	}

	function tienePermiso($tipoactual, $tipominimo){
		$actual = getTipoUserNumerico($tipoactual);
		$minimo = getTipoUserNumerico($tipominimo);

		return $actual >= $minimo;
	}

	function tienePermisoNumerico($tipoactual, $tipominimo){
		return $tipoactual >= $tipominimo;
	}

	function cambiarNick($id,$nick){
		$mysqli = conectarBD();

		$mysqli->query("UPDATE users SET nick='" . $nick . "'
										WHERE users.id_user= '" . $id . "'");
	}

	function cambiarMail($id,$mail){
		$mysqli = conectarBD();

		$mysqli->query("UPDATE users SET mail='" . $mail . "'
										WHERE users.id_user= '" . $id . "'");
	}

	function cambiarPass($id,$pass){
		$mysqli = conectarBD();

		$pass = password_hash($pass, PASSWORD_DEFAULT);

		$mysqli->query("UPDATE users SET password='" . $pass . "'
										WHERE users.id_user= '" . $id . "'");
	}


?>
