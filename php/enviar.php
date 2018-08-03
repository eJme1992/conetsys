<?php
session_start();
include("../conexion.php");
$conn = conectar();
// validacion de envio
if (isset($_POST["send"])) {
$error=0;  


$mensaje = $_POST['mensaje'];
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$correo = $_POST['correo'];
$asunto = "Mensaje de cliente de la pagina web";




$stringnumero = strlen($email)*strlen($mensaje)*strlen($nombre)*strlen($telefono)*strlen($correo);	
 
if ($stringnumero != 0){

    $mensaje = "

 		Nombre del remitente: ".$nombre."
 		Correo: ".$correo."
		Telefono: ".$telefono."
 		Mensaje: ".$mensaje." ";

		mail($correo,$asunto,utf8_decode($mensaje));
 
		echo '<div class="alert alert-info">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
         <strong>Info!</strong> El mensaje se ha enviado con exito.
        </div>';
	

	}
	else {	
	echo '<div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
       <strong>ERROR</strong> Debe ingresar todo los datos.
        </div>'; 

	
}
	
}else {
	echo ' <script language="javascript">alert("debe entrat atravez de formulario");</script> ';
	
	
}
	
	
?>