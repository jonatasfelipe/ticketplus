<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once "C:/xampp/htdocs/ticketplus/DB/Database.php";
require_once "C:/xampp/htdocs/ticketplus/Controller/ParticipanteController.php";

global $pdo;
$participantelogado = $_SESSION['participante']['id']; 

$ParticipanteController = new ParticipanteController($pdo);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id_evento = $_POST['id_evento'];

    $validaInscricao = $ParticipanteController->fazerInscricao($participantelogado, $id_evento);
    echo "<h1> $validaInscricao </h1>";
    //header('Location: index.php');
}


if (empty($eventos)) {
    echo "<p>Nenhum evento encontrado!</p>";
    echo "<a href='View/Evento/cadastrar.php'>Cadastrar</a>";
    return;
}

echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><td><a href='View/Evento/cadastrar.php'>Cadastrar</a></td></tr>";
echo "<tr><th>ID</th><th>Nome</th><th>Descrição</th><th>Data</th><th>Hora</th><th>Local</th><th>Nº Máx Participantes</th><th>Ações</th></tr>";

foreach ($eventos as $evento) {
    $id = $evento['id'];
    echo "<tr>";
    echo "<td>{$id}</td>";
    echo "<td>{$evento['nome']}</td>";
    echo "<td>{$evento['descricao']}</td>";
    echo "<td>{$evento['data']}</td>";
    echo "<td>{$evento['hora']}</td>";
    echo "<td>{$evento['local']}</td>";
    echo "<td>{$evento['numeromaxparticipantes']}</td>";
    echo "<td>";
    echo "<form method='POST'>";
    echo "<input type='hidden' value='{$id}' name='id_evento'>";
    echo "<input type='submit' value='Inscrever-se'>";
    echo "</form>";
    echo "<a href='View/Evento/editar.php?id={$id}'>Editar</a> |
                <a href='View/Evento/deletar.php?id={$id}' onclick=\"return confirm('Tem certeza que deseja excluir este evento?')\">Deletar</a>
            </td>";
    echo "</tr>";
}
echo "</table>";