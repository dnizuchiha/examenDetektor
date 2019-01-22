<?php 
	include("db.php");
	$conexion = conectarse();
	
	$sql = "SELECT id, nombre, apellido, telefono, des_motivo FROM motivos_es_gt";
	$resultado = $conexion->query($sql);
	if ($resultado) {
		while($data = mysqli_fetch_assoc($resultado)){
			
			$arreglo["data"][] = $data;
		}
	}else{
		echo "fallo";
	}
	mysqli_free_result($resultado); 
	$conexion->close();
	echo json_encode($arreglo);
?>
 