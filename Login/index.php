<?php
session_start();
include('conecta.php');

if(isset($_POST['em'], $_POST['pw'])) {

  $senha = hash('sha256', $_POST['pw']);

	$sql = "SELECT * FROM tb_usuario WHERE ds_email = '".$_POST['em']."' AND ds_senha = '".$senha."'";

	if($query = $mysqli->query($sql)){
		$obj = $query->fetch_object();
		if ($query->num_rows>0) {
			$_SESSION['nm'] = $obj->nm_usuario;
			header('location: inicio.php');
		}
	}
	else{
		echo "falha";
	}
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <title></title>
  </head>

  <body class="text-center">
    <div id="formulario" class="container text-center">
      <!--<form class="form-signin" method="post">--> 
      <div class="row" class="line">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
          <h1 id="title" class="h3 mb-3 font-weight-normal" >Login</h1>
        </div>
      </div>

      <div class="row" class="line">
        <div class="col-sm-12">
          <label for="inputEmail" class="sr-only">Email</label>
          <input type="email" id="inputEmail" name="em" class="form-control" placeholder="E-mail" required="" autofocus="">
        </div>
      </div>

      <div class="row" class="line">
        <div class="col-sm-12">
          <label for="inputPassword" class="sr-only">Senha</label>
          <input type="password" name="pw" id="inputPassword"  class="form-control" placeholder="Senha" required="">
        </div>
      </div>

      <div class="row" class="line">
        <div class="col-sm-12">
          <a href="reg.php" id="r"><p>Registre-se</p></a>
        </div>
      </div>
      
      <div class="row" class="line">
        <div class="col-sm-12">
          <input class="btn btn-lg btn-primary btn-block" id="button" type="submit" value="Login">
        </div>
      </div>

      <div class="row" class="line">
        <div class="col-sm-12">
          <script type="text/javascript">
            const date = new Date();
            console.log(date);

            let year = date.getFullYear();
            console.log(year);
          </script>

          <script>
            document.write("<p class='mt-5 mb-3 text-muted' style='color: white;'>© 2019-"+year+"</p>")
          </script>
        </div>
      </div>
      </form>
    </div>
  </body>

</html>


<style type="text/css">

  html {
    height: 100%;
  }

  body{
    background: rgb(2,0,36);
    background: linear-gradient(141deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
    min-height: 100%;
  }


  #title{
    color: black;
    padding-top: 10%;
  }

  #formulario{
    margin-top: 10%;
    width: 400px;
    height: 100%;
    background-color: #DCDBFC;
    color: white;
    box-shadow: 2px 2px 4px #000000;
    border-radius: 1%;
  }

  #inputEmail, #inputPassword{
    margin-bottom: 5%;
  }

  h1{
    color: white;
  }

  #button{
    background-color: #00d4ff;
    border-color: #00d4ff;
  }

  #button:hover{
    background-color: #009dbd;
    border-color: #009dbd;
  }

  /*#r{
    color: darkred;
  }*/

</style>