<?php
require('../connect-db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteClient'])) {
    // Obtener el ID del cliente que se va a borrar
    $IDToDelete = $_POST['deleteClient'];

    try {
        // Preparar la consulta para borrar el cliente con el DNI específico
        $stmt = $dbh->prepare('DELETE FROM clients WHERE ID = :ID');
        $stmt->bindParam(':ID', $IDToDelete, PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            echo "Cliente eliminado exitosamente.";
            header("Location: ../../../clients.php");
        } else {
            echo "No se encontró ningún cliente con el ID proporcionado.";
        }
    } catch (PDOException $e) {
        echo "ERROR: " . $e->getMessage();
    }
}

