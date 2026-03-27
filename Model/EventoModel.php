<?php
class EventoModel {
    private $pdo;
    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    public function buscarTodos(){
        $stmt = $this->pdo->query("SELECT * FROM eventos");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function buscarEvento($id){
        $stmt = $this->pdo->query("SELECT * FROM eventos WHERE id = $id");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function cadastrar($nome, $descricao, $data, $hora, $local, $numeromaxparticipantes) {
        $sql = "INSERT INTO eventos (nome, descricao, data, hora, local, numeromaxparticipantes) VALUES (:nome, :descricao, :data, :hora, :local, :numeromaxparticipantes)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':nome' => $nome,
            ':descricao' => $descricao,
            ':data' => $data,
            ':hora' => $hora,
            ':local' => $local,
            ':numeromaxparticipantes' => $numeromaxparticipantes
        ]);
    }
    public function editar($nome, $descricao, $data, $hora, $local, $numeromaxparticipantes, $id) {
        $sql = "UPDATE eventos SET nome=?, descricao=?, data=?, hora=?, local=?, numeromaxparticipantes=? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nome, $descricao, $data, $hora, $local, $numeromaxparticipantes, $id]);
    }

    public function deletar($id) {
        try {
            $sql = "DELETE FROM eventos WHERE id = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);
    
            return [
                "success" => true,
                "message" => "Evento deletado com sucesso."
            ];
    
        } catch (PDOException $e) {
    
            // Código 23000 = erro de integridade (FK, etc)
            if ($e->getCode() == '23000') {
                return [
                    "success" => false,
                    "message" => "Não é possível excluir este evento pois ele está vinculado a outros registros."
                ];
            }
    
            return [
                "success" => false,
                "message" => "Erro ao deletar evento."
            ];
        }
    }

    public function verificarDisponibilidade($id_evento){
        $stmt = $this->pdo->prepare("SELECT COUNT(*) as jainscritos FROM participanteporevento WHERE id_evento = ?");
        $stmt->execute([$id_evento]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
}