<?php
require("includes/header.php");
?>

<main>



    <hr class="featurette-divider" style="margin-top: 150px">
    <h2 style="text-align: center;">REGISTRO DE TIENDA</h2>


    <div class="container col-6">
        <form action="resources/db/Shop/addShop.php" method="post" enctype= "multipart/form-data">
            <div class="mb-3">
                <label for="id" class="form-label">ID</label>
                <input type="text" class="form-control" id="id" name="id">
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">CIUDAD</label>
                <input type="text" class="form-control" id="city" name="city">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">DIRECCIÓN</label>
                <input type="text" class="form-control" id="address" name="address">
            </div>
            <div class="mb-3">
                <label for="telephone" class="form-label">TELÉFONO</label>
                <input type="text" class="form-control" id="telephone" name="telephone">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">EMAIL</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="map" class="form-label">MAPA</label>
                <input type="text" class="form-control" id="map" name="map">
            </div>

            <div class="container  d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Confirmar el registro</button>
            </div>
        </form>

        <div class="container  d-flex justify-content-center">
            <a href="shops.php" type="button" class="btn btn-primary col-4" style="margin-top: 20px;">Volver a la lista de tiendas</a>
        </div>
    </div>
</main>

<?php
include("includes/footer.php");
?>

