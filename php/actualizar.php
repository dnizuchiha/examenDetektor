<?php
	if ($_POST['VerNombre'] != "" AND $_POST['VerApellido'] != "" AND $_POST['VerTelefono'] != "" AND $_POST['VerDes_Motivo'] != "") {
		
  		include('db.php');
		$id = $_POST['verId'];
		$nombre = $_POST['VerNombre'];
		$apellido = $_POST['VerApellido'];
		$des_Motivo = $_POST['VerDes_Motivo'];
		$telefono = $_POST['VerTelefono'];

		$conexion = conectarse();
		$statement = $conexion->prepare("CALL actualizar(?,?,?,?,?)");
		$statement->bind_param("sssss", $id, $nombre, $apellido, $telefono, $des_Motivo);
						
		if ($statement->execute()) {
			echo " El empleado se actualizo correctamente";
			header("Location:../index.php"); 
		}else{
			echo " El empleado no se pudo actualizar";
		}
		$statement->close();
		$conexion->close(); 
	}else{
		echo " No se enviarion todos los datos...";
	}
?> 