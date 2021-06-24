<?php
require_once("controller.php");

	$mysqli = conectarBD();
	$query = "SELECT id_evento, nombre FROM eventos";
	$eventosarray = array();

	if ($result = $mysqli->query($query)) {
	    while ($row = $result->fetch_assoc()) {
	       array_push($eventosarray, $row);
	    }

	    if(count($eventosarray)){
	         createXMLfile($eventosarray);
	     }

	    $result->free();
	}

	$mysqli->close();


	function createXMLfile($eventosarray){

	   $path 		= 'ev.xml';
	   $dom     = new DOMDocument('1.0', 'utf-8');
	   $root    = $dom->createElement('ev');

	   for($i=0; $i<count($eventosarray); $i++){

	     $idev        =  $eventosarray[$i]['id_evento'];
	     $nombreev 		= $eventosarray[$i]['nombre'];

	     $ev = $dom->createElement('ev');
	     $ev->setAttribute('id', $idev);

	     $nombre     = $dom->createElement('nombre', $nombreev);
	     $ev->appendChild($nombre);

	     $root->appendChild($ev);
	   }
	   $dom->appendChild($root);
	   $dom->save($path);
	 }
?>
