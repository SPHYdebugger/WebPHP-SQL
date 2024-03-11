<?php

require('../resources/db/connect-db.php');

if(isset($_GET['action'])) {
    $action = $_GET['action'];

    // Acciones basadas en el valor de "action"
    switch($action) {

        case 'list_all':
            //listar todos las compras
            show_list_buys($dbh);
            break;

        case 'add_one':
            //mostrar formulario
            show_add_form($dbh);
            return;
        case 'add_buy':
            //añadir una compra
            add_buy($dbh);
            return;

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


function show_add_form($dbh)
{
    include('../includes/header.php');
    include('../Models/client_model.php');
    $clientes= list_all_clients($dbh);
    include('../Models/product_model.php');
    $productos= list_products($dbh);
    include ('../Views/addBuyForm.php');
    include("../includes/footer.php");
}
function add_buy($dbh)
{
    include('../includes/header.php');
    require ('../Models/buy_model.php');

    add_one_buy($dbh);



    include("../includes/footer.php");

}
