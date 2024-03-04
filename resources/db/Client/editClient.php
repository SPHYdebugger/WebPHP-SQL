<?php
include '..\headerPost.php';

require ('../connect-db.php');

?>
<div class="container" style="margin-top: 150px ; text-align: center; margin-bottom: 100px">


    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Verificar que se hayan enviado datos
        if (isset($_POST['nombre']) && isset($_POST['mail'])) {
            // Obtener los datos del formulario
            $ID = $_POST['ID'];
            $DNI = $_POST['DNI'];
            $nombre = $_POST['nombre'];
            $email = $_POST['mail'];



            try {
                $stmt = $dbh->prepare("UPDATE clients SET DNI=:DNI, nombre=:nombre, mail=:mail WHERE ID=:ID");
                $stmt->bindParam(':DNI', $DNI, PDO::PARAM_STR);
                $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $stmt->bindParam(':mail', $email, PDO::PARAM_STR);
                $stmt->bindParam(':ID', $ID, PDO::PARAM_STR);
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
            echo "El tamaño del array es: " . $tamano;
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




