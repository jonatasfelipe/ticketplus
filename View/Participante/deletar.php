<?php

require_once "C:/xampp/htdocs/ticketplus/DB/Database.php";
require_once "C:/xampp/htdocs/ticketplus/Controller/ParticipanteController.php";

$ParticipanteController = new ParticipanteController($pdo);

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $participante = $ParticipanteController->deletar($id);
    header('Location: ../../index.php');
} else {
    header('Location: ../../index.php');
}
?>