<?php
session_start();
?>

<!doctype html>
<html lang="es">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="Tienda WEB APP" content="">
    <meta name="Santiago Perez" content="">
    <link rel="icon" href="resources/images/flor.png">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>STETIC100 Tienda WEB </title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/carousel/">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">

    <style>
        .card img{
            height: 250px;
        }

    </style>


</head>
<body>

    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="padding: 5px; background-color: #EAD0D1; height: 80px; ">
            <a class="navbar-brand" href="index.php">
                <img src="..\..\images\logo.png" alt="" style="width: 120px; height: 80px; margin: -8%;">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" style="background-color: #EAD0D1;" id="navbarCollapse">
                <ul class="navbar-nav mr-auto" >
                    <li class="nav-item active">
                        <a class="nav-link" href="../../index.php" style="color: black;">INICIO <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../index.php#eventos" style="color: black;">EVENTOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../shops.php" style="color: black;">CONTACTO</a>
                    </li>
                </ul>
                <?php
                if(isset($_SESSION['usuario_logado'])) {
                    echo "usuario: " . $_SESSION['usuario_logado'];
                ?>
                    <p><a class="btn btn-lg btn-primary" href="resources/register/logout.php" role="button" style="margin-left: 10px">LogOut</a></p>
                <?php
                }else{
                ?>
                    <p><a class="btn btn-lg btn-primary" href="resources/register/logIn.php" role="button">LogIn</a></p>
                </form>
                <?php
                }
                ?>

            </div>
        </nav>
    </header>
