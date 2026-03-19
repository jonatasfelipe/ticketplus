<?php

require_once "C:/xampp/htdocs/ticketplus/DB/Database.php";
require_once "C:/xampp/htdocs/ticketplus/Controller/ParticipanteController.php";

$ParticipanteController = new ParticipanteController($pdo);

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $participante = $ParticipanteController->buscarParticipante($id);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Participante</title>
</head>
<body>
    <form method="post">
       <label for="nome">Nome:</label>
       <input type="text" name="nome" value="<?=$participante['nome'];?>" required><br> 
       
       <label for="email">Email:</label>
       <input type="email" name="email" value="<?=$participante['email'];?>" required><br> 
       
       <label for="telefone">Telefone:</label>
       <input type="text" name="telefone" value="<?=$participante['telefone'];?>" required><br> 

       <input type="submit">
    </form>
</body>
</html>
<?php
} else {
    header('Location: listar.php');
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $ParticipanteController->editar($nome, $email, $telefone, $id);

    header('Location: ../../index.php');
}

?>








