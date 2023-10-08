<?php

$hostname = "localhost"; 
$username = "root";     
$password = "Mitatanka1"; 
$database = "marketzone"; 

// Conexión a la base de datos
$conexion = new mysqli($hostname, $username, $password, $database);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $marca = $_POST["marca"];
    $modelo = $_POST["modelo"];
    $precio = $_POST["precio"];
    $detalles = $_POST["detalles"];
    $unidades = $_POST["unidades"];

    if (empty($name) || empty($marca) || empty($modelo) || empty($precio) || empty($detalles) || empty($unidades)) {
        echo "Todos los campos son obligatorios.";
    } else {
        // Validar que el precio sea un número con punto decimal
        if (!is_numeric($precio) || strpos($precio, '.') === false) {
            echo "El precio debe ser un número con punto decimal.";
        } else {
            
            $name = $conexion->real_escape_string($name);
            $marca = $conexion->real_escape_string($marca);
            $modelo = $conexion->real_escape_string($modelo);
            $precio = floatval($precio);
            $detalles = $conexion->real_escape_string($detalles);
            $unidades = intval($unidades);

            // Realizar la inserción en la base de datos
            $sql = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, eliminado) 
                    VALUES ('$name', '$marca', '$modelo', $precio, '$detalles', $unidades, 0)";

            if ($conexion->query($sql)) {
                // Éxito: mostrar resumen de los datos insertados
                echo "<h3>Producto registrado con éxito:</h3>";
                echo "<p>Nombre: $name</p>";
                echo "<p>Marca: $marca</p>";
                echo "<p>Modelo: $modelo</p>";
                echo "<p>Precio: $precio</p>";
                echo "<p>Detalles: $detalles</p>";
                echo "<p>Unidades: $unidades</p>";
            } else {
                // Error al insertar en la base de datos
                echo "Error al insertar el producto en la base de datos: " . $conexion->error;
            }
        }
    }
} else {
    // La solicitud no es de tipo POST
    echo "Acceso no autorizado.";
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
