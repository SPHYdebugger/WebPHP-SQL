<?php
require("includes/header.php");
?>

<div class="container col-4" style="margin-top: 150px; margin-bottom: 50px" >
    <h2>ENVÍO DE MAIL</h2>
    <form action="resources/mail/sendMail.php" method="post" >
        <div class="mb-3">
            <label for="to" class="form-label">Destinatario:</label>
            <input type="email" id="to" name="to" required>
        </div>
        <div class="mb-3">
            <label for="subject" class="form-label">Asunto:</label>
            <input type="text" id="subject" name="subject" required>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Mensaje:</label>
            <textarea id="message" name="message" rows="6" required></textarea><br>
        </div>

        <div class="container  d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Enviar correo</button>
        </div>
    </form>

    <div class="container  d-flex justify-content-center">
        <a href="shops.php" type="button" class="btn btn-primary col-4" style="margin-top: 20px;">Volver a la lista de TIENDAS</a>
    </div>
</div>





<?php
include("includes/footer.php");
?>


