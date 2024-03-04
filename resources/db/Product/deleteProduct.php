<?php
require('../connect-db.php');


if (isset($_GET['id']) && is_numeric($_GET['id'])) {

    $id = $_GET['id'];

    try {

        $stmt = $dbh->prepare('DELETE FROM products WHERE ID = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            echo "Producto eliminado exitosamente.";
            header("Location: ../../../products.php");
        } else {
            echo "No se encontró ningún producto con el ID proporcionado.";
        }
    } catch (PDOException $e) {
        echo "ERROR: " . $e->getMessage();
    }
}


