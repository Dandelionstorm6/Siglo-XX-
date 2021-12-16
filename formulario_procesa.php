<?php
	SESSION_START();
	include('bd.php');
	$correo=$_SESSION['correo'];
	$nombre=$_GET['nombre'];
	$telefono=$_GET['telefono'];
	$fecha_E=$_GET['fechae'];
	$fecha_En=$_GET['fechaini'];
	$lugar_En=$_GET['lugar'];
	$horario_En=$_GET['horario1'];
	$fecha_Dev=$_GET['fechadev'];
	$horario_Dev=$_GET['horario2'];

	

	$query= 'SELECT * From material';
	$result=bd_consulta($query);
	


	$query= 'SELECT count(*) as num FROM material';
	$num=bd_consulta($query);
	if($nume=mysqli_fetch_assoc($num)){

		$numero=$nume['num'];
	}


	$j=0;
	for($i=1;$row=mysqli_fetch_assoc($result);$i++){

		$cantidad = $_GET['cantidad'.$i];
		if($cantidad < $row['cantidad']){
				$j++;

			}
		
	}

	if($j== $numero){

		$query='INSERT INTO evento (id_Evento,correo,cliente,telefono,fecha_E,fecha_En, lugar_En, horario_En, fecha_Dev, horario_Dev)
			VALUES(
			"'.NULL.'",
			"'.$correo.'",
			"'.$nombre.'",
			"'.$telefono.'",
			"'.$fecha_E.'",
			"'.$fecha_En.'",
			"'.$lugar_En.'",
			"'.$horario_En.'",
			"'.$fecha_Dev.'",
			"'.$horario_Dev.'"
			)';
			bd_consulta($query);

			$query1= 'SELECT MAX(id_Evento) as max FROM evento';
			$max=bd_consulta($query1);
			if($max1=mysqli_fetch_assoc($max)){
				$max2=$max1['max'];
			}

		$query= 'SELECT * From material';
		$result=bd_consulta($query);

		for($i=1;$rows=mysqli_fetch_assoc($result);$i++){


			$cantidad = $_GET['cantidad'.$i];

			if($cantidad!=""){
				$query='INSERT INTO renta (id_Renta,id_Evento,id_Material,cantidad)
						VALUES(
						"'.NULL.'",
						"'.$max2.'",
						"'.$rows['id_Material'].'",
						"'.$cantidad.'"
						)';
				bd_consulta($query);
				$new=$rows['cantidad']-$cantidad;
				$querys='UPDATE material SET  cantidad="'.$new.'" where id_Material="'.$rows['id_Material'].'"';
				bd_consulta($querys);


			}
			
		}
	}



header("Location: index.php");
?>