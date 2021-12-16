<?php
	SESSION_START();
	include('bd.php');
	$correo=$_SESSION['correo'];
	$id=$_GET['id'];
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
		$total = $row['cantidad']+(int)$_GET['cantidad2'.$i];
		if($cantidad < $total){
				$j++;

			}
		
	}

	if($j== $numero){
		$query='UPDATE evento SET 
		cliente="'.$nombre.'",
		telefono="'.$telefono.'",
		fecha_E="'.$fecha_E.'",
		fecha_En="'.$fecha_En.'",
		lugar_En="'.$lugar_En.'",
		horario_En="'.$horario_En.'",
		fecha_Dev="'.$fecha_Dev.'",
		horario_Dev="'.$horario_Dev.'"    
		where id_Evento="'.$id.'"'; 

	
			bd_consulta($query);

		

		$query= 'SELECT * From material';
		$result=bd_consulta($query);

		for($i=1;$rows=mysqli_fetch_assoc($result);$i++){


			$cantidad = $_GET['cantidad'.$i];

			if($cantidad!=""){


				$exist='select *
						from renta
						where id_Evento="'.$id.'" AND id_Material="'.$rows['id_Material'].'"';
				$existe=bd_consulta($exist);

				if($r=mysqli_fetch_assoc($existe)){
					$query='UPDATE renta SET cantidad="'.$cantidad.'" where id_Renta="'.$r['id_Renta'].'"';
					bd_consulta($query);

					$total = $rows['cantidad']+$_GET['cantidad2'.$i];
					$sobra = $total-$cantidad;

					$queryss='UPDATE material SET  cantidad="'.$sobra.'" where id_Material="'.$rows['id_Material'].'"';
					bd_consulta($queryss);


				}
				else{
				$query='INSERT INTO renta (id_Renta,id_Evento,id_Material,cantidad)
						VALUES(
						"'.NULL.'",
						"'.$id.'",
						"'.$rows['id_Material'].'",
						"'.$cantidad.'"
						)';
				bd_consulta($query);
				$new=$rows['cantidad']-$cantidad;
				$querys='UPDATE material SET  cantidad="'.$new.'" where id_Material="'.$rows['id_Material'].'"';
				bd_consulta($querys);
				}

			}

			if($cantidad=="0"){
				$exist='select * from renta
						where id_Evento="'.$id.'" AND id_Material="'.$rows['id_Material'].'"';
				$existe=bd_consulta($exist);

				if($r=mysqli_fetch_assoc($existe)){
					$total = $rows['cantidad']+$_GET['cantidad2'.$i];
					$queryss='UPDATE material SET  cantidad="'.$total.'" where id_Material="'.$rows['id_Material'].'"';
					bd_consulta($queryss);
					$delete='DELETE FROM renta where id_Renta="'.$r['id_Renta'].'"';
					bd_consulta($delete);
				}
			}	
		}
	}



	header("Location: index.php");
?>