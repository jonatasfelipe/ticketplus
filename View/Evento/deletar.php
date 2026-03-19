<?php

require_once "C:/xampp/htdocs/ticketplus/DB/Database.php";
require_once "C:/xampp/htdocs/ticketplus/Controller/EventoController.php";

$EventoController = new EventoController($pdo);

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $evento = $EventoController->deletar($id);
    header('Location: ../../index.php');
} else {
    header('Location: ../../index.php');
}
?>