
<main>



    <hr class="featurette-divider" style="margin-top: 150px">
    <h2 style="text-align: center;">REGISTRO DE CLIENTE</h2>


    <div class="container col-6">
        <form action="../Controllers/client_controller.php?action=add_client" method="post" enctype= "multipart/form-data">
            <div class="mb-3">
                <label for="DNI" class="form-label">DNI</label>
                <input type="text" class="form-control" id="DNI" name="DNI">
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">NOMBRE</label>
                <input type="text" class="form-control" id="nombre" name="nombre">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">EMAIL</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>

            <div class="container  d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Confirmar el registro</button>
            </div>
        </form>

        <div class="container  d-flex justify-content-center">
            <a href="../Controllers/client_controller.php" type="button" class="btn btn-primary col-4" style="margin-top: 20px;">Volver a la lista de clientes</a>
        </div>
    </div>
</main>





