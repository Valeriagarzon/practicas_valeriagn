<?php
    use API\Leer\Leer as Leer;
    require_once __DIR__ . '/API/start.php';

    $productos = new Leer('marketzone');//CREA UNA INSTANCIA DE LA CLASE
    $productos->list();
    echo $productos->getResponse();

?>