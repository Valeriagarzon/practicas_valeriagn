<?php
    use API\Actualizar\Actualizar as Actualizar;
    require_once __DIR__ . '/API/start.php';

    $producto = file_get_contents('php://input');
    $editar = new Actualizar('marketzone');//CREA UNA INSTANCIA DE LA CLASE
    $editar->edit($producto);
    echo $editar->getResponse();

?>