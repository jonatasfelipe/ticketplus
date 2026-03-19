<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Evento</title>
</head>
<body>
    <form method="post">
       <label for="nome">Nome:</label>
       <input type="text" name="nome" required><br> 
       
       <label for="descricao">Descrição:</label>
       <input type="text" name="descricao" required><br> 
       
       <label for="data">Data:</label>
       <input type="date" name="data" required><br> 

       <label for="hora">Hora:</label>
       <input type="time" name="hora" required><br> 

       <label for="local">Local:</label>
       <input type="text" name="local" required><br> 

       <label for="numeromaxparticipantes">Número máximo de participantes:</label>
       <input type="number" name="numeromaxparticipantes" required><br> 

       <input type="submit">
    </form>
</body>
</html>

<?php

require_once "C:/xampp/htdocs/ticketplus/DB/Database.php";
require_once "C:/xampp/htdocs/ticketplus/Controller/EventoController.php";

$EventoController = new EventoController($pdo);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $data = $_POST['data'];
    $hora = $_POST['hora']; 
    $local = $_POST['local'];
    $numeromaxparticipantes = $_POST['numeromaxparticipantes'];

    $EventoController->cadastrar($nome, $descricao, $data, $hora, $local, $numeromaxparticipantes);
    header('Location: ../../index.php');
}










