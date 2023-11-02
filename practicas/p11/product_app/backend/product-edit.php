<?php
include_once __DIR__.'/API/Productos.php';

$productos = new \API\Productos('marketzone');

$data = array(
    'status'  => 'error',
    'message' => 'La consulta falló'
);

if (isset($_POST['id'])) {
    $jsonOBJ = json_decode(json_encode($_POST));

    $result = $productos->actualizarProducto($jsonOBJ);

    if ($result === true) {
        $data['status'] = 'success';
        $data['message'] = 'Producto actualizado';
    } else {
        $data['message'] = $result;
    }
}

$result = $productos->getResponse();
$productos->cerrarConexion();

echo $result;
