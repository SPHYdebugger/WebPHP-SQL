<?php
require 'arrayShops.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteShop'])) {
    // Obtener el id del tienda que se va a borrar del post
    $idToDelete = $_POST['deleteShop'];

    // Buscar el producto en $productosJson
    foreach ($shopsJson as $key => $shop) {
        if ($shop->getId() === $idToDelete) {
            unset($shopsJson[$key]);
            $shopsJson = array_values($shopsJson);
            file_put_contents('dataShops.json', json_encode($shopsJson));
            header('Location: ../../../shops.php');
            exit();
        }
    }
}

