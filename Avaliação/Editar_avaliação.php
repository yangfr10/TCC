<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="../config.css" />
    <title>
        Editar Avaliação
    </title>
    <meta charset="utf-8">
</head>

<body>

    <?php
    include_once '../php_action/db_connect.php';
    include_once '../includes/header.php';
    $id = mysqli_escape_string($connect, $_GET['id']);
    $id_avaliação = mysqli_escape_string($connect, $_GET['id_avaliação']);
    $sql = "SELECT * FROM avaliacao WHERE Id_avaliacao = '$id_avaliação'";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);
    ?>
    <h4>Editar Avaliação</h4>
    <form action="avaliação_action/update_avaliação.php" method="GET">
        <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
        <input type="hidden" name="id_avaliação" id="id_avaliação" value="<?php echo $dados['Id_avaliacao']; ?>">
        <div class="input-field">
            <label for="nome_avaliação">Nome</label>
            <input type="text" name="nome_avaliação" id="nome_avaliação" value="<?php echo $dados['Nome_avaliacao']; ?>" required>
        </div>
        <div style="padding-top: 5%; padding-bottom: 3%;">
            <div style="display: inline-block">
                <a href="Tabela_avaliação.php?id=<?php echo $id ?>" class="btn-floating green lighten-2"><i class="material-icons">keyboard_backspace</i></a>
            </div>
            <div style="display: inline-block; padding-left:42.5%;">
                <input type="submit" name="btn-cadastrar" class="btn green lighten-1" value="CONCLUIR">
            </div>
        </div>
    </form>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script>
</body>

</html>