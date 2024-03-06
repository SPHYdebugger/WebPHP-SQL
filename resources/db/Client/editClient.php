<?php
include '..\headerPost.php';

?>
<div class="container" style="margin-top: 150px ; text-align: center; margin-bottom: 100px">





            <h2>Cliente registrado con éxito</h2>
            <p>DNI del cliente: <?php echo $DNI; ?></p>
            <p>Nombre del cliente: <?php echo $nombre; ?></p>
            <p>Email del cliente: <?php echo $email; ?></p>





            <p>El tamaño del array es: <?php echo $tamano; ?></p>

    </br>
    <a href="..\..\..\clients.php" class="btn btn-primary my-2">Volver a clientes</a>

</div>
<?php

require('../../../includes/footer.php');
?>




