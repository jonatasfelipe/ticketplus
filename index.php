<?php
require_once "DB/Database.php";
require_once "Controller/EventoController.php";
require_once "Controller/ParticipanteController.php";



if ($_SESSION == null) {
    header('Location: login.php');
}

$eventoController = new EventoController($pdo);
$participanteController = new ParticipanteController($pdo);

$eventos = $eventoController->listar();
$participantes = $participanteController->listar();