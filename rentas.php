<?php
include('bd.php');
$usuario=$_SESSION['correo'];
$query="Select distinct(m.nombre), r.id_Material
from renta r inner join material m on r.id_Material = m.id_Material";

$result=bd_consulta($query);



?>

<table id="tabla2">

	<tr>
		<td> Material </td>
		<td> Cantidad Usada </td>

	</tr>
<?php	
		for($i=1;$row=mysqli_fetch_assoc($result);$i++){
		$querys='Select m.nombre, SUM(r.cantidad) as total
				from renta r inner join material m on r.id_Material = m.id_Material
				where r.id_Material="'.$row['id_Material'].'"';
		$cantidad=bd_consulta($querys);
		if($c=mysqli_fetch_assoc($cantidad)){
			$nombre=$c['nombre'];
			$cant=$c['total'];
		}
		echo "
		<tr>
			<td>".$nombre."</td>
			<td>".$cant."</td>

		</tr>";
		}
?>
</table>
	