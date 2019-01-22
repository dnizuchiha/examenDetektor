<?php

  function conectarse(){
	$coneccion = new mysqli('localhost','root','root','test');
  
	if ($coneccion->connect_errno) {
		echo "Error, NO SE CONECTO";
		return null;
	}
	return $coneccion;
  }
?> 

