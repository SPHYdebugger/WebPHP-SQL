<?php

require('../resources/db/connect-db.php');

if(isset($_GET['action'])) {
    $action = $_GET['action'];

    // Acciones basadas en el valor de "action"
    switch($action) {

        case 'list_all':
            //listar todos los productos
            show_list_products($dbh);
            break;
        case 'get_image':
            // Mostrar la imagen del producto
            get_image_product($dbh);
            break;

        case 'delete_one':
            //borrar un producto
            delete_one($dbh);
            break;


        case 'edit_one':
            //mostrar formulario
            show_edit_form($dbh);
            break;
        case 'edit_product':
            //editar producto
            edit_product($dbh);
            return;


        case 'add_one':
            //mostrar formulario
            show_add_form();
            return;
        case 'add_product':
            //añadir un producto
            add_product($dbh);
            return;



    }
} else {
    show_list_products($dbh);
}


function show_list_products($dbh)
{
    include('../includes/header.php');
    require ('../Models/product_model.php');


    $products = list_products($dbh);

    include ('../Views/products.php');
    include("../includes/footer.php");
}

function get_image_product($dbh){
    require ('../Models/product_model.php');
    get_image($dbh);
}

function delete_one($dbh)
{
    require ('../Models/product_model.php');
    delete_one_product($dbh);
}

function show_edit_form($dbh)
{
    include('../includes/header.php');
    require ('../Models/product_model.php');

    $product= get_one_product($dbh);

    include ('../Views/editProductForm.php');
    include("../includes/footer.php");
}

function edit_product($dbh){
    include('../includes/header.php');
    require ('../Models/product_model.php');

    edit_one_product($dbh);
    $product= get_product($dbh);


    include ('../Views/showProduct.php');
    include("../includes/footer.php");
}



function show_add_form()
{
    include('../includes/header.php');
    include ('../Views/addProductForm.php');
    include("../includes/footer.php");
}
function add_product($dbh)
{
    include('../includes/headerPost.php');
    require ('../Models/product_model.php');

    add_one_product($dbh);
    $product= get_product($dbh);
    $tamano= count_products($dbh);

    include('../Views/showProduct.php');
    include("../includes/footer.php");

}



