<head>
		<meta charset="utf-8" >
		<title>	Contenedor	</title>
		<link rel="stylesheet" href="estilos.css">
		<script>
			function validarEnviar(){
				fecha=new Date(document.getElementById('fecha').value);
				hoy=new Date();
				resta = hoy.getTime() - fecha.getTime();
				dieciocho=1000*60*60*24*365.6*18;
				if(resta<dieciocho){
					alert("Solo mayores de 18 años");
					return false;
				}
				
				p1=document.getElementById('password').value;
				p2=document.getElementById('rpassword').value;
				if(p1!=p2){
					alert("Las contraseñas no coinciden");
					return false;
				}
				
				return true;
			}
		</script>
	</head>
<?php
	if (isset($_GET['nombre'])){
		$mensaje_form="El usuario ya está registrado";
		$nombre=$_GET['nombre'];
		$paterno=$_GET['paterno'];
		$materno=$_GET['materno'];
		$fecha=$_GET['fecha'];
		$telefono=$_GET['telefono'];
		$password=$_GET['password'];
		$rpassword=$_GET['rpassword'];
	}
	else {
		$nombre="";
		$paterno="";
		$materno="";
		$fecha="";
		$telefono="";
		$password="";
		$rpassword="";
		$correo="";
	}
?>
<section id="seccion">
	<header id="header_form"> Formulario para registrar un nuevo usuario</header>
    <form action="procesa_usuario.php" name="miformulario" id="miformulario" method="post" enctype="multipart/form-data">   
        <div class="myField">
            <label for="paterno"> Apellido Paterno: </label>
            <input type="text" name="paterno" id="paterno"  placeholder="Apellido paterno"  value="<?php echo $paterno;?>" > 
        </div>
        <div class="myField">
            <label for="materno"> Apellido Materno: </label>
            <input type="text" name="materno" id="materno"  placeholder="Apellido materno" value="<?php echo $materno;?>"> 
        </div>		
        <div class="myField">
            <label for="nombre"> Nombre(s): </label>
            <input type="text" name="nombre" id="nombre"  placeholder="Nombre"  value="<?php echo $nombre;?>" > 
        </div>		
        <div class="myField">
            <label for="fecha"> Fecha de Nacimiento: </label>
            <input type="date" name="fecha" id="fecha" value="<?php echo $fecha;?>"> 
        </div>		
        <div class="myField">
            <label for="telefono"> Telefono: </label>
            <input type="text" name="telefono" id="telefono"  placeholder="Teléfono" value="<?php echo $telefono;?>"> 
        </div>		
        <div class="myField">
            <label for="correo"> Correo electrónico: </label>
            <input type="email" name="correo" id="correo"  placeholder="Correo" 
                   > 
        </div>			
        <div class="myField">
            <label for="password"> Password: </label>
            <input type="password" name="password" id="password" placeholder="Nueva contraseña" value="<?php echo $password;?>" >
        </div>
        <div class="myField">
            <label for="rpassword"> Reescribe Password: </label>
            <input type="password" name="rpassword" id="rpassword" placeholder="Reescribe contraseña"  value="<?php echo $rpassword;?>">
        </div>		
        <div class="myField">
            <label for="archivo"> Sube tu foto: </label>
            <input type="file" name="archivo" id="archivo"  >
        </div>			
        <div class="myField">	
            <label >  </label>  
            <input type="submit" class="formButton" value="Enviar" autofocus>
			<input type="reset" class="formButton" value="Cancelar" >
        </div>   
    </form>
		