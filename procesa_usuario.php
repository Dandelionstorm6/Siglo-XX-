<?php
include('bd.php');
$nombre=$_POST['nombre'];
$paterno=$_POST['paterno'];
$materno=$_POST['materno'];
$fecha=$_POST['fecha'];
$correo=$_POST['correo'];
$telefono=$_POST['telefono'];
$password=$_POST['password'];
//$file = $_FILES['uploadedFile']['tmp_name'];
//move_uploaded_file($fileTmpPath, "imgPerfil.png");
if ( isset($_FILES) && isset($_FILES['archivo']) && !empty($_FILES['archivo']['name'] && !empty($_FILES['archivo']['tmp_name']))) {
	//Si no se procesa
	if(! is_uploaded_file( $_FILES['archivo']['tmp_name'] ) ){
		//echo "Error el fichero encontrado no fue procesado por la subida";
		exit;
	}
	$fuente = $_FILES['archivo']['tmp_name'];
	//$dirDes = __DIR__.$carpeta.$usuario.'.png';
	$dirDes = __DIR__.'/fotos/'.$_FILES['archivo']['name'].'';


	if ( is_file($dirDes)) {
		//echo "Error: Ya existe almacenado un fichero con el mismo nombre";
		@unlink(ini_get('upload_tmp_dir').$_FILES['archivo']['tmp_name']);
	}

	if (!@move_uploaded_file($fuente, $dirDes)) {
		//echo "Error: No se ha podido mover el fichero enviado";
		@unlink(ini_get('upload_tmp_dir').$_FILES['archivo']['tmp_name']);
	}
	//echo "Fichero subido correctamente a :".$dirDes;
}
if ($fuente=="") {
	$dir="";
}else {
	$dir="fotos/".$_FILES['archivo']['name']."";
	//$dir=$carpeta.$usuario.$_FILES['archivo']['name'];
}
$result=bd_consulta('SELECT COUNT(*) as cuenta 
			FROM usuario
			WHERE correo="'.$correo.'"');
$row=mysqli_fetch_assoc($result);
if($row['cuenta']>0){
	header("Location: index.php?op=25&nombre=".$nombre."&paterno=".$paterno."&materno=".$materno."&fecha=".$fecha."&telefono=".$telefono."&password=".$password."&rpassword=".$rpassword);
	
}	
else{
	$query='INSERT INTO usuario
	VALUES (
	"'.$correo.'",
	"'.$paterno.'",
	"'.$materno.'",
	"'.$nombre.'",
	"'.$fecha.'",
	"'.$telefono.'",
	"'.$password.'",
	"'.$dir.'"
	)';
	bd_consulta($query);
	header("Location: index.php");		
}

?>




