<?php
include '..\headerPost.php';

require ('../connect-db.php');
require ('../../../Classes/Product.php');

?>
<div class="container" style="margin-top: 150px ; text-align: center; margin-bottom: 100px">


    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Verificar que se hayan enviado datos
        if (isset($_POST['nombre']) && isset($_POST['precio'])) {
            // Obtener los datos del formulario
            $ID = $_POST['ID'];
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $categoria = $_POST['categoria'];


            $product = new Product($ID, $nombre, $descripcion, $precio, $categoria);

            try {

                $stmt = $dbh->prepare("UPDATE products SET nombre=:nombre, descripcion=:descripcion, precio=:precio, categoria=:categoria WHERE ID=:ID");

                //Crear variables, porquw bindParam no acepta datos directamente y solo quiere variables.

                $nombre = $product->getNombre();
                $descripcion = $product->getDescripcion();
                $precio = $product->getPrecio();
                $id = $product->getId();
                $categoria = $product->getCategoria();
                $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
                $stmt->bindParam(':precio', $precio, PDO::PARAM_STR);
                $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
                $stmt->bindParam(':categoria', $categoria, PDO::PARAM_STR);
                $stmt->execute();

                // mensaje de éxito
                echo "<h2>Producto modificado con éxito</h2>";
                echo "<p>Nombre del producto: {$product->getNombre()}</p>";
                echo "<p>Descripción del producto: {$product->getDescripcion()}</p>";
                echo "<p>Precio del producto: {$product->getPrecio()}</p>";
            } catch (PDOException $e) {
                echo "ERROR: " . $e->getMessage();
            }


            ?>


            <?php

        } else {
            ?>
            <p>Error: Debes completar todos los campos del formulario</p>
            <?php
        }
    }

    ?>
    </br>
    <a href="..\..\..\products.php" class="btn btn-primary my-2">Volver a productos</a>

</div>
<?php

require('../../../includes/footer.php');
?>




