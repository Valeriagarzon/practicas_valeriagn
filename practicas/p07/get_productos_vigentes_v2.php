<?php
header("Content-Type: application/xhtml+xml; charset=utf-8");

$data = array();

/** SE CREA EL OBJETO DE CONEXIÓN */
@$link = new mysqli('localhost', 'root', 'Mitatanka1', 'marketzone');
/** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */

/** comprobar la conexión */
if ($link->connect_errno)
{
    die('Falló la conexión: '.$link->connect_error.'<br/>');
}

/** Crear una tabla que no devuelve un conjunto de resultados */
if ( $result = $link->query("SELECT * FROM productos WHERE eliminado = 0") )
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
    echo '<script>';
    echo 'function show(id) {';
    
    echo 'var nombre = document.getElementById(id).querySelector(".row-data.nombre").innerHTML;';
    echo 'var marca = document.getElementById(id).querySelector(".row-data.marca").innerHTML;';
    echo 'var modelo = document.getElementById(id).querySelector(".row-data.modelo").innerHTML;';
    echo 'var precio = document.getElementById(id).querySelector(".row-data.precio").innerHTML;';
    echo 'var unidades = document.getElementById(id).querySelector(".row-data.unidades").innerHTML;';
    echo 'var detalles = document.getElementById(id).querySelector(".row-data.detalles").innerHTML;';
    echo 'var imagen = document.getElementById(id).querySelector(".row-data.imagen").innerHTML;';
    echo 'alert("Nombre: " + nombre + "\\nMarca: " + marca + "\\nModelo: " + modelo + "\\nPrecio: " + precio + "\\nUnidades: " + unidades + "\\nDetalles: " + detalles);';
    echo 'window.location.href = "formulario_productos_v2.php?nombre=" + nombre; ';
    echo '}';
    echo '</script>';
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
    echo '<th scope="col">Modificar</th>'; 
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    
    foreach ($row as $producto) {
        echo '<tr id="' . $producto['id'] . '">';
        echo '<th scope="row">' . $producto['id'] . '</th>';
        echo '<td class="row-data nombre">' . $producto['nombre'] . '</td>';
        echo '<td class="row-data marca">' . $producto['marca'] . '</td>';
        echo '<td class="row-data modelo">' . $producto['modelo'] . '</td>';
        echo '<td class="row-data precio">' . $producto['precio'] . '</td>';
        echo '<td class="row-data unidades">' . $producto['unidades'] . '</td>';
        echo '<td class="row-data detalles">' . utf8_encode($producto['detalles']) . '</td>';
        echo '<td class="row-data imagen"><img src="' . $producto['imagen'] . '" alt="producto"/></td>';
        echo '<td><input type="button" value="Actualizar" onclick="show(' . $producto['id'] . ')" /></td>';
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

