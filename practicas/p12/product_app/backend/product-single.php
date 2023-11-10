<?php
     use API\Leer\Leer as Leer;
     require_once __DIR__ . '/API/start.php';
     
     $producto = new Leer('marketzone');//CREA UNA INSTANCIA DE LA CLASE
     $producto->single($_POST['id']);
     echo $producto->getResponse();

?>