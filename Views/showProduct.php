
<div class="d-flex justify-content-center" style="margin-top: 100px;">
    <H2>INFORMACIÓN DEL PRODUCTO</H2>
</div>



<div class="container d-flex justify-content-center align-items-center" style="margin-top: 50px ; text-align: center; margin-bottom: 100px">




    <div class="col-md-4 mb-4">
        <div class="card" >
            <img src="../Controllers/product_controller.php?action=get_image&id=<?php echo $product['ID']; ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">NOMBRE: <?php echo $product['nombre'];?></h5>
                <p class="card-text" style="min-height: 100px;">DESCRIPCIÓN: <?php echo $product['descripcion']; ?></p>
                <strong class="card-text" style="display:block; text-align: right;">PRECIO <?php echo $product['precio']; ?> €</strong>
                <p class="card-text" style="display: block; text-align: center; background-color: #EAD0D1; margin-bottom: 20px;">CATEGORÍA:  <?php echo $product['categoria'];?> </p>

            </div>
        </div>
    </div>


</div>
<br>
<div class="d-flex justify-content-center" style="margin-top: 10px;">
    <a href="../Controllers/product_controller.php" class="btn btn-primary my-2">Volver a productos</a>
</div>






