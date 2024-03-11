<?php
include('../../includes/header.php');

require ('../db/connect-db.php');

?>
<div class="container" style="margin-top: 150px ; text-align: center; margin-bottom: 100px">


    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Verificar que se hayan enviado datos
        if (isset($_POST['usuario']) && isset($_POST['nombre']) && isset($_POST['password']) && isset($_POST['mail'])) {
            // Obtener los datos del formulario
            $usuario = $_POST['usuario'];
            $nombre = $_POST['nombre'];
            $password = $_POST['password'];
            $mail = $_POST['mail'];


            try {
                $stmt = $dbh->prepare("INSERT INTO users (nombre, usuario, contraseña, mail) VALUES (:nombre, :usuario, :password, :mail)");
                $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
                $stmt->bindParam(':password', $password, PDO::PARAM_STR);
                $stmt->bindParam(':mail', $mail, PDO::PARAM_STR);
                $stmt->execute();
            } catch (PDOException $e) {
                echo "ERROR: " . $e->getMessage();
            }


            ?>

            <h2>Usuario registrado con éxito</h2>


            <?php
            try {
                $stmt = $dbh->prepare("SELECT COUNT(*) FROM users;");
                $stmt->execute();
                // Obtener el número de registros
                $tamano = $stmt->fetchColumn();


            } catch (PDOException $e) {
                echo "ERROR: " . $e->getMessage();
            }

            // Mostrar el número de clientes
            echo "Número de usuarios actuales: " . $tamano;
        } else {
            ?>
            <p>Error: Debes completar todos los campos del formulario</p>
            <?php
        }
    }

    ?>
    </br>
    <a href="../../index.php" class="btn btn-primary my-2">Volver a INICIO</a>

</div>
<?php

require('../../includes/footer.php');
?>
