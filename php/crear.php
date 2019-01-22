<?php
	if ($_POST['cNombre'] != "" AND $_POST['cApellido'] != "" AND $_POST['cTelefono'] != "" AND $_POST['cDes_Motivo'] != "") {
		
  		include('db.php');
		$nombre = $_POST['cNombre'];
		$apellido = $_POST['cApellido'];
		$telefono = $_POST['cTelefono'];
		$des_motivo = $_POST['cDes_Motivo'];

		$conexion = conectarse();
		$statement = $conexion->prepare("CALL crear(?,?,?,?)");
		$statement->bind_param("ssss", $nombre, $apellido, $telefono, $des_motivo);
						
		if ($statement->execute()) {
			echo " El empleado se creo correctamente";
			header("Location:../index.php"); 
		}else{
			echo " El empleado no se pudo crear";
		}
		$statement->close();
		$conexion->close(); 
	}else{
		echo " No se enviarion todos los datos...";
	}
?> 