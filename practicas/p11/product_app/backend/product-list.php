<?php
include_once __DIR__.'/API/Productos.php';

$productos = new \API\Productos('marketzone');

$data = $productos->listarProductos();
$productos->cerrarConexion();

echo $data;
