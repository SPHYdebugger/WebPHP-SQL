
<?php
include 'C:\Users\sanph\PhpstormProjects\Stetic100\Classes\Shop.php';

// Leer el contenido del archivo JSON
$jsonData = file_get_contents('C:\Users\sanph\PhpstormProjects\Stetic100\resources\db\Shop\dataShops.json');

// Decodificar el contenido JSON
$data = json_decode($jsonData);

// Inicializar un array donde almacenaremos objetos Shop
$shopsJson = [];

foreach ($data as $item) {
    $shop = new Shop($item->id, $item->ciudad, $item->direccion, $item->telefono,$item->email,$item->mapaGoogleMaps);
    // Agregar el objeto a array
    $shopsJson[] = $shop;
}

//[{"id": "V876uyt","ciudad": "Vigo","direccion": "Gran vía","telefono": "986875421","email": "steticvigo@stetic100.es","mapaGoogleMaps": "<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d94542.41726437789!2d-8.807827953983152!3d42.2261867833003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2ses!4v1700297507197!5m2!1ses!2ses\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>"}]