<?php
	include('bd.php');	
	$usuario=$_POST['usuario'];
	$pass=$_POST['password'];
	$query="select *
			FROM usuario
			WHERE correo='".$usuario."' AND PASSWORD='".$pass."'";
	$result=bd_consulta($query); 
	if( $row = mysqli_fetch_assoc($result)){
		SESSION_START();
		$_SESSION['userOK']=true;
		$_SESSION['nombre']=$row['nombre'];
		$_SESSION['paterno']=$row['paterno'];
		$_SESSION['materno']=$row['materno'];
		$_SESSION['correo']=$usuario;
		$_SESSION['fecha_nacimiento']=$row['fecha'];
		$_SESSION['telefono']=$row['telefono'];
		$_SESSION['foto']=$row['foto'];
		header('Location: index.php?op=1');
	}
	else{
		header('Location: index.php?op=-1');
	}
	
?>