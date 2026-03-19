<?php

require_once "C:/xampp/htdocs/ticketplus/DB/Database.php";
require_once "C:/xampp/htdocs/ticketplus/Controller/EventoController.php";

$EventoController = new EventoController($pdo);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $evento = $EventoController->buscarEvento($id);
    ?>
    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar Evento</title>
    </head>

    <body>
        <form method="post">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" value="<?= $evento['nome']; ?>"required><br>

            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" value="<?= $evento['descricao']; ?>"required><br>

            <label for="data">Data:</label>
            <input type="date" name="data" value="<?= $evento['data']; ?>" required><br>

            <label for="hora">Hora:</label>
            <input type="time" name="hora" value="<?= $evento['hora']; ?>" required><br>

            <label for="local">Local:</label>
            <input type="text" name="local" value="<?= $evento['local']; ?>" required><br>

            <label for="numeromaxparticipantes">Número máximo de participantes:</label>
            <input type="number" name="numeromaxparticipantes" value="<?= $evento['numeromaxparticipantes']; ?>" required><br>

            <input type="submit">
        </form>
    </body>

    </html>
    <?php
} else {
    header('Location: listar.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $data = $_POST['data'];
    $hora = $_POST['hora']; 
    $local = $_POST['local'];
    $numeromaxparticipantes = $_POST['numeromaxparticipantes'];

    $EventoController->editar($nome, $descricao, $data, $hora, $local, $numeromaxparticipantes, $id);

    header('Location: ../../index.php');
}

?>