<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="config.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <title>
        Adicionar Paciente
    </title>
    <meta charset="utf-8">
</head>

<body>
    <?php include_once 'includes/header.php'; ?>
    <main>
        <div style="padding-left: 2%;">
            <h4>Novo Paciente</h4>
        </div>
        <form action="php_action/create.php" method="GET">
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">account_circle</i>
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" required>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">email</i>
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">people</i>
                    <label for="cpf">CPF</label>
                    <input type="text" name="cpf" id="cpf">
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">person</i>
                    <label for="idade">Idade</label>
                    <input type="number" name="idade" id="idade">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">phone</i>
                    <label for="telefone">Telefone</label>
                    <input type="number" name="telefone" id="telefone">
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">home</i>
                    <label for="endereço">Endereço</label>
                    <input type="text" name="endereço" id="endereço">
                </div>
            </div>

            <div style="padding-top: 3%; padding-bottom: 3%;">
                <div style="display: inline-block">
                    <a href="index.php" class="btn-floating green lighten-2"><i class="material-icons">keyboard_backspace</i></a>
                </div>
                <div style="display: inline-block; padding-left:42.5%;">
                <input type="submit" name="btn-cadastrar" class="btn green lighten-1" value="CONCLUIR">
                </div>
            </div>
        </form>
    </main>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>