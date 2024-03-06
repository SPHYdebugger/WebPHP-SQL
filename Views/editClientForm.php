<?php
require("../includes/header.php");
require('../resources/db/connect-db.php');


?>

<main>



    <hr class="featurette-divider" style="margin-top: 150px">
    <h2 style="text-align: center;">EDITAR CLIENTE</h2>


    <div class="container col-6">
        <form action="../Controllers/client_controller.php?action=edit_client" method="post" enctype= "multipart/form-data">
            <div class="mb-3">
                <label for="ID" class="form-label">ID</label>
                <input type="text" value="<?php echo $client['ID']; ?>" class="form-control" id="ID" name="ID" readonly>
            </div>
            <div class="mb-3">
                <label for="DNI" class="form-label">DNI</label>
                <input type="text" value="<?php echo $client['DNI']; ?>" class="form-control" id="DNI" name="DNI">
            </div>
            <div class="mb-3">
                <label for="firstName" class="form-label">NOMBRE</label>
                <input type="text" value="<?php echo $client['nombre']; ?>" class="form-control" id="nombre" name="nombre">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">EMAIL</label>
                <input type="email" value="<?php echo $client['mail']; ?>" class="form-control" id="mail" name="mail">
            </div>

            <div class="container  d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Confirmar los cambios</button>
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
