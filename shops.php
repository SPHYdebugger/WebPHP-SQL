<?php
require("includes/header.php");
require ('resources\db\Shop\arrayShops.php');

// Verificar si se ha hecho clic en el botón de borrar
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['resources\db\Shop\deleteShop.php'])) {

}
?>

    <main role="main" >

        <div class="container" style="margin-top: 150px">
            <?php
            if(isset($_SESSION['usuario_logado'])) { ?>
                <a href="addShop.php" class="btn btn-primary my-2">Registrar una tienda</a>
            <?php }?>
            <h2 style="text-align: center;">LISTA DE TIENDAS</h2>
            Por favor selecciona una tienda para ver los detalles de contacto y ubicación
            <table class="table container" style="margin-top: 50px">
                <div class="container d-flex justify-content-center">
                    <tr>
                        <th>ID</th>
                        <th>CIUDAD</th>
                        <th>EMAIL</th>
                        <th>DETALLES</th>
                        <?php if(isset($_SESSION['usuario_logado'])) { ?>
                            <th>BORRAR</th>
                        <?php } ?>
                    </tr>
                    <?php
                    $shopCount = count($shopsJson);

                    for ($i = 0; $i < $shopCount; $i++) {
                        $shop = $shopsJson[$i];
                        ?>
                        <tr>
                            <td><?php echo $shop->getId(); ?></td>
                            <td><?php echo $shop->getCiudad(); ?></td>
                            <td><a href="mailForm.php"><?php echo $shop->getEmail(); ?></a></td>
                            <td>
                                <form method="post" action="detailShop.php">
                                    <input type="hidden" name="detailsShop" value="<?php echo $shop->getId(); ?>">
                                    <button type="submit" class="btn btn-primary btn-sm my-2">DETALLES</button>
                                </form>
                            </td>
                            <?php
                            if (isset($_SESSION['usuario_logado'])) {
                                ?>
                                <td>
                                    <form method="post" action="resources/db/Shop/deleteShop.php">
                                        <input type="hidden" name="deleteShop" value="<?php echo $shop->getId(); ?>">
                                        <button type="submit" class="btn btn-primary btn-sm my-2">BORRAR</button>
                                    </form>
                                </td>
                                <?php
                            }
                            ?>
                        </tr>
                        <?php
                    }
                    ?>

                </div>

            </table>

        </div>

        <div class="d-flex justify-content-center">
            <a href="index.php" class="btn btn-primary my-2">Volver a inicio</a>
        </div>

    </main>

<?php
include("includes/footer.php");
?>