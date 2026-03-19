<?php
require_once "C:/xampp/htdocs/ticketplus/Model/EventoModel.php";
class EventoController {
    private $eventoModel;
   
    public function __construct($pdo) {
        $this->eventoModel = new EventoModel($pdo);

    }
    public function listar() {
        $eventos = $this->eventoModel->buscarTodos();
        include_once "C:/xampp/htdocs/ticketplus/View/Evento/listar.php";
        return;
    }

    public function buscarEvento($id){
        $evento = $this->eventoModel->buscarEvento($id);
        return $evento;
    }

    public function cadastrar($nome, $descricao, $data, $hora, $local, $numeromaxparticipantes){
        $this->eventoModel->cadastrar($nome, $descricao, $data, $hora, $local, $numeromaxparticipantes);
    }
    
    public function editar($nome,$descricao, $data, $hora, $local, $numeromaxparticipantes, $id){
        $this->eventoModel->editar($nome, $descricao, $data, $hora, $local, $numeromaxparticipantes, $id);

    }

    public function deletar($id){
        $evento = $this->eventoModel->deletar($id);
        return $evento;
    }

}








