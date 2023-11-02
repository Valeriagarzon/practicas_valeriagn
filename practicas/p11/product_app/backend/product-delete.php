<?php
include_once __DIR__.'/API/Productos.php';

$productos = new \API\Productos('marketzone');

$data = array(
    'status'  => 'error',
    'message' => 'La consulta falló'
);

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $result = $productos->eliminarProducto($id);

    if ($result === true) {
        $data['status'] = 'success';
        $data['message'] = 'Producto eliminado';
    } else {
        $data['message'] = $result;
    }
}

$result = $productos->getResponse();
$productos->cerrarConexion();

echo $result;
