<?php
require('../connect-db.php');

/*comprobamos si la variable "id" está configurada en la
URL, y comprobamos que es válida */
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
// obtener el valor de ID mediante el método GET
    $id = $_GET['id'];

    try {
        // Preparar la consulta para borrar el producto con el ID específico
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


