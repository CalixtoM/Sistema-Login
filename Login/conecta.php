<?php

$servidor = 'localhost';
$usuario = 'root';
$senha = 'usbw';
$banco = 'bancolog';
$mysqli = new mysqli($servidor, $usuario, $senha, $banco);


if (mysqli_connect_errno()) 
	trigger_error(mysqli_connect_error());

else{
	echo "Conectou ";
}


?>