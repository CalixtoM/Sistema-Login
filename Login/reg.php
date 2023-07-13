<!-- conexão com banco -->
<?php
session_start();
include('conecta.php');

if(isset($_POST['nome'])){
  try{

    $senhacrip = hash('sha256', $_POST['password']);

    /* $sql Insere dados no banco */
    $stmt = $mysqli->prepare("INSERT INTO tb_usuario (nm_usuario, ds_email, ds_senha) VALUES (?, ?, ?)");
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $stmt->bind_param("sss", $nome, $email, $senhacrip);
    $stmt->execute();

  }catch(Exception $e){
    echo $e->getMessage();
  }

}

?>

<!DOCTYPE html>
<html>
  <head>
  	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <title></title>
  </head>

  <script>
      function verificaForcaSenha() 
      {
      	var numeros = /([0-9])/;
      	var alfabeto = /([a-zA-Z])/;
      	var chEspeciais = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;

      	if($('#inputPassword').val().length<6 || document.getElementById("inputPassword").value == ""){
      		$('#password-status').html("<span style='color:red'><i class='bi bi-x-circle-fill'> 	Fraca</i></span>");
      	}else {  	
      		if($('#inputPassword').val().match(numeros) && $('#inputPassword').val().match(alfabeto) && $('#inputPassword').val().match(chEspeciais)){            
      			$('#password-status').html("<span style='color:green'><b><i class='bi bi-check-circle-fill'></i>	 Forte</b></span>");
      		} else {
      			$('#password-status').html("<span style='color:orange'><i class='bi bi-exclamation-diamond-fill'></i> 	Médio</span>");
      		}
      	}

      }
      </script>	

  <body class="text-center">
    <div id="formulario" class="container text-center">
      <!--<form class="form-signin" method="post">--> 
      <div class="row" class="line">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
          <h1 id="title" class="h3 mb-3 font-weight-normal" >Registro</h1>
        </div>
      </div>
      <form method="post">
      <div class="row" class="line">
        <div class="col-sm-12">
          <label for="inputEmail" class="sr-only">Nome</label>
          <input type="text" id="inputEmail" name="nome" class="form-control" placeholder="Nome" required="" autofocus="">
        </div>
      </div>

      <div class="row" class="line">
        <div class="col-sm-12">
          <label for="inputEmail" class="sr-only">Email</label>
          <input type="email" id="inputEmail" name="email" class="form-control" placeholder="E-mail" required="" autofocus="">
        </div>
      </div>

      <div class="row" class="line">
        <div class="col-sm-12">
          <label for="inputPassword" class="sr-only">Senha</label>
          <input type="password" name="password" id="inputPassword"  class="form-control" placeholder="Senha" required="" minlength="6" maxlength="12" onkeydown="verificaForcaSenha();">
        </div>
      </div>

      <div class="row" class="line">
      	
        <div class="col-sm-4" style="background-color: #dcdbfc; border-radius: 4%;">
          <span id="password-status"></span>
        </div>
      </div>     

      <div class="row" class="line">
        <div class="col-sm-12">
          <a href="index.php" id="r"><p>Login</p></a>
        </div>
      </div>
      
      <div class="row" class="line">
        <div class="col-sm-12">
          <input class="btn btn-lg btn-primary btn-block" id="button" type="submit" value="Registrar">
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

        <!-- <?php echo '<p class="mt-5 mb-3 text-muted" style="color: white;">© 2019-'.date('Y').'</p>'  ?>--> 
      </form>
    </div>
  </body>

</html>


<style type="text/css">

  html {
    position:fixed;
    width:100%;
    height:100%;
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

  #inputEmail{
    margin-bottom: 5%;
  }

  #inputPassword{
  	margin-bottom: 2%;
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