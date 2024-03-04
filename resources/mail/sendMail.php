<?php
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
        } catch (Exception $e){
            echo $e->getMessage();
        }
    } else {
        echo 'Faltan datos del formulario';
    }


}else {
    echo 'Método de solicitud incorrecto';
}