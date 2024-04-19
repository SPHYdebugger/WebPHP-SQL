<?php


function list_all_clients($dbh){
    try {
        $stmt = $dbh->prepare('SELECT * FROM clients');
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    } catch (PDOException $e) {
        echo "ERROR: " . $e->getMessage();
    }
}

function delete_one_client($dbh){
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteClient'])) {
        // Obtener el ID del cliente que se va a borrar
        $IDToDelete = $_POST['deleteClient'];

        try {
            // Obtener el nombre del cliente
            $stmt = $dbh->prepare('SELECT nombre FROM clients WHERE ID = :ID');
            $stmt->bindParam(':ID', $IDToDelete, PDO::PARAM_STR);
            $stmt->execute();
            $nombre_cliente = $stmt->fetchColumn();

            // Eliminar las compras asociadas al cliente
            $stmt_delete_buys = $dbh->prepare('DELETE FROM buys WHERE nombre_cliente = :nombre_cliente');
            $stmt_delete_buys->bindParam(':nombre_cliente', $nombre_cliente, PDO::PARAM_STR);
            $stmt_delete_buys->execute();



            //  el cliente con el ID
            $stmt = $dbh->prepare('DELETE FROM clients WHERE ID = :ID');
            $stmt->bindParam(':ID', $IDToDelete, PDO::PARAM_STR);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                echo "Cliente eliminado exitosamente.";
                header("Location: ../Controllers/client_controller.php?action=list_all");
            } else {
                echo "No se encontró ningún cliente con el ID proporcionado.";
            }
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }
}

function get_one_client($dbh) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editClient'])) {
        // Obtener el ID del cliente que se va a mostrar
        $ID = $_POST['editClient'];
        try {
            $stmt = $dbh->prepare('SELECT * FROM clients WHERE ID = :ID');
            $stmt->bindParam(':ID', $ID, PDO::PARAM_STR);
            $stmt->execute();
            $client = $stmt->fetch(PDO::FETCH_ASSOC);
            return $client;
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
            return null;
        }
    }
}

function get_client($dbh) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Verificar que se hayan enviado datos
        if (isset($_POST['nombre']) && isset($_POST['email'])) {
            // Obtener los datos del formulario
            $DNI = $_POST['DNI'];
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];

            try {
                $stmt = $dbh->prepare("SELECT * FROM clients WHERE DNI = :DNI");
                $stmt->bindParam(':DNI', $DNI, PDO::PARAM_STR);
                $stmt->execute();
                $client = $stmt->fetch(PDO::FETCH_ASSOC);
                return $client;

            } catch (PDOException $e) {
                echo "ERROR: " . $e->getMessage();
            }


        }
    }

}

function edit_one_client($dbh){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Verificar que se hayan enviado datos
        if (isset($_POST['nombre']) && isset($_POST['email'])) {
            // Obtener los datos del formulario
            $ID = $_POST['ID'];
            $DNI = $_POST['DNI'];
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];

            try {
                $stmt = $dbh->prepare("UPDATE clients SET DNI=:DNI, nombre=:nombre, mail=:mail WHERE ID=:ID");
                $stmt->bindParam(':DNI', $DNI, PDO::PARAM_STR);
                $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $stmt->bindParam(':mail', $email, PDO::PARAM_STR);
                $stmt->bindParam(':ID', $ID, PDO::PARAM_STR);
                $stmt->execute();

            } catch (PDOException $e) {
                echo "ERROR: " . $e->getMessage();
            }
        }
    }
}

function add_one_client($dbh){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Verificar que se hayan enviado datos
        if (isset($_POST['nombre']) && isset($_POST['email'])) {
            // Obtener los datos del formulario
            $DNI = $_POST['DNI'];
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];

            try {
                $stmt = $dbh->prepare("INSERT INTO clients (DNI, nombre, mail) VALUES (:dni, :nombre, :email)");
                $stmt->bindParam(':dni', $DNI, PDO::PARAM_STR);
                $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt->execute();

            } catch (PDOException $e) {
                echo "ERROR: " . $e->getMessage();
            }
        }
    }
}
function count_clients($dbh){
    try {
        $stmt = $dbh->prepare("SELECT COUNT(*) FROM clients;");
        $stmt->execute();
        // Obtener el número de registros
        $tamano = $stmt->fetchColumn();
        return $tamano;

    } catch (PDOException $e) {
        echo "ERROR: " . $e->getMessage();
    }
}


