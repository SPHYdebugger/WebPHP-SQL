<?php
require("includes/header.php");
require ('resources\db\Buy\arrayBuys.php');
?>

    <main role="main" >

        <div class="container" style="margin-top: 150px">
            <?php
            if(isset($_SESSION['usuario_logado'])) { ?>
                <div class="d-flex justify-content-center">
                    <a href="" class="btn btn-primary my-2">Registrar una compra</a>
                </div>
            <?php }?>
            <h2 style="text-align: center;">LISTA DE COMPRAS</h2>
            <table class="table container" style="margin-top: 50px">
                <div class="container d-flex justify-content-center">
                    <tr>
                        <th>ID DE COMPRA</th>
                        <th>CLIENTE</th>
                        <th>PRODUCTO</th>
                        <th>FECHA COMPRA</th>
                        <?php if(isset($_SESSION['usuario_logado'])) { ?>
                            <th>BORRAR</th>
                        <?php } ?>
                    </tr>
                    <?php
                    foreach ($buysJson as $buy) : ?>
                        <tr>
                            <td><?php echo $buy->getIdBuy(); ?></td>
                            <td><?php echo $buy->getClient(); ?></td>
                            <td><?php echo $buy->getProduct(); ?></td>
                            <td><?php echo $buy->getBuyDate(); ?></td>
                            <?php
                            if(isset($_SESSION['usuario_logado'])) { ?>
                                <td>
                                    <form method="post" action="">
                                        <input type="hidden" name="deleteBuy" value="<?php echo $buy->getIdBuy(); ?>">
                                        <button type="submit" class="btn btn-primary btn-sm my-2">BORRAR</button>
                                    </form>
                                </td>
                            <?php } ?>
                        </tr>
                    <?php endforeach; ?>
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