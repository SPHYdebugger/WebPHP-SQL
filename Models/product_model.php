<?php


require('../resources/db/connect-db.php');
require('../Classes/Product.php');


function list_products($dbh)
{
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
        }return $products;
    } catch (PDOException $e) {
        echo "ERROR: " . $e->getMessage();
    }
}

function get_image($dbh){
    if (isset($_GET['id'])) {
        $id_del_producto = $_GET['id'];
    }
    try {
        $stmt = $dbh->prepare("SELECT imagen FROM products WHERE ID = :id");
        $stmt->bindParam(':id', $id_del_producto, PDO::PARAM_INT);
        $stmt->execute();

        // Obtener la imagen como un blob
        $imagen_blob = $stmt->fetchColumn();
        header('Content-Type: image/jpeg');
        // Devolver la imagen
        echo $imagen_blob;
    } catch (PDOException $e) {
        echo "Error al mostrar la imagen: " . $e->getMessage();
    }
}

function delete_one_product($dbh)
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteProduct'])) {
        // Obtener el ID del producto que se va a borrar
        $IDToDelete = $_POST['deleteProduct'];
        try {
            $stmt = $dbh->prepare('DELETE FROM products WHERE ID = :ID');
            $stmt->bindParam(':ID', $IDToDelete, PDO::PARAM_STR);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                echo "Producto eliminado exitosamente.";
                header("Location: ../Controllers/product_controller.php?action=list_all");
            } else {
                echo "No se encontró ningún producto con el ID proporcionado.";
            }
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }
}

function get_one_product($dbh)
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editProduct'])) {
        // Obtener el ID del producto que se va a mostrar
        $ID = $_POST['editProduct'];
        try {
            $stmt = $dbh->prepare('SELECT * FROM products WHERE ID = :ID');
            $stmt->bindParam(':ID', $ID, PDO::PARAM_STR);
            $stmt->execute();
            $product = $stmt->fetch(PDO::FETCH_ASSOC);
            return $product;
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
            return null;
        }
    }
}

function get_product($dbh)
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Verificar que se hayan enviado datos
        if (isset($_POST['nombre']) && isset($_POST['precio'])) {
            // Obtener los datos del formulario
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];

            try {
                $stmt = $dbh->prepare("SELECT * FROM products WHERE nombre = :nombre AND precio = :precio");
                $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $stmt->bindParam(':precio', $precio, PDO::PARAM_STR);
                $stmt->execute();
                $product = $stmt->fetch(PDO::FETCH_ASSOC);
                return $product;

            } catch (PDOException $e) {
                echo "ERROR: " . $e->getMessage();
            }


        }
    }

}

function edit_one_product($dbh)
{
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

            } catch (PDOException $e) {
                echo "ERROR: " . $e->getMessage();
            }
        } else {
                echo "Error: Debes completar todos los campos del formulario";
        }
    }
}

function add_one_product($dbh)
{

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
        } else {
            ?>
            <p>Error: Debes completar todos los campos del formulario</p>
            <?php
        }
    }

}

function count_products($dbh)
{
    try {
        $stmt = $dbh->prepare("SELECT COUNT(*) FROM products;");
        $stmt->execute();
        // Obtener el número de registros
        $tamano = $stmt->fetchColumn();
        return $tamano;

    } catch (PDOException $e) {
        echo "ERROR: " . $e->getMessage();
    }
}





