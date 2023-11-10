<?php
    use API\Crear\Crear as Crear;
    require_once __DIR__ . '/API/start.php';

    // SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
    $producto = file_get_contents('php://input');
    $agregar = new Crear('marketzone');//CREA UNA INSTANCIA DE LA CLASE
    $agregar->add($producto);
    echo $agregar->getResponse();

?>