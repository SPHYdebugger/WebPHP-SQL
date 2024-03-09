<?php
session_start();

require ('../db/connect-db.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre_usuario = $_POST['usuario'];
    $contrasena_ingresada = $_POST['contrasena'];

    try {
        $stmt = $dbh->prepare("SELECT contraseña FROM users WHERE usuario = :usuario");
        $stmt->bindParam(':usuario', $nombre_usuario, PDO::PARAM_STR);
        $stmt->execute();

        // Obtener la contraseña
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
            $contraseña = $resultado['contraseña'];

            if ($contraseña == $contrasena_ingresada) {
                $_SESSION['usuario_logado'] = $nombre_usuario;
                header('Location: ../../../Stetic100/index.php');
                exit();
            } else {
                $mensaje_error = 'Contraseña incorrecta';
            }
        } else {
            $mensaje_error = 'Usuario incorrecto';
        }


    } catch (PDOException $e) {
        echo "ERROR: " . $e->getMessage();
    }

}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión</title>
</head>
<body>
<h1>Iniciar Sesión</h1>
<?php if (isset($mensaje_error)) : ?>
    <p style="color: red;"><?php echo $mensaje_error; ?></p>
<?php endif; ?>
<form method="post">
    <label for="usuario">Usuario:</label>
    <input type="text" id="usuario" name="usuario" required><br><br>
    <label for="contrasena">Contraseña:</label>
    <input type="password" id="contrasena" name="contrasena" required><br><br>
    <button type="submit">Iniciar Sesión</button>
</form>
    <a href="../../index.php"><button>Cancelar</button></a>
</body>
</html>
