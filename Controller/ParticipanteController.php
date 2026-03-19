<?php
session_start();
require_once "C:/xampp/htdocs/ticketplus/Model/ParticipanteModel.php";
class ParticipanteController
{
    private $participanteModel;

    public function __construct($pdo)
    {
        $this->participanteModel = new ParticipanteModel($pdo);

    }
    public function listar()
    {
        $participantes = $this->participanteModel->buscarTodos();
        include_once "C:/xampp/htdocs/ticketplus/View/Participante/listar.php";
        return;
    }

    public function buscarParticipante($id)
    {
        $participante = $this->participanteModel->buscarParticipante($id);
        return $participante;
    }

    public function cadastrar($nome, $email, $telefone)
    {
        $this->participanteModel->cadastrar($nome, $email, $telefone);
    }

    public function editar($nome, $email, $telefone, $id)
    {
        $this->participanteModel->editar($nome, $email, $telefone, $id);

    }

    public function deletar($id)
    {
        $participante = $this->participanteModel->deletar($id);
        return $participante;
    }

    public function fazerInscricao($id_participante, $id_evento)
    {
        $this->participanteModel->fazerInscricao($id_participante, $id_evento);
    }

    public function fazerLogin($email)
    {
        $participantelogado = $this->participanteModel->fazerLogin($email);

        if ($participantelogado['nome'] == null) {
            header("Location: login.php");
        } else {
            $_SESSION["participante"] = $participantelogado;
            header("Location: index.php");
        }
    }

}








