<?php

include_once("conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITILE_STRING);
$sobrenome = filter_input(INPUT_POST, 'sobrenome', FILTER_SANITILE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITILE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITILE_STRING);


$result_usuario = "INSERT INTO usuarios (nome, sobrenome, email, senha, created) VALUES ($nome, $sobrenome, $email, $senha, NOW())";
$resultado_usuario = mysqli_query($conn, $result_usuario);
   
?>
