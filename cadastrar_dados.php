<?php

require_once("conexao.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = sha1($_POST['senha']);
$atividade = $_POST['atividade'];

/*
echo $nome;
echo "<br/>"; 
echo $email;
echo "<br/>"; 
echo $senha;
echo "<br/>"; 
echo $atividade;
echo "<br/>"; 
*/

$consulta = $conexao->prepare("INSERT INTO usuario
(nome, email, senha, atividade) VALUES (?,?,?,?)");

$consulta->bind_param("ssss", $nome, $email, $senha, $atividade);

$consulta->execute();

echo "Cadastro realizado com sucesso!";
