
<main role="main" >

    <div class="container" style="margin-top: 150px">
        <?php
        if(isset($_SESSION['usuario_logado'])) { ?>
            <div class="d-flex justify-content-center">
                <a href="../Controllers/buy_controller.php?action=add_one" class="btn btn-primary my-2">Registrar una compra</a>
            </div>
        <?php }?>
        <h2 style="text-align: center;">LISTA DE COMPRAS</h2>
        <table class="table container" style="margin-top: 50px">
            <div class="container d-flex justify-content-center">
                <tr>
                    <th>USUARIO QUE VENDE</th>
                    <th>CLIENTE</th>
                    <th>PRODUCTO</th>
                    <th>FECHA COMPRA</th>

                </tr>
                <?php
                foreach ($resultado as $buy) : ?>
                    <tr>
                        <td><?php echo $buy['usuario']; ?></td>
                        <td><?php echo $buy['cliente']; ?></td>
                        <td><?php echo $buy['producto']; ?></td>
                        <td><?php echo $buy['fecha_compra']; ?></td>

                    </tr>
                <?php endforeach; ?>
            </div>

        </table>

    </div>

    <div class="d-flex justify-content-center">
        <a href="../index.php" class="btn btn-primary my-2">Volver a inicio</a>
    </div>

</main>

