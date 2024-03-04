<?php
include '..\headerPost.php';

include 'arrayShops.php';
?>
<div class="container" style="margin-top: 150px ; text-align: center; margin-bottom: 100px">


    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Verificar que se hayan enviado datos
        if (isset($_POST['id']) && isset($_POST['map'])) {
            // Obtener los datos del formulario post
            $id = $_POST['id'];
            $city = $_POST['city'];
            $address = $_POST['address'];
            $telephone = $_POST['telephone'];
            $email = $_POST['email'];
            $map = $_POST['map'];

            // Crear un nuevo objeto Shop

            $newShop = new Shop($id,$city,$address,$telephone,$email,$map);

            // Agrega el nuevo objeto al array
            $shopsJson[] = $newShop;


            ?>

            <h2>Tienda registrado con éxito</h2>
            <p>Id: <?php echo $newShop->getId(); ?></p>
            <p>Ciudad: <?php echo $newShop->getCiudad(); ?></p>
            <p>Dirección: <?php echo $newShop->getDireccion(); ?></p>
            <p>Teléfono: <?php echo $newShop->getTelefono(); ?></p>
            <p>email: <?php echo $newShop->getEmail(); ?></p>
            <p>Mapa: <?php echo $newShop->getMapaGoogleMaps(); ?></p>


            <?php
            $tamaño = count($shopsJson);

            // Guardar el array en un archivo JSON
            file_put_contents('dataShops.json', json_encode($shopsJson));
            echo "</BR>"."Número de tiendas en memoria: " . $tamaño;

        } else {
            ?>
            <p>Error: Debes completar todos los campos del formulario</p>
            <?php
        }
    }

    ?>
    </br>
    <a href="../../../shops.php" class="btn btn-primary my-2">Volver a tiendas</a>

</div>
<?php

require('../../../includes/footer.php');
?>




