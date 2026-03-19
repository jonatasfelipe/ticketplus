<?php
require_once "DB/Database.php";
require_once "Controller/EventoController.php";
require_once "Controller/ParticipanteController.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$eventoController = new EventoController($pdo);
$participanteController = new ParticipanteController($pdo);

$eventos = $eventoController->listar();
$participantes = $participanteController->listar();