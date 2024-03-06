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
            // Preparar la consulta para borrar el cliente con el DNI específico
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
            return $client; // Devuelve el cliente encontrado
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
            return null;
        }
    }
}


function edit_one_client($dbh)
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Verificar que se hayan enviado datos
        if (isset($_POST['nombre']) && isset($_POST['mail'])) {
            // Obtener los datos del formulario
            $ID = $_POST['ID'];
            $DNI = $_POST['DNI'];
            $nombre = $_POST['nombre'];
            $email = $_POST['mail'];


            try {
                $stmt = $dbh->prepare("UPDATE clients SET DNI=:DNI, nombre=:nombre, mail=:mail WHERE ID=:ID");
                $stmt->bindParam(':DNI', $DNI, PDO::PARAM_STR);
                $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $stmt->bindParam(':mail', $email, PDO::PARAM_STR);
                $stmt->bindParam(':ID', $ID, PDO::PARAM_STR);
                $stmt->execute();
                header("Location: ../Controllers/client_controller.php?action=list_all");
            } catch (PDOException $e) {
                echo "ERROR: " . $e->getMessage();
            }


        }
    }
}

function count_clients(){

    try {
        $stmt = $dbh->prepare("SELECT COUNT(*) FROM clients;");
        $stmt->execute();
        // Obtener el número de registros
        $tamano = $stmt->fetchColumn();


    } catch (PDOException $e) {
        echo "ERROR: " . $e->getMessage();
    }
}

