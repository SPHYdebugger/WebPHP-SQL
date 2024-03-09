<?php


require('../resources/db/connect-db.php');
require('../Classes/Shop.php');


function list_shops($dbh)
{
    try {
            $stmt = $dbh->prepare('SELECT * FROM shops');
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $shops = array();
            foreach ($rows as $row) {
                $shop = new Shop($row['ID'], $row['ciudad'], $row['direccion'], $row['telefono'], $row['email'], $row['mapaGoogleMaps']);
                $shops[] = $shop;
            }

    } catch (PDOException $e) {
        echo "ERROR: " . $e->getMessage();
    }return $shops;
}

function send_m(){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Asegurarse de que todos los datos han sido enviados desde el formulario
        if(isset($_POST['to']) && isset($_POST['subject']) && isset($_POST['message'])) {
            $to = $_POST['to'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];
            $headers = 'From: sanpher15@gmail.com'. "\r\n" .
                'Reply-To: sanpher15@gmail.com'. "\r\n" .
                'X-Mailer: PHP/' . phpversion();

            //Intentar enviar el correo
            try{
                if(!mail($to,$subject,$message,$headers)){
                    throw new Exception('Error al enviar el correo');
                }
                echo 'Correo enviado con éxito';
                echo '<br><a href="../index.php" class="btn btn-primary my-2">Volver a inicio</a>';
            } catch (Exception $e){
                echo $e->getMessage();
            }
        } else {
            echo 'Faltan datos del formulario';
        }


    }else {
        echo 'Método de solicitud incorrecto';
    }
}




