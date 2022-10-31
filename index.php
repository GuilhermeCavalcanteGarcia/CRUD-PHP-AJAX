<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Formulário de Cadastro de Usuário</title>
    <meta charset="UTF-8" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body style="background-color : #FAEBD7;">

    <center>
        <h1>Formulário de Cadastro</h1>
        <br /><br />
        <form action="cadastrar_dados.php" name="frmCadastro" id="frmCadastro" class="form-group">
            Nome:
            <input type="text" name="nome" required><br /><br />
            E-mail:
            <input type="email" name="email" required><br /><br />
            Senha:
            <input type="password" name="senha" required><br /><br />
            Atividade:
            <select name="atividade">
                <option></option>
                <option value="1">Ativo</option>
                <option value="0">Inativo</option>
            </select><br /><br /><br />
            <button type="submit" id="cadastrar">Cadastrar</button>
        </form>
        <br />
        <div id="simple-msg"></div>

        <script>
            $(function() {

                $("#cadastrar").click(function() {

                    $("#frmCadastro").submit(function(e) {

                        var postData = $(this).serializeArray();
                        var formURL = $(this).attr("action");
                        $.ajax({
                            url: formURL,
                            type: "POST",
                            data: postData,
                            success: function(data, textStatus, jqXHR) {
                                $("#simple-msg").html(data);
                                $('#frmCadastro')[0].reset();

                            },
                            error: function(jqXHR, textStatus, errorThrown) {

                                var error = textStatus + '<br/>' + errorThrown;
                                $("#simple-msg").html(error);
                            }
                        });
                        e.preventDefault(); //STOP default action
                        e.unbind();
                    });

                });

            });
        </script>
</body>

</html>