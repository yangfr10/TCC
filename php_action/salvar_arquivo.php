<?php
session_start();
require_once 'db_connect.php';
$id = $_POST['id'];
if (isset($_POST['btn'])) {
    $arquivo = $_FILES['arquivo'];
    $foto = $_FILES['arquivo']['name'];

    $arquivo = explode('.', $arquivo['name']);
    if (($arquivo[sizeof($arquivo) - 1] != 'jpg') && ($arquivo[sizeof($arquivo) - 1] != 'png') && ($arquivo[sizeof($arquivo) - 1] != 'jpeg')) {
        $_SESSION['mensagem'] = 'Você não pode fazer upload deste tipo de arquivo';
        header("Location: ../prontuario.php");
    } else {
        move_uploaded_file($_FILES['arquivo']['tmp_name'], '../uploads/' . $_FILES['arquivo']['name']);
        $sql = "INSERT INTO arquivo (foreign_key, nome, prontuario) VALUES ('$id', '$foto', 1)";
        $query = mysqli_query($connect, $sql);
        $_SESSION['mensagem'] = "Upload realizado com sucesso";
        if (!$query) {
            $_SESSION['mensagem'] = "Não foi possível anexar a imagem tente novamente";
        }
        header("Location: ../prontuario.php");
    }
}
header("Location: ../prontuario.php?id=".$_POST['id']);
