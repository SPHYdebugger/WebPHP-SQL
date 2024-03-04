<?php
include '..\headerPost.php';

require ('../connect-db.php');

?>
<div class="container" style="margin-top: 150px ; text-align: center; margin-bottom: 100px">


<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar que se hayan enviado datos
    if (isset($_POST['firstName']) && isset($_POST['email'])) {
        // Obtener los datos del formulario
        $DNI = $_POST['DNI'];
        $nombre = $_POST['firstName'];
        $email = $_POST['email'];

        // Crear un nuevo Client

        try {
            $stmt = $dbh->prepare("INSERT INTO clients (DNI, nombre, mail) VALUES (:dni, :nombre, :email)");
            $stmt->bindParam(':dni', $DNI, PDO::PARAM_STR);
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }


        ?>

        <h2>Cliente registrado con éxito</h2>
        <p>DNI del cliente: <?php echo $DNI; ?></p>
        <p>Nombre del cliente: <?php echo $nombre; ?></p>
        <p>Email del cliente: <?php echo $email; ?></p>


        <?php
        try {
            $stmt = $dbh->prepare("SELECT COUNT(*) FROM clients;");
            $stmt->execute();
            // Obtener el número de registros
            $tamano = $stmt->fetchColumn();


        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }

        // Mostrar el número de clientes
        echo "Número de clientes actuales: " . $tamano;
    } else {
        ?>
        <p>Error: Debes completar todos los campos del formulario</p>
        <?php
    }
}

?>
</br>
<a href="..\..\..\clients.php" class="btn btn-primary my-2">Volver a clientes</a>

</div>
<?php

require('../../../includes/footer.php');
?>



