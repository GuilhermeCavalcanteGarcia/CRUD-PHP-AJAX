<?php
require_once("conexao.php");

if (isset($_POST['id'])) {
    $codigo = (int)$_POST['id'];

    $sql = "DELETE FROM usuario WHERE id = {$codigo}";

    $conexao->query($sql);

    echo "Usuário excluído com sucesso.";
}
