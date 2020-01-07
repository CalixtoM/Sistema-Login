<!-- conexão com banco -->
<?php
session_start();
include('conecta.php');

if(isset($_POST['nm'])){

/* $sql Insere dados no banco */
$sql = "INSERT INTO tb_usuario VALUES (null, '".$_POST['nm']."', '".$_POST['em']."', '".$_POST['pw']."')";


 $query = "SELECT * FROM tb_usuario";

/*Registra os dados e Redireciona para a pagina de login*/
 if ($query = $mysqli->query($sql)){
 	echo "funcionou";
 	header("location: index.php");
 }

/* Caso não funcionar, exibe o erro*/ 						 
 else{
 	printf("Erro obtido: %s\n", $mysqli->error);
 }

 }

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<!-- Links Bootstrap-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<title>Login</title>
</head>
<body>
<form method="post">
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<h4>Nome:</h4><input type="text" name="nm" class="form-control">
			</div>
			<div class="col-sm-4">
				<h4>Email:</h4><input type="email" name="em" class="form-control">
			</div>
			<div class="col-sm-4">
				<h4>Senha:</h4><input type="password" name="pw" class="form-control">
			</div>
		</div><br><br>
		<div class="row" id="c">
			<input type="submit" name="bt" class="btn btn-success" value="registrar">
		</div>
	</div>
</form>

</body>
</html>

<style type="text/css">
	#c{
	}
</style>