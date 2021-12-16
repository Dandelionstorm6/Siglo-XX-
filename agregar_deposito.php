<?php
SESSION_START();
include ('bd.php');
$querys="SELECT id_Evento,telefono, cliente, fecha_E, fecha_En, lugar_En, horario_En
		FROM evento
		ORDER BY fecha_En ASC";

$result=bd_consulta($querys);

for($i=1;$row=mysqli_fetch_assoc($result);$i++){

	$id=$_GET['evento'.$i];
	$cantidad=$_GET['cantidad'.$i];


	$query='SELECT * FROM deposito where  id_Evento="'.$id.'"';
	$existe=bd_consulta($query);
	if($e=mysqli_fetch_assoc($existe)){

		if($cantidad!=""){
			if($cantidad=="0"){
				$query='DELETE FROM deposito where id_Depositos="'.$e['id_Depositos'].'"';
				bd_consulta($query);
			}
			else{
			$query='UPDATE deposito SET abono="'.$cantidad.'" where id_Depositos="'.$e['id_Depositos'].'"';
			bd_consulta($query);
			}
		}
		
	}

	else{
		if($cantidad!=""){
			$query='INSERT INTO deposito (id_Depositos,id_Evento,abono)
				VALUES(
				"'.NULL.'",
				"'.$id.'",
				"'.$cantidad.'"
			)';
			bd_consulta($query);
		}	
	}
}
header("Location: index.php?op=8");
?>