<?php
include('../../includes/header.php');

require ('../db/connect-db.php');
require ('../../app/Models/shop_model.php');
?>
<div class="container" style="margin-top: 150px ; text-align: center; margin-bottom: 100px">


    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (empty($_POST['usuario']) || empty($_POST['nombre']) || empty($_POST['password']) || empty($_POST['mail'])) {
            // Si falta alguno de los campos obligatorios, mensaje de error
            $_SESSION['error'] = 'Falta algún dato por completar. Son todos obligatorios.';
            header('Location: signUp.php');
            exit();
        }
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

                // Asegurarse de que todos los datos han sido enviados desde el formulario


                $subject = "Bienvenid@ a nuestra tienda";
                $message = "Stetic100 le da la bienvenida a nuestra cadena de tiendas especializadas en estética";
                $headers = 'From: sanpher15@gmail.com'. "\r\n" .
                    'Reply-To: sanpher15@gmail.com'. "\r\n" .
                    'X-Mailer: PHP/' . phpversion();

                //Intentar enviar el correo
                try{
                    if(!mail($mail,$subject,$message,$headers)){
                        throw new Exception('Error al enviar el correo');
                    }
                } catch (Exception $e){
                    echo $e->getMessage();
                }


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
    <a href="../../public/index.php" class="btn btn-primary my-2">Volver a INICIO</a>

</div>
<?php

require('../../includes/footer.php');
?>
