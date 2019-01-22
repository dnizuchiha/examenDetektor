<?php
	if ($_POST['idEliminar'] != "") {
		
  		include('db.php');
		$id = $_POST['idEliminar'];

		$conexion = conectarse();
		$statement = $conexion->prepare("CALL borrar(?)");
		$statement->bind_param("s", $id);
						
		if ($statement->execute()) {
			echo " El empleado se borro correctamente";
			header("Location:../index.php"); 
		}else{
			echo " El empleado no se pudo borrar";
		}
		$statement->close();
		$conexion->close(); 
	}else{
		echo " No se enviarion todos los datos...";
	}
?> 