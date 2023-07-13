<?php 
//mysqli_report(MYSQLI_REPORT_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try{
    $servidor = 'localhost';
    $usuario = 'root';
    $password = '';
    $banco = 'bancolog';

    $mysqli = new mysqli($servidor, $usuario, $password, $banco);
	$mysqli->set_charset('utf8');


	if (mysqli_connect_errno()){ 
		trigger_error(mysqli_connect_error());
    }

	else{
	}
}
catch (Exception $e) {
    echo $e->getMessage();
}
    


?>