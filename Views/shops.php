<main role="main">
    <div class="container" style="margin-top: 150px">

        <h2 style="text-align: center;">LISTA DE TIENDAS</h2>
        <div class="row">
            <?php foreach ($shops as $shop) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card" >

                        <div>
                            <?php echo $shop->getMapaGoogleMaps();?>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $shop->getCiudad();?></h5>
                            <p class="card-text" style="min-height: 100px;"><?php echo $shop->getDireccion(); ?></p>
                            <strong class="card-text" style="display:block; text-align: right;">TELÉFONO <?php echo $shop->getTelefono(); ?></strong>
                            <a href="../Controllers/shop_controller.php?action=mail_form"><p class="card-text" style="display: block; text-align: center; background-color: #EAD0D1; margin-bottom: 20px;">MAIL:  <?php echo $shop->getEmail(); ?> </p></a>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        <a href="../index.php" class="btn btn-primary my-2">Volver a inicio</a>
    </div>
</main>
