<?php 
	SESSION_START();
	if(!isset($_SESSION['userOK']))
		$_SESSION['userOK']=false;
	if(!isset($_GET['op'])){
		$op=-10; //la aplicación está iniciando
		$mensaje_form="";
	}
	else
		$op=$_GET['op'];
	
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8" >
		<title>	SIGLO XXI	</title>
		<link rel="stylesheet" href="estilos.css">
	</head>
	<body>
	<div id="principal">
		<header id="cabecera">
			<h1>COORDINACIÓN DE EVENTOS SOCIALES</h1>	
				
		</header>

		
		