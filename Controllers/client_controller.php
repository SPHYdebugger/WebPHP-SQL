<?php

require('../resources/db/connect-db.php');

if(isset($_GET['action'])) {
    $action = $_GET['action'];

    // Realizar diferentes acciones basadas en el valor de "action"
    switch($action) {
        case 'list_all':
            //listar todos los clientes
            list_all($dbh);
            break;
        case 'delete_one':
            //borrar un cliente
            delete_one($dbh);
            break;
        case 'edit_one':
            //mostrar formulario
            show_edit_form($dbh);
            break;
        case 'edit_client':
            //editar cliente
            edit_client($dbh);
            return;





    }
} else {

    list_all($dbh);
}



function list_all($dbh)
{
    include('../includes/header.php');

    require ('../Models/client_model.php');

    $resultado = list_all_clients($dbh);

    include ('../Views/clients.php');

    include("../includes/footer.php");
}

function delete_one($dbh)
{
    include('../includes/header.php');

    require ('../Models/client_model.php');

    delete_one_client($dbh);

    include ('../Views/clients.php');

    include("../includes/footer.php");
}





function show_edit_form($dbh)
{
    include('../includes/header.php');

    require ('../Models/client_model.php');

    $client= get_one_client($dbh);

    include ('../Views/editClientForm.php');

    include("../includes/footer.php");
}

function edit_client($dbh){

    require ('../Models/client_model.php');
    edit_one_client($dbh);


}

function default_action(){

}
