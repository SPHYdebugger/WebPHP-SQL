
<main role="main">
    <div class="container" style="margin-top: 150px">
        <?php if(isset($_SESSION['usuario_logado'])) { ?>
            <div class="d-flex justify-content-center">
                <a href="../addProduct.php" class="btn btn-primary my-2">Registrar un producto</a>
            </div>
        <?php }?>
        <h2 style="text-align: center;">LISTA DE PRODUCTOS POR ZONAS</h2>
        <div style="text-align-last: justify; background-color: #EAD0D1; margin-bottom: 10px">
            <a href="products.php" class="btn btn-secondary" style="margin: 20px;">TODAS</a>
            <a href="products.php?category=cara" class="btn btn-secondary" style="margin: 20px;">CARA</a>
            <a href="products.php?category=cuerpo" class="btn btn-secondary" style="margin: 20px;">CUERPO</a>
            <a href="products.php?category=pelo" class="btn btn-secondary" style="margin: 20px;">PELO</a>
        </div>
        <div class="row">
            <?php foreach ($products as $product) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card" >
                        <img src="../resources/db/Product/showImageProduct.php?id=<?php echo $product->getId(); ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product->getNombre();?></h5>
                            <p class="card-text" style="min-height: 100px;"><?php echo $product->getDescripcion(); ?></p>
                            <strong class="card-text" style="display:block; text-align: right;">PRECIO <?php echo $product->getPrecio(); ?> €</strong>
                            <p class="card-text" style="display: block; text-align: center; background-color: #EAD0D1; margin-bottom: 20px;">CATEGORÍA:  <?php echo $product->getCategoria(); ?> </p>
                            <?php if(isset($_SESSION['usuario_logado'])) { ?>
                                <a href="../editProduct.php?id=<?php echo $product->getId(); ?>" class="btn btn-primary">EDITAR</a>
                                <a href="../resources/db/Product/deleteProduct.php?id=<?php echo $product->getId(); ?>" class="btn btn-primary">BORRAR</a>
                            <?php }?>
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


