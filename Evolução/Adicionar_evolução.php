<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="../config.css" />
    <title>
        Adicionar Evolução
    </title>
    <meta charset="utf-8">
</head>

<body>
    <?php
    include_once '../php_action/db_connect.php';
    include_once '../includes/header.php';
    $id = mysqli_escape_string($connect, $_GET['id']);
    ?>
    <h4>Nova Evolução</h4>
    <form action="evolução_action/create_evolução.php" method="GET">
        <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
        <div class="input-field">
            <label for="nome_evolução">Nome</label>
            <input type="text" name="nome_evolução" id="nome_evolução">
        </div>
        <div style="padding-top: 5%; padding-bottom: 3%;">
            <div style="display: inline-block">
                <a href="Tabela_evolução.php?id=<?php echo $id ?>" class="btn-floating green lighten-2"><i class="material-icons">keyboard_backspace</i></a>
            </div>
            <div style="display: inline-block; padding-left:42.5%;">
                <input type="submit" name="btn-cadastrar" class="btn green lighten-1" value="CONCLUIR">
            </div>
        </div>
    </form>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>