
<?php
include 'C:\Users\sanph\PhpstormProjects\Stetic100\Classes\Buy.php';

// Leer el contenido del archivo JSON
$jsonData = file_get_contents('C:\Users\sanph\PhpstormProjects\Stetic100\resources\db\Buy\dataBuys.json');

// Decodificar el contenido JSON en un array de datos PHP
$data = json_decode($jsonData);

// Iniciar un array donde almacenaremos objetos Client
$buysJson = [];

foreach ($data as $item) {
    $buy = new Buy($item->id_buy, $item->client, $item->product, $item->buyDate);
    // LLenamos el array con los datos JSON
    $buysJson[] = $buy;
}

