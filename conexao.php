<?php

$host = "localhost";		//127.0.0.1
$usuario = "root";
$senha = "";
$banco = "loja";

$conexao = new mysqli($host, $usuario, $senha, $banco);

if ($conexao->connect_error) {
	echo "Houve falha na conexão.";
}
