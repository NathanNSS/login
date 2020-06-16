<?php 
//conexão ao Banco
require_once 'conectBD.php';

// sessão global
session_start();
// Sai da sessão ao clicar no botão
if(isset($_POST['Sair'])){
    session_start();
    session_unset();
    session_destroy();
    header('Location: index.php');
}
// verificação de Autorização 
if(!$_SESSION['logado'] == true ){
    header("location:index.php");
}

//Pegando o id e buscando no banco
$id = $_SESSION['id_usuario'];
$sqlBuscUser = "SELECT * FROM usuario WHERE id = '$id'";
$resultado = mysqli_query($linkBD, $sqlBuscUser);
$dados = mysqli_fetch_array($resultado);
mysqli_close($linkBD);



?>
<!DOCTYPE html>
<head>
    <title>Conteudo Exclusivo!</title>
    <meta charset="utf-8">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="node_modules\materialize-css\dist\css\materialize.css"  media="screen,projection"/>

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
    <div class="right">
        <form  action="<?php echo $_SERVER['PHP_SELF']?>" class="login-form"  method="POST">

            <button type="submit" class="btn red z-depth-5" name="Sair"><i class="material-icons">exit_to_app</i></button>
        
        </form>
    </div>
    <div class="row">
    <div class="col push-l4 l4 pull-l4 push-s1 s10 pull-s1">
      <div class="card-panel z-depth-5 ">
        <span class="">
            <h1>Bem Vindo <?php echo $dados['nome']; ?></h1>
        </span>
      </div>
    </div>
  </div>
    


 <!--JavaScript at end of body for optimized loading-->
 <script type="text/javascript" src="node_modules\materialize-css\dist\js\materialize.js"></script>
</body>
</html>