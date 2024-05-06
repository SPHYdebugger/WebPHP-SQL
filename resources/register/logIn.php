<?php
session_start();

require ('../db/connect-db.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $contrasena_ingresada = $_POST['contrasena'];

    try {
        $stmt = $dbh->prepare("SELECT * FROM users WHERE usuario = :usuario");
        $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
        $stmt->execute();

        // Obtener la contraseña
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
            $contraseña = $resultado['contraseña'];
            $nombre_usuario = $resultado['nombre'];
            $_SESSION['usuario_logado'] = $nombre_usuario;

            if ($contraseña == $contrasena_ingresada) {
                $_SESSION['usuario_logado'] = $nombre_usuario;
                header('Location: ../../public/index.php');
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

<!doctype html>
<html lang="es">

<head>


    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/carousel/">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">



    <style>
        .btn-primary{
            background-color: #96A9B8;
        }
    </style>


    </script>


</head>
<body>
<div class="container col-4" style="margin-top: 150px; margin-bottom: 50px" >
    <h1>Iniciar Sesión</h1>
    <?php if (isset($mensaje_error)) : ?>
        <p style="color: red;"><?php echo $mensaje_error; ?></p>
    <?php endif; ?>
    <form method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br><br>
        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required><br><br>
        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>

    </form>
    <a href="../../public/index.php"><button class="btn btn-primary">Cancelar</button></a>
</div>
</body>
</html>
