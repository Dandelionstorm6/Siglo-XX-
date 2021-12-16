<?php
include('bd.php');
$usuario=$_SESSION['correo'];
$query="SELECT id_Material, nombre, cantidad, costo
		FROM material
		ORDER BY nombre ASC";

$result=bd_consulta($query);
?>

<table id="tabla1">

	<tr>
		<td> # </td>
		<td> Tipo de Material </td>
		<td> Cantidad </td>
		<td> Precio </td>
		

		
	</tr>
<?php	
		for($i=1;$row=mysqli_fetch_assoc($result);$i++){
		echo "
		<tr>
			<td>".$i."</td> 
			<td>".$row['nombre']."</td>
			<td>".$row['cantidad']."</td>
			<td>".$row['costo']."</td>
			<td><a href='tipo_gasto_editar.php?id=".$row['id_Material']."'>Editar </a> </td>
			<td><a href='tipo_gasto_eliminar.php?desc=".$row['id_Material']."'> Eliminar </a><td>
		</tr>";
		}
?>
</table>
	