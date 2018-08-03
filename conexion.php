<?php

function conectar(){

$dsn = 'localhost';
$nombre_usuario = 'ejmeenet_root';
$contraseña = '2664265';
$BD = "ejmeenet_blog";
$con = mysqli_connect($dsn, $nombre_usuario, $contraseña,$BD);

if (!$con){
	
	die("connection failed:". mysqli_connect_error());
	
}
return $con; 

}
?>