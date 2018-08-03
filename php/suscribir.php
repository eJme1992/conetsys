<?php
session_start();
include("../conexion.php");
$conn = conectar();
// validacion de envio
if (isset($_POST["send"])) {
$error=0;  

$mail = $_POST['mail'];

$stringnumero = strlen($mail);	
 
if ($stringnumero != 0){

    mysqli_query($conn,"INSERT INTO wp_suscriptores VALUES('','$mail')");
	
	mysqli_close($conn);
    
	
	echo '<div class="alert alert-info">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
         <strong>Info!</strong> Se ha registrado con exito.
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