<?php
include ('includes/header.php');
// conectamos a la base de datos
require ('resources/db/connect-db.php');
// obtenemos los resultados de la base de datos mediante la consulta
try {
    //configuramos el prepared statement
    $stmt = $dbh->prepare('SELECT * FROM clients');
    $stmt->execute();

    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "ERROR: " . $e->getMessage();
}



?>

<main role="main" >

    <div class="container" style="margin-top: 150px">
        <?php
        if(isset($_SESSION['usuario_logado'])) { ?>
            <div class="d-flex justify-content-center">
            <a href="addClient.php" class="btn btn-primary my-2">Registrar un cliente</a>
            </div>
        <?php }?>
        <h2 style="text-align: center;">LISTA DE CLIENTES</h2>
        <table class="table container" style="margin-top: 50px">
            <div class="container d-flex justify-content-center">
                <tr>
                    <th>DNI CLIENTE</th>
                    <th>NOMBRE</th>
                    <th>EMAIL</th>
                    <?php if(isset($_SESSION['usuario_logado'])) { ?>
                        <th>EDITAR</th>
                    <?php } ?>
                    <?php if(isset($_SESSION['usuario_logado'])) { ?>
                        <th>BORRAR</th>
                    <?php } ?>
                </tr>
                <?php

                foreach ($resultado as $client) {
                ?>
                                <tr>
                                    <td><?php echo $client['DNI']; ?></td>
                                    <td><?php echo $client['nombre']; ?></td>
                                    <td><?php echo $client['mail']; ?></td>
                                    <?php
                                    if (isset($_SESSION['usuario_logado'])) { ?>
                                        <td>
                                            <form method="post" action="editClient.php">
                                                <input type="hidden" name="editClient" value="<?php echo $client['ID']; ?>">
                                                <button type="submit" class="btn btn-primary btn-sm my-2">EDITAR</button>
                                            </form>
                                        </td>
                                    <?php } ?>
                                    <?php
                                    if (isset($_SESSION['usuario_logado'])) { ?>
                                        <td>
                                            <form method="post" action="resources/db/Client/deleteClient.php">
                                                <input type="hidden" name="deleteClient" value="<?php echo $client['ID']; ?>">
                                                <button type="submit" class="btn btn-primary btn-sm my-2">BORRAR</button>
                                            </form>
                                        </td>
                                    <?php } ?>
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