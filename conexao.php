<?php
    $hostname = "localhost";
    $bdnome = "formulario";
    $usuario = "root";
    $bdpass = "";

    $con = new mysqli($hostname, $usuario, $bdpass, $bdnome);
    //cria e verifica a conexão
    if($con->connect_error){
        echo("Erro ao conectar com o Banco de Dados: ". $con->connect_error);
    }

?>