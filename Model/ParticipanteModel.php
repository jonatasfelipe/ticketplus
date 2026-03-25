<?php

class ParticipanteModel {
    private $pdo;
    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    public function buscarTodos(){
        $stmt = $this->pdo->query("SELECT * FROM participantes");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function buscarParticipante($id){
        $stmt = $this->pdo->query("SELECT * FROM participantes WHERE id = $id");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function cadastrar($nome, $email, $telefone) {
        $sql = "INSERT INTO participantes (nome, email, telefone) VALUES (:nome, :email, :telefone)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':nome' => $nome,
            ':email' => $email,
            ':telefone' => $telefone
        ]);
    }
    public function editar($nome, $email, $telefone, $id) {
        $sql = "UPDATE participantes SET nome=?, email=?, telefone=? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nome, $email, $telefone, $id]);
    }

    public function deletar($id) {
        $sql = "DELETE FROM participantes WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }

     public function verificarInscricao($id_participante, $id_evento){
        $stmt = $this->pdo->prepare("SELECT COUNT(*) as inscricoes FROM participanteporevento WHERE id_participante = ? AND id_evento = ?");
        $stmt->execute([$id_participante, $id_evento]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function fazerInscricao($id_participante, $id_evento) {
        $sql = "INSERT INTO participanteporevento (id_participante, id_evento) VALUES (:id_participante, :id_evento)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':id_participante' => $id_participante,
            ':id_evento' => $id_evento,
       ]);
    }

      public function fazerLogin($email){
        $stmt = $this->pdo->prepare("SELECT * FROM participantes WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
}