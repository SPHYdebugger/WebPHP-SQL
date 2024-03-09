<?php


require('../resources/db/connect-db.php');
require('../Classes/Buy.php');


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
