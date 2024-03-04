<?php
require ('../connect-db.php');

$id_del_producto = $_GET['id'];

try {
    $stmt = $dbh->prepare("SELECT imagen FROM products WHERE ID = :id");
    $stmt->bindParam(':id', $id_del_producto, PDO::PARAM_INT);
    $stmt->execute();

    // Obtener la imagen como un blob
    $imagen_blob = $stmt->fetchColumn();

    // Configurar las cabeceras para que el navegador entienda que está recibiendo una imagen
    header('Content-Type: image/jpeg');
    // Devolver la imagen
    echo $imagen_blob;
} catch (PDOException $e) {
    echo "Error al mostrar la imagen: " . $e->getMessage();
}
?>

