<?php


$dbname = "stetic100DB";
$user = "root";
$password = "";
$server = 'localhost';
$dbh = "";


try {
    $dsn = "mysql:host=$server;dbname=$dbname;charset=UTF8";
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Conexión realizada con éxito !!!";
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
