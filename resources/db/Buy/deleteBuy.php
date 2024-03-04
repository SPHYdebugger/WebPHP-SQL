<?php
require('../connect-db.php');


if (isset($_GET['id']) && is_numeric($_GET['id'])) {

    $id = $_GET['id'];

    try {

        $stmt = $dbh->prepare('DELETE FROM buys WHERE ID = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            echo "Compra eliminado exitosamente.";
            header("Location: ../../../buys.php");
        } else {
            echo "No se encontró ninguna compra con el ID proporcionado.";
        }
    } catch (PDOException $e) {
        echo "ERROR: " . $e->getMessage();
    }
}


