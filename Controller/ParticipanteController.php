<?php
session_start();
require_once "C:/xampp/htdocs/ticketplus/Model/EventoModel.php";
require_once "C:/xampp/htdocs/ticketplus/Model/ParticipanteModel.php";
class ParticipanteController
{
    private $participanteModel;
    private $eventoModel;

    public function __construct($pdo)
    {
        $this->eventoModel = new EventoModel($pdo);
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

    public function verificarInscricao($id_participante, $id_evento)
    {
        $verificainscricao = $this->participanteModel->verificarInscricao($id_participante, $id_evento);
        return $verificainscricao;
    }

    public function fazerInscricao($id_participante, $id_evento)
    {
        $inscrito = $this->verificarInscricao($id_participante, $id_evento);

        $vagas = $this->eventoModel->buscarEvento($id_evento);
        //var_dump($vagas['numeromaxparticipantes']);

        $jainscritos = $this->eventoModel->verificarDisponibilidade($id_evento);

        if ($inscrito['inscricoes'] > 0) {
            return $mensagem = "Você já está inscrito!";
        } elseif ($jainscritos['jainscritos'] >= $vagas['numeromaxparticipantes']) {
            return $mensagem = "Evento Lotado!";
        } else {

            $this->participanteModel->fazerInscricao($id_participante, $id_evento);
            return $mensagem = "Inscrição Realizada com sucesso!";
        }
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








