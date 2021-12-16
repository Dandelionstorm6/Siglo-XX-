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
		<link rel="stylesheet" href="estiloss.css">
	</head>
	<body>
	<div id="principal">
		<header id="cabecera">
			<h1>COORDINACIÓN DE EVENTOS SOCIALES</h1>	
			<h4>LUIS FERNANDO CARDIEL RIOS  R.F.C CARL681016G48  C.U.R.P. CARL681016HMNRSS06 </h4>
            <h5>MAZATLAN NO.3(ENTRE MORELOS Y SARABIA)  COL MORELOS</h5>
            <h6>TEL 01(452) 528 66 66  URUAPAN, MICH.</h6>	
		</header>

		
		