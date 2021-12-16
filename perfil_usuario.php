<?php 

$nombre_completo=$_SESSION['nombre']." ".$_SESSION['paterno']." ".$_SESSION['materno'];
$correo=$_SESSION['correo'];
$telefono=$_SESSION['telefono'];
$fecha=$_SESSION['fecha_nacimiento'];
$file=$_SESSION['foto'];

?>	
		<section id="seccion">	
		<header id="header_form"> Perfil del usuario</header>	
		<figure id=foto>
				<img src="<?php echo $file; ?>">
				<figcaption><?php echo $nombre_completo;?> </figcaption>
		</figure>
		<section id="datos">
		   <div class="myField">
				<label> Nombre completo: </label>
				<span> <?php echo $nombre_completo; ?> </span>
			</div>
		   <div class="myField">
				<label> Fecha de Nacimiento: </label>
				<span> <?php echo $fecha; ?> </span>
			</div>		
			
			<div class="myField">
				<label> Teléfono: </label>
				<span><?php echo $telefono;?></span>
			</div>			 	
			 <div class="myField">
				<label> Correo Electrónico: </label>
				<span><?php echo $correo;?></span>
			</div>			
 		


