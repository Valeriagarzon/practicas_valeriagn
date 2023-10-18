<?php
include_once __DIR__.'/database.php';

// SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
$producto = file_get_contents('php://input');
if (!empty($producto)) {
    // SE TRANSFORMA EL STRING DEL JSON A UN OBJETO
    $jsonOBJ = json_decode($producto);

    // Validar si el producto con el mismo nombre ya existe y no está eliminado
    $nombre = $jsonOBJ->nombre;
    $query = "SELECT * FROM productos WHERE nombre = '$nombre' AND eliminado = 0";
    $result = $conexion->query($query);

    if ($result->num_rows > 0) {
        echo 'Error: Ya existe un producto con el mismo nombre.';
    } else {
        // Preparar la inserción del producto en la base de datos
        $nombre = $conexion->real_escape_string($jsonOBJ->nombre);
        $marca = $conexion->real_escape_string($jsonOBJ->marca);
        $modelo = $conexion->real_escape_string($jsonOBJ->modelo);
        $precio = floatval($jsonOBJ->precio);
        $detalles = $conexion->real_escape_string($jsonOBJ->detalles);
        $unidades = intval($jsonOBJ->unidades);

        // Realizar la inserción
        $query = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades) VALUES ('$nombre', '$marca', '$modelo', $precio, '$detalles', $unidades)";

        if ($conexion->query($query)) {
            echo 'Éxito: Producto insertado correctamente.';
        } else {
            echo 'Error: No se pudo insertar el producto.';
        }
    }
}
?>
