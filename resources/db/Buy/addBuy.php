<?php
include '..\headerPost.php';

require ('../connect-db.php');

?>
<div class="container" style="margin-top: 150px ; text-align: center; margin-bottom: 100px">


<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar que se hayan enviado datos
    if (isset($_POST['cliente']) && isset($_POST['producto'])) {
        // Obtener los datos del formulario
        $usuario = $_POST['usuario'];
        $cliente = $_POST['cliente'];
        $producto = $_POST['producto'];
        $fecha_compra = date("d-m-Y-H-i-s");



        try {
            $stmt = $dbh->prepare("INSERT INTO buys (usuario, cliente, producto, fecha_compra) VALUES (:usuario, :cliente, :producto, :fecha_compra)");
            $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
            $stmt->bindParam(':cliente', $cliente, PDO::PARAM_STR);
            $stmt->bindParam(':producto', $producto, PDO::PARAM_STR);
            $stmt->bindParam(':fecha_compra', $fecha_compra, PDO::PARAM_STR);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }


        ?>

        <h2>Compra registrada con éxito</h2>
        <p>Usuario que registra la compra: <?php echo $usuario; ?></p>
        <p>Nombre del cliente: <?php echo $cliente; ?></p>
        <p>Nombre del producto: <?php echo $producto; ?></p>
        <p>Fecha de la compra: <?php echo $fecha_compra; ?></p>


        <?php
        try {
            $stmt = $dbh->prepare("SELECT COUNT(*) FROM buys;");
            $stmt->execute();
            // Obtener el número de registros
            $tamano = $stmt->fetchColumn();


        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }

        // Mostrar el número de clientes
        echo "Número de compras actuales: " . $tamano;
    } else {
        ?>
        <p>Error: Debes completar todos los campos del formulario</p>
        <?php
    }
}

?>
</br>
<a href="..\..\..\buys.php" class="btn btn-primary my-2">Volver a compras</a>

</div>
<?php

require('../../../includes/footer.php');
?>



