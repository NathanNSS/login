<?php
$host = "localhost";
$user = "root";
$pass = "";
$BDname = "login";
$linkBD = mysqli_connect($host,$user,$pass,$BDname);
mysqli_set_charset($linkBD,"utf8");
    if(!$linkBD){
        die("Falha Na Conexão: " . mysqli_connect_error());
    }
    else{
        $_SESSION['statusBD'] = "<br> Conectado com Sucesso! <br>";
    }


?>