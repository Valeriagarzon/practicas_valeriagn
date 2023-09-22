<?php
    header("Content-Type: application/xhtml+xml; charset=utf-8");


    $data = array();

    if(isset($_GET['tope']))
    {
        $tope = $_GET['tope'];
    }
    else
    {
        die('Parámetro "tope" no detectado...');
    }

    if (!empty($tope))
    {
        /** SE CREA EL OBJETO DE CONEXION */
        @$link = new mysqli('localhost', 'root', 'Mitatanka1', 'marketzone');
        /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */

        /** comprobar la conexión */
        if ($link->connect_errno)
        {
            die('Falló la conexión: '.$link->connect_error.'<br/>');
        }

        /** Crear una tabla que no devuelve un conjunto de resultados */
        if ( $result = $link->query("SELECT * FROM productos WHERE unidades <= $tope") )
        {
            /** Se extraen las tuplas obtenidas de la consulta */
            $row = $result->fetch_all(MYSQLI_ASSOC);

            /** Inicio del documento XHTML */
            echo '<?xml version="1.0" encoding="UTF-8"?>';
            echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">';
            echo '<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">';
            echo '<head>';
            echo '<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />';
            echo '<title>Productos</title>';
            echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>';
            echo '</head>';
            echo '<body>';
            echo '<h3>PRODUCTOS</h3>' ;

            /** Validación de W3C */
            echo '<h3><p>
            <a href="http://validator.w3.org/check?uri=referer"><img
              src="http://www.w3.org/Icons/valid-xhtml11" alt="XHTML 1.1 válido" height="31" width="88" /></a>
          </p></h3>' ;



            /** Se crea una tabla XHTML para mostrar los productos */
            echo '<table class="table">';
            echo '<thead class="thead-dark">';
            echo '<tr>';
            echo '<th scope="col">#</th>';
            echo '<th scope="col">Nombre</th>';
            echo '<th scope="col">Marca</th>';
            echo '<th scope="col">Modelo</th>';
            echo '<th scope="col">Precio</th>';
            echo '<th scope="col">Unidades</th>';
            echo '<th scope="col">Detalles</th>';
            echo '<th scope="col">Imagen</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

         
            foreach($row as $producto) {
                echo '<tr>';
                echo '<th scope="row">' . $producto['id'] . '</th>';
                echo '<td>' . $producto['nombre'] . '</td>';
                echo '<td>' . $producto['marca'] . '</td>';
                echo '<td>' . $producto['modelo'] . '</td>';
                echo '<td>' . $producto['precio'] . '</td>';
                echo '<td>' . $producto['unidades'] . '</td>';
                echo '<td>' . utf8_encode($producto['detalles']) . '</td>';
                echo '<td><img src="' . $producto['imagen'] . '" alt="producto"/></td>';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
            echo '</body>';
            echo '</html>';

            /** útil para liberar memoria asociada a un resultado con demasiada información */
            $result->free();
        }

        $link->close();
    }
?>

