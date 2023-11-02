<?php
include_once __DIR__.'/API/Productos.php';

$productos = new \API\Productos('marketzone');

$data = array();

if (isset($_GET['search'])) {
    $search = $_GET['search'];

   
    $result = $productos->buscarProductos($search);

    if (!empty($result)) {
        $data = $result;
    }
}

$productos->cerrarConexion();

echo json_encode($data, JSON_PRETTY_PRINT);
