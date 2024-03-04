<?php
require("includes/header.php");
require 'resources\db\Shop\arrayShops.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['detailsShop'])) {
    // Obtener del post el id del tienda que se va a mostrar
    $idToSearch = $_POST['detailsShop'];

    // Buscar la tienda en $tiendasJson
    foreach ($shopsJson as $key => $shop) {
        if ($shop->getId() === $idToSearch) {
            $shopFinded = $shopsJson[$key];
        }
    }
}
?>

<main role="main">

    <div class="container" style="margin-top: 150px; text-align: center;">
        <h2>DETALLES DE LA TIENDA</h2>
        <hr>
        <p>ID DE TIENDA: <?php echo $shopFinded->getId(); ?></p>
        <p>CIUDAD: <?php echo $shopFinded->getCiudad(); ?></p>
        <p>DIRECCIÓN: <?php echo $shopFinded->getId(); ?></p>
        <p>TELEFONO: <?php echo $shopFinded->getCiudad(); ?></p>
        <p>EMAIL: <?php echo $shopFinded->getCiudad(); ?></p>
        <p>UBICACIÓN:</p></BR>
        <div style="margin-top: 20px;">
            <div style="margin-bottom: 20px;">
                <?php
                echo $shopFinded->getMapaGoogleMaps();
                ?>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <a href="shops.php" class="btn btn-primary my-2">Volver a tiendas</a>
    </div>
</main>



<?php
include("includes/footer.php");
?>


