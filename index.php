<?php
	include('encabezado.php');
	$mensaje_form="";
	if($op=="-2"){
		$op="25";
	}
	if($op=="25"){
		include ('nuevo_usuario.php');
	}
	else {
	if(!$_SESSION['userOK']){
		if($op=="-1") 
			$mensaje_form="Usuario o contraseña incorrectos";
		include('autenticar.php');
	}	
	else{
		include('menu.php');
		switch($op){
			case "1":
				$mensaje_form="Bienvenido ".$_SESSION['nombre'];
				include('vacio.php');break;
			case "0":include('salir.php');break;
			case "2":include('inventario.php'); include ('tipo_gasto_listado.php'); include('vacio.php'); break;
			case "5":include('evento.php'); include ('evento_listado.php'); include('vacio.php'); break;
			case "7":include('evento.php'); include ('evento_listado.php'); include('vacio.php'); break;
			case "8":include('pagos.php'); include('vacio.php'); break;
			case "9":include('rentas.php'); include('vacio.php'); break;
			case "20": include ('inventario.php');  include ('tipo_gasto_listado.php'); include('vacio.php'); break;
			case "30": include ('perfil_usuario.php'); include('vacio.php'); break;
			case "10": include ('tipo_gasto_agregar.php'); include('vacio.php'); break;
			case "22": include ('tipo_gasto_editar.php');include('vacio.php'); break;
			case "15": include ('inventario.php'); include ('registro_gasto.php'); include('vacio.php'); break;
				
		}
	}		
	}
	include('vacio.php');
	include('pie.php');
?>