<?php
    use API\Leer\Leer as Leer;
    require_once __DIR__ . '/API/start.php';
    
    $buscando = new Leer('marketzone');//SE CREA UNA INSTANCIA DE LA CLASE
    $buscando->search($_GET['search']);
    echo $buscando->getResponse();
?>