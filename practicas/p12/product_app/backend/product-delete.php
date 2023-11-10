<?php
     use API\Eliminar\Eliminar as Eliminar;
     require_once __DIR__ . '/API/start.php';

    $producto = new Eliminar('marketzone');//CREA UNA INSTANCIA DE LA CLASE
    $producto->delete($_POST['id']);
    echo $producto->getResponse();
?>