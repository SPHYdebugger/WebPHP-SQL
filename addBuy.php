<?php
require("includes/header.php");
require ('resources/db/connect-db.php');
?>

<main>



    <hr class="featurette-divider" style="margin-top: 150px">
    <h2 style="text-align: center;">REGISTRO DE COMPRA</h2>


    <div class="container col-6">
        <form action="resources/db/Buy/addBuy.php" method="post" enctype= "multipart/form-data">
            <div class="mb-3">
                <label for="usuario" class="form-label">USUARIO</label>
                <input type="text" value="<?php echo $_SESSION['usuario_logado']; ?>" class="form-control" id="usuario" name="usuario" readonly>
            </div>
            <div class="mb-3">
                <label for="cliente" class="form-label">CLIENTE</label>
                <select class="form-control" id="cliente" name="cliente">
                    <option value="">Selecciona un cliente</option>
                    <?php
                    //obtener los nombres de los clientes
                    $stmt = $dbh->query('SELECT nombre FROM clients');
                    //mostrarlos
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo '<option value="' . $row['nombre'] . '">' . $row['nombre'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="producto" class="form-label">PRODUCTO</label>
                <select class="form-control" id="producto" name="producto">
                    <option value="">Selecciona un producto</option>
                    <?php
                    //obtener los nombres de los productos
                    $stmt = $dbh->query('SELECT nombre FROM products');
                    //mostrarlos
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo '<option value="' . $row['nombre'] . '">' . $row['nombre'] . '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="container  d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Confirmar el registro</button>
            </div>
        </form>

        <div class="container  d-flex justify-content-center">
            <a href="clients.php" type="button" class="btn btn-primary col-4" style="margin-top: 20px;">Volver a la lista de clientes</a>
        </div>
    </div>
</main>

<?php
include("includes/footer.php");
?>




