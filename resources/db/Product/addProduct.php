<?php
include ('../headerPost.php');
require ('../connect-db.php');
require ('../../../Classes/Product.php');
?>
<div class="container" style="margin-top: 150px; text-align: center; margin-bottom: 100px">

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (isset($_POST['nombre']) && isset($_POST['precio'])) {
            // Obtener los datos del formulario
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $categoria = $_POST['categoria'];



            if(isset($_FILES['image']) && !empty($_FILES['image']['tmp_name'])) {
                $imagen_nombre = $_FILES['image']['name'];
                $imagen_tipo = $_FILES['image']['type'];
                $imagen_tamaño = $_FILES['image']['size'];
                $imagen_tmp = $_FILES['image']['tmp_name'];


                $imagen_contenido = file_get_contents($imagen_tmp);
            } else {
                // Si no se envió una imagen, utiliza una imagen por defecto
                $imagen_contenido = file_get_contents('resources/images/productos.png');
            }

            try {

                $product = new Product(null, $nombre, $descripcion, $precio, $categoria);

                $stmt = $dbh->prepare("INSERT INTO products (nombre, descripcion, precio, categoria) VALUES (:nombre, :descripcion, :precio, :categoria)");
                $nombre = $product->getNombre();
                $descripcion = $product->getDescripcion();
                $precio = $product->getPrecio();
                $categoria = $product->getCategoria();
                $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
                $stmt->bindParam(':precio', $precio, PDO::PARAM_STR);
                $stmt->bindParam(':categoria', $categoria, PDO::PARAM_STR);
                $stmt->execute();

                $lastProductId = $dbh->lastInsertId();

                $stmt = $dbh->prepare("UPDATE products SET imagen = :imagen WHERE ID = :id");
                $stmt->bindParam(':id', $lastProductId, PDO::PARAM_INT);
                $stmt->bindParam(':imagen', $imagen_contenido, PDO::PARAM_LOB);
                $stmt->execute();
            } catch (PDOException $e) {
                echo "ERROR: " . $e->getMessage();
            }
            ?>

            <h2>Producto registrado con éxito</h2>

            <p>Nombre del producto: <?php echo $nombre ?></p>
            <p>Descripción del producto: <?php echo $descripcion ?></p>
            <p>Precio del producto: <?php echo $precio ?></p>

            <?php
            try {

                $stmt = $dbh->prepare("SELECT COUNT(*) FROM products;");
                $stmt->execute();
                $tamano = $stmt->fetchColumn();
            } catch (PDOException $e) {
                echo "ERROR: " . $e->getMessage();
            }

            echo "Número de productos actuales: " . $tamano;
        } else {
            ?>
            <p>Error: Debes completar todos los campos del formulario</p>
            <?php
        }
    }
    ?>
    <br>
    <a href="..\..\..\products.php" class="btn btn-primary my-2">Volver a productos</a>
</div>
<?php
require('../../../includes/footer.php');
?>
