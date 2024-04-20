<?php
require("../../includes/header.php");
?>

<main>

    <!-- Mostrar mensaje de error si existe -->
    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger" style="margin-top: 100px; margin-bottom: -100px" role="alert">
            <?php echo $_SESSION['error']; ?>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <hr class="featurette-divider" style="margin-top: 150px">
    <h2 style="text-align: center;">REGISTRO DE NUEVO USUARIO</h2>


    <div class="container col-6">
        <form action="registerUser.php" method="post" enctype= "multipart/form-data">
            <div class="mb-3">
                <label for="nombre" class="form-label">NOMBRE</label>
                <input type="text" class="form-control" id="nombre" name="nombre">
            </div>
            <div class="mb-3">
                <label for="usuario" class="form-label">USUARIO</label>
                <input type="text" class="form-control" id="usuario" name="usuario">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">CONTRASEÑA</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="mail" class="form-label">EMAIL</label>
                <input type="mail" class="form-control" id="mail" name="mail">
            </div>

            <div class="container  d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Confirmar el registro</button>
            </div>
        </form>

        <div class="container  d-flex justify-content-center">
            <a href="../../public/index.php" type="button" class="btn btn-primary col-4" style="margin-top: 20px;">Cancelar el registro</a>
        </div>
    </div>
</main>

<?php
include("../../includes/footer.php");
?>
