<?php
SESSION_START();
include ('bd.php');


$new=$_GET['nombre'];
$cantidad=$_GET['cantidad'];
$costo=$_GET['costo'];
$id=$_GET['id'];


//$query='UPDATE materrial SET nombre="'.$new.'",  cantidad="'.$cantidad.'", costo="'.$costo.'"
//		where id_Material="'.$id.'"';
		$query="UPDATE material SET nombre='".$new."',  cantidad='".$cantidad."', costo='".$costo."'
		where id_Material='".$id."'";
bd_consulta($query);
	
//if(bd_consulta($query)==false){
	
//}
//header('Location: index.php?op=20');
?>
