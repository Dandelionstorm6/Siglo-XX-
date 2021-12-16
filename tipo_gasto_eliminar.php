<?php
SESSION_START();
include ('bd.php');

$id=$_GET['desc'];
$query='DELETE FROM material
		WHERE id_Material="'.$id.'"';
bd_consulta($query);
header('Location: index.php?op=20');
?>