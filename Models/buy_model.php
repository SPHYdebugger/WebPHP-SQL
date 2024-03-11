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
            $fecha_compra = date("d-m-Y-H-i-s");


            try {
                $stmt = $dbh->prepare("INSERT INTO buys (usuario, cliente, producto, fecha_compra) VALUES (:usuario, :cliente, :producto, :fecha_compra)");
                $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
                $stmt->bindParam(':cliente', $cliente, PDO::PARAM_STR);
                $stmt->bindParam(':producto', $producto, PDO::PARAM_STR);
                $stmt->bindParam(':fecha_compra', $fecha_compra, PDO::PARAM_STR);
                $stmt->execute();
            } catch (PDOException $e) {
                echo "ERROR: " . $e->getMessage();
            }


        }
    }header("Location: ../Controllers/buy_controller.php?action=list_all");
}
