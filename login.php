<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
 <form method="post">
       
       <label for="email">Email:</label>
       <input type="email" name="email" required><br> 

       <input type="submit">
    </form>
</body>
</html>

<?php

require_once "C:/xampp/htdocs/ticketplus/DB/Database.php";
require_once "C:/xampp/htdocs/ticketplus/Controller/ParticipanteController.php";

$ParticipanteController = new ParticipanteController($pdo);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];

    $ParticipanteController->fazerLogin($email);
}

