<?php


require('resources/db/connect-db.php');
require('Classes/Product.php');

try {
    if (isset($_GET['category'])) {
        $category = $_GET['category'];
        $stmt = $dbh->prepare('SELECT * FROM products WHERE categoria= :categoria');
        $stmt->bindParam(':categoria', $category, PDO::PARAM_STR);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $products = array();
        foreach ($rows as $row) {
            $product = new Product($row['ID'], $row['nombre'], $row['descripcion'], $row['precio'], $row['categoria']);
            $products[] = $product;
        }

    } else {
        // Si no se proporciona una categoría, se seleccionan todos los productos
        $stmt = $dbh->prepare('SELECT * FROM products');
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $products = array();
        foreach ($rows as $row) {
            $product = new Product($row['ID'], $row['nombre'], $row['descripcion'], $row['precio'], $row['categoria']);
            $products[] = $product;

        }

    }
} catch (PDOException $e) {
    echo "ERROR: " . $e->getMessage();
}
?>
