<?php

require('../../resources/db/connect-db.php');

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
    include('../../includes/header.php');
    require('../../app/Models/buy_model.php');

    $resultado = list_buys($dbh);

    include('../../app/Views/buy/buys.php');
    include("../../includes/footer.php");
}


function show_add_form($dbh)
{
    include('../../includes/header.php');
    include('../../app/Models/client_model.php');
    $clientes= list_all_clients($dbh);
    include('../../app/Models/product_model.php');
    $productos= list_products($dbh);
    include('../../app/Views/buy/addBuyForm.php');
    include("../../includes/footer.php");
}
function add_buy($dbh)
{
    include('../../includes/header.php');
    require('../../app/Models/buy_model.php');

    add_one_buy($dbh);



    include("../../includes/footer.php");

}
