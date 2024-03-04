<?php
require("includes/header.php");
require ('resources/db/connect-db.php');


if (isset($_GET['id']) && is_numeric($_GET['id'])) {

    $id = $_GET['id'];

    try {
        $stmt = $dbh->prepare('SELECT * FROM products WHERE ID = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "ERROR: " . $e->getMessage();
    }
}

?>
<main>



    <hr class="featurette-divider" style="margin-top: 150px">
    <h2 style="text-align: center;">EDITAR PRODUCTO</h2>


    <div class="container col-6">
        <form action="resources/db/Product/editProduct.php" method="post" enctype= "multipart/form-data">
            <div class="mb-3">
                <label for="ID" class="form-label">ID</label>
                <input type="text" value="<?php echo $product['ID']; ?>" class="form-control" id="ID" name="ID" readonly>
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">NOMBRE</label>
                <input type="text" value="<?php echo $product['nombre']; ?>" class="form-control" id="nombre" name="nombre">
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">DESCRIPCIÓN</label>
                <input type="text" value="<?php echo $product['descripcion']; ?>" class="form-control" id="descripcion" name="descripcion">
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">PRECIO</label>
                <input type="precio" value="<?php echo $product['precio']; ?>" class="form-control" id="precio" name="precio">
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">CATEGORIA</label>
                <input type="text" value="<?php echo $product['categoria']; ?>" class="form-control" id="categoria" name="categoria">
            </div>

            <div class="container  d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Confirmar los cambios</button>
            </div>
        </form>

        <div class="container  d-flex justify-content-center">
            <a href="products.php" type="button" class="btn btn-primary col-4" style="margin-top: 20px;">Volver a la lista de productos</a>
        </div>
    </div>
</main>

<?php
include("includes/footer.php");
?>
