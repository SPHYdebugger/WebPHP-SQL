<?php



function list_buys($dbh)
{
    try {
        $stmt = $dbh->prepare('SELECT * FROM buys');
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    } catch (PDOException $e) {
        echo "ERROR: " . $e->getMessage();
    }
}

function add_one_buy($dbh){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Verificar que se hayan enviado datos
        if (isset($_POST['cliente']) && isset($_POST['producto'])) {
            // Obtener los datos del formulario
            $usuario = $_POST['usuario'];
            $cliente = $_POST['cliente'];
            $producto = $_POST['producto'];
            $fecha_compra = date("d-m-Y/H:i:s");


            try {
                $stmt = $dbh->prepare("INSERT INTO buys (nombre_usuario, nombre_cliente, nombre_producto, fecha_compra) VALUES (:nombre_usuario, :nombre_cliente, :nombre_producto, :fecha_compra)");
                $stmt->bindParam(':nombre_usuario', $usuario, PDO::PARAM_STR);
                $stmt->bindParam(':nombre_cliente', $cliente, PDO::PARAM_STR);
                $stmt->bindParam(':nombre_producto', $producto, PDO::PARAM_STR);
                $stmt->bindParam(':fecha_compra', $fecha_compra, PDO::PARAM_STR);
                $stmt->execute();
            } catch (PDOException $e) {
                echo "ERROR: " . $e->getMessage();
            }


        }
    }header("Location: ../Controllers/buy_controller.php?action=list_all");
}
