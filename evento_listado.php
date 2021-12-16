<?php
include('bd.php');
$usuario=$_SESSION['correo'];
$query="SELECT id_Evento,telefono, cliente, fecha_E, fecha_En, lugar_En, horario_En
		FROM evento
		ORDER BY fecha_En ASC";

$result=bd_consulta($query);
?>

<table id="tabla1">

	<tr>
		<td> Cliente </td>
		<td> Fecha entrega </td>
		<td> Lugar entrega </td>
		<td> Horario de entrega </td>

		
	</tr>
<?php	
		for($i=1;$row=mysqli_fetch_assoc($result);$i++){
		echo "
		<tr>
			<td>".$row['cliente']."</td>
			<td>".$row['fecha_En']."</td>
			<td>".$row['lugar_En']."</td>
			<td>".$row['horario_En']."</td>
			<td><a href='evento_editar.php?id=".$row['id_Evento']."'>Ver/Editar </a> </td>
			<td><a href='evento_eliminar.php?id=".$row['id_Evento']."'> Evento hecho </a><td>
		</tr>";
		}
?>
</table>
	