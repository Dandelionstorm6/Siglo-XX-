<?php
include('encabezado.php');
include('menu.php');
include('inventario.php');
include('bd.php');
$id=$_GET['id'];

$query='Select nombre
		from material
		where id_Material="'.$id.'"';
$result=bd_consulta($query);
$row=mysqli_fetch_assoc($result);


?>
<header id="header_form"> Formulario para editar materiales</header> 
<form action="tipo_gasto_edita.php?" name="miformulario" id="miformulario" method="get"> 
		<div class="myField">
			<label for="gasto"> Material: </label>
			<input type="text" name="nombre" id="nombre" value="<?php echo $row['nombre'];?>"> 
			<input type="text" name="id" id="id" value="<?php echo $id;?>" hidden>
		</div>
		<div class="myField">
			<label for="gasto"> Cantidad: </label>
			<input type="text" name="cantidad" id="cantidad" value=""> 
		
		</div>
		<div class="myField">
			<label for="gasto"> Costo: </label>
			<input type="text" name="costo" id="costo" value=""> 
			
		</div>
	
		<div class="myField">	
			<label >  </label>  
			<input type="submit" class="formButton" value="Enviar" autofocus>
			<input type="reset" class="formButton" value="Cancelar" autofocus>
		</div>

<?php
include('pie.php');


?>