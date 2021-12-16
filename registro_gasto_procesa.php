<?php
	SESSION_START();
	include('bd.php');
	$usuario=$_SESSION['correo'];
	for($i=1;$i<15;$i++){
		
		$nombre=$_GET['nombre'.$i];
		$cantidad=$_GET['cantidad'.$i];
		$costo=$_GET['costo'.$i];

		if($nombre!=""){
			$query='INSERT INTO material (id_Material,nombre,cantidad,costo)
			VALUES("'.NULL.'","'.$nombre.'",'.$cantidad.',"'.$costo.'")';
			bd_consulta($query);
			//$query="INSERT INTO material VALUES ('".null."','".$nombre."','".$row['id_categoria']."')";
			//bd_consulta($query);
			//echo 'se agregó';
		}
	

	}
	header("Location: index.php");
?>