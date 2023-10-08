<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtén los datos del formulario
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $precio = $_POST['precio'];
    $detalles = $_POST['detalles'];
    $unidades = $_POST['unidades'];

    // Realiza la actualización en la base de datos
    $link = new mysqli('localhost', 'root', 'Mitatanka1', 'marketzone');
    if ($link->connect_errno) {
        die('Falló la conexión: ' . $link->connect_error);
    }

    $sql = "UPDATE productos SET nombre='$nombre', marca='$marca', modelo='$modelo', precio=$precio, detalles='$detalles', unidades=$unidades WHERE id=$id";

    if ($link->query($sql) === true) {
        echo "Producto actualizado correctamente.";
    } else {
        echo "Error al actualizar el producto: " . $link->error;
    }

    $link->close();
} else {
    // La solicitud no es válida
    echo "Solicitud no válida.";
}
?>


