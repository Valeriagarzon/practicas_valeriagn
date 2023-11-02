<?php
include_once __DIR__.'/API/Productos.php';

$productos = new \API\Productos('marketzone');

$data = array(
    'status'  => 'error',
    'message' => 'Ya existe un producto con ese nombre'
);

if (isset($_POST['nombre'])) {
    $jsonOBJ = json_decode(json_encode($_POST));

    $result = $productos->agregarProducto($jsonOBJ);

    if ($result === true) {
        $data['status'] = 'success';
        $data['message'] = 'Producto agregado';
    } else {
        $data['message'] = $result;
    }
}

$result = $productos->getResponse();
$productos->cerrarConexion();

echo $result;
