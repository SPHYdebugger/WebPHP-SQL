<?php

require('../resources/db/connect-db.php');

if(isset($_GET['action'])) {
    $action = $_GET['action'];

    // Acciones basadas en el valor de "action"
    switch($action) {

        case 'list_all':
            //listar todos las tiendas
            show_list_shops($dbh);
            break;

        case 'mail_form':
            //mostrar el formulario
            show_mail_form();
            break;
        case 'send_mail':
            //mandar mail
            send_mail();
            break;




    }
} else {
    show_list_shops($dbh);
}


function show_list_shops($dbh)
{
    include('../includes/header.php');
    require ('../Models/shop_model.php');


    $shops = list_shops($dbh);

    include ('../Views/shops.php');
    include("../includes/footer.php");
}

function show_mail_form()
{
    include('../includes/header.php');
    require ('../Models/shop_model.php');

    include ('../Views/mailForm.php');
    include("../includes/footer.php");
}


function send_mail(){
    require ('../Models/shop_model.php');
    send_m();
}