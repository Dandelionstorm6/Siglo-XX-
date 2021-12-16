<?php
	include ('bd.php');
		$usuario=$_SESSION['correo'];
		$query= 'SELECT *
		From categoria';
		$result=bd_consulta($query);
		?>
	
	
	<section id="seccion"> 
		<header id="header_form"> Agregar un Material </header>
		<form action="registro_gasto_procesa.php" name="miformulario" id="miformulario" method="GET">
		<table id="tabla">
			<thead id="encabezado_tabla">
				<tr>
					<td>Nombre</td>
					<td>Cantidad</td>
					<td>Costo</td>
				</tr>
			</thead>

	<?php
		for ($i=1;$i<15;$i++){
	?>
	<TR>
		<TD>
			<input type="text" name="nombre<?php echo $i;?>" />
		</TD>
		
		<TD>
			<input type="text" name="cantidad<?php echo $i;?>" />
		</TD>
		<TD>
			<input type="text" name="costo<?php echo $i;?>" />
		</TD>
		
	</tr>
	<?php } ?>
	</TABLE>
	        <div class="myField">	
            <label >  </label>  
            <input type="submit" class="formButton" value="Enviar" autofocus>
			<input type="reset" class="formButton" value="Cancelar" >
        </div>   
    </form>