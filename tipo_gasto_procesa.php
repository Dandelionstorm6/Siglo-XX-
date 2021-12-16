<?php
SESSION_START();
include ('bd.php');

$descripcion=$_GET['material'];
$query="INSERT INTO categoria VALUES ('".null."','".$descripcion."')";

if(bd_consulta($query)==false){
	
}
header('Location: index.php?op=20');
?>