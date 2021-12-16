<?php
SESSION_START();
include ('bd.php');

$id=$_GET['id'];

$query='select * from renta where id_Evento="'.$id.'"';
$existe=bd_consulta($query);
while($r=mysqli_fetch_assoc($existe)){

	$query='select * from material where id_Material="'.$r['id_Material'].'"';
	$total=bd_consulta($query);

	if($t=mysqli_fetch_assoc($total)){
		$total2=$t['cantidad']+$r['cantidad'];

		$queryss='UPDATE material SET  cantidad="'.$total2.'" where id_Material="'.$r['id_Material'].'"';
		bd_consulta($queryss);
	}



$query='DELETE FROM renta where id_Renta="'.$r['id_Renta'].'"';

$query='SELECT * FROM deposito where  id_Evento="'.$id.'"';
$existe=bd_consulta($query);
if($e=mysqli_fetch_assoc($existe)){
	$query='DELETE FROM deposito where id_Depositos="'.$e['id_Depositos'].'"';
}

bd_consulta($query);
}

$query='DELETE FROM evento 
		WHERE id_Evento="'.$id.'"';
bd_consulta($query);
header("Location: index.php");
?>