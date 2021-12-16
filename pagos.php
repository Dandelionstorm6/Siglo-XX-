<?php
include('bd.php');
$usuario=$_SESSION['correo'];
$query="SELECT id_Evento,telefono, cliente, fecha_E, fecha_En, lugar_En, horario_En
		FROM evento
		ORDER BY fecha_En ASC";

$result=bd_consulta($query);
$total=0;
$depositos=0;
?>
<form action="agregar_deposito.php"  method="GET">
<table id="tabla1">

	<tr>
		<td> Cliente </td>
		<td> Telefono </td>
		<td> Total</td>
		<td> Depositos </td>

		
	</tr>
<?php	
		for($i=1;$row=mysqli_fetch_assoc($result);$i++){

		$rentas='SELECT * from renta where id_Evento="'.$row['id_Evento'].'"';
		$rentass=bd_consulta($rentas);

		while($r=mysqli_fetch_assoc($rentass)){
			$costo='SELECT * from material where id_Material="'.$r['id_Material'].'"';
			$costos=bd_consulta($costo);
			if($c=mysqli_fetch_assoc($costos)){
				$total+=$r['cantidad']*$c['costo'];
			}
		}

		$dep='SELECT * from deposito where id_Evento="'.$row['id_Evento'].'"';
		$depo=bd_consulta($dep);
		if($d=mysqli_fetch_assoc($depo)){
			$depositos=$d['abono'];
		}


		echo "
		<tr>
			<td>".$row['cliente']."</td>
			<td>".$row['telefono']."</td>
			<td>".$total."</td>
			<td>".$depositos."</td>
			<td>
				 <input type=text name=evento".$i."  value=".$row['id_Evento']." hidden>
				<input type=text name=cantidad".$i."   placeholder=Deposito      />
			</td>
			<td>
			<input type=submit  value=Poner autofocus>
			</td>
		</tr>";
		$total=0;
		$depositos=0;
		}
?>
</table>
	