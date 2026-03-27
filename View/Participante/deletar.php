<?php

require_once "C:/xampp/htdocs/ticketplus/DB/Database.php";
require_once "C:/xampp/htdocs/ticketplus/Controller/ParticipanteController.php";

$ParticipanteController = new ParticipanteController($pdo);

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $participante = $ParticipanteController->deletar($id);

    if($participante['success'] == false){
        echo "<script>
        alert('{$participante['message']}');
        window.location = '../../index.php';
        </script>";
    } else {
        echo "<script>
        alert('{$participante['message']}');
        window.location = '../../index.php';
        </script>";
    }
    
} else {
    echo "<script>
    window.location = '../../index.php';
    </script>";
}
?>