
<?php
include 'C:\Users\sanph\PhpstormProjects\Stetic100\Classes\Client.php';

// Leer el contenido del archivo JSON
$jsonData = file_get_contents('C:\Users\sanph\PhpstormProjects\Stetic100\resources\db\Client\dataClients.json');

// Decodificar el contenido JSON en un array de datos PHP
$data = json_decode($jsonData);

// Iniciar un array donde almacenaremos objetos Client
$clientsJson = [];

foreach ($data as $item) {
    $client = new Client($item->DNI, $item->nombre, $item->email);
    // LLenamos el array con los datos JSON
    $clientsJson[] = $client;
}

