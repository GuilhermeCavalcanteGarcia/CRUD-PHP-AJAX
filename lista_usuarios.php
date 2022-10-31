<?php
require_once("conexao.php");

$sql = "SELECT id, nome, email, atividade  FROM usuario";

$consulta = $conexao->query($sql);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Lista de Usuários</title>
    <meta charset="UTF-8" />
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" type="text/css" />

    <script>
        function confirma(id) {
            var ok = confirm("Deseja realmente excluir este registro?");
            if (ok) {
                $.post("excluir_dados.php", {
                    id: id
                }, function(result) {
                    /*
                    var painel = '#linha' + id;
                    $(painel).remove();
                    */
                    alert(result);
                    location.reload();
                });

            } else {
                return false;
            }

        }
    </script>
</head>

<body style="background-color : #FAEBD7">
    <center>
        <div id="page">
            <h1>Usuários</h1>

            <table id="usuarios" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Atividade</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($linha = mysqli_fetch_array($consulta)) {
                        echo "<tr id='linha{$linha['id']}'>";
                        echo "<td>" . $linha['id'] . "</td>";
                        echo "<td>" . $linha['nome'] . "</td>";
                        echo "<td>" . $linha['email'] . "</td>";
                        echo "<td>" . $linha['atividade'] . "</td>";
                        echo "<td><a href='editar_usuario.php?id={$linha['id']}'>Editar</a></td>";
                        echo "<td><a href='javascript:confirma({$linha['id']});'>Excluir</a></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Atividade</th>
                        <th></th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>

            <script>
                $(document).ready(function() {
                    $('#usuarios').DataTable({
                        "language": {
                            "url": "//cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json"
                        }
                    });
                });
            </script>

        </div>


</body>

</html>