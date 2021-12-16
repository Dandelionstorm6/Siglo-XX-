<header id="header_form"> Formulario para tipos de materiales</header> 
<form action="tipo_gasto_procesa.php" name="miformulario" id="miformulario" method="get"> 
		<div class="myField">
			<label for="material"> Nombre del material: </label>
			<input type="text" name="material" id="material"  placeholder="Inserta nombre" 
				value="" required > 
		</div>
		<div class="myField">	
			<label >  </label>  
			<input type="submit" class="formButton" value="Enviar" autofocus> 
			<input type="reset" class="formButton" value="Cancelar" autofocus>
		</div>

<?php
$mensaje_form="";
$mensaje_form="Bienvenido ".$_SESSION['nombre'];
?>