<?php
 require_once "recaptchalib.php";

 $recaptcha = $_POST["g-recaptcha-response"];
 $nombre = $_POST["nombre"];
 $compañia = $_POST["compañia"];
 $telefono = $_POST["telefono"];
 $correo = $_POST["correo"];
 $contenido = $_POST["contenido"];
 $para = "edwin.jme@gmail.com";
 $asunto = "Nuevo Mensaje de $nombre";


if ($recaptcha != '' ) {
	$secret = "6LchOy0UAAAAAD3KTII7o-BT8Nq71Mw2sLI0UA0T";
	$ip = $_SERVER['REMOTE_ADDR'];
	$var = file_get_contents ("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$recaptcha&remoteip=$ip");
	$array = json_decode($var, true);
	if ( $array['success'] == true ){

 		$mensaje = "

 		Nombre del remitente: ".$nombre."
 		Compañia: ".$compañia."
		Correo: ".$correo."
		Telefono: ".$telefono."
 		Mensaje: ".$contenido." ";

		mail($para,$asunto,utf8_decode($mensaje));
 
		echo ' <script language="javascript">alert("El mensaje fue enviado correctamente");</script>';
		echo "<script>location.href='http://www.ejme.com.ve/#sec5'</script>";
	} else { echo "error"; }





} else {
 echo ' <script language="javascript">alert("rellene todo los campos");</script>';
 echo "<script>location.href='http://www.ejme.com.ve/#sec5'</script>";
}