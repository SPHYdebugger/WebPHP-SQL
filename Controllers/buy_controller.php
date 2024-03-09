<?php

require('../resources/db/connect-db.php');

if(isset($_GET['action'])) {
    $action = $_GET['action'];

    // Acciones basadas en el valor de "action"
    switch($action) {

        case 'list_all':
            //listar todos las tiendas
            show_list_buys($dbh);
            break;


    }
} else {
    show_list_buys($dbh);
}


function show_list_buys($dbh)
{
    include('../includes/header.php');
    require ('../Models/buy_model.php');


    $resultado = list_buys($dbh);

    include ('../Views/buys.php');
    include("../includes/footer.php");
}
