<?php
include_once __DIR__.'/database.php';

// SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
$data = array();

// SE VERIFICA HABER RECIBIDO EL TEXTO DE BÚSQUEDA
if (isset($_POST['search'])) {
    $search = $_POST['search'];

    // SE REALIZA LA QUERY DE BÚSQUEDA UTILIZANDO LA CLÁUSULA LIKE
    $query = "SELECT * FROM productos WHERE nombre LIKE '%$search%' OR marca LIKE '%$search%' OR detalles LIKE '%$search%'";

    if ($result = $conexion->query($query)) {
        // SE OBTIENEN LOS RESULTADOS Y SE LOS GUARDA EN UN ARRAY
        $products = array();

        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            // SE CODIFICAN A UTF-8 LOS DATOS Y SE MAPEAN AL ARREGLO DE RESPUESTA
            $product = array();
            foreach ($row as $key => $value) {
                $product[$key] = utf8_encode($value);
            }
            $products[] = $product;
        }

        $data['products'] = $products;
        $result->free();
    } else {
        die('Query Error: ' . mysqli_error($conexion));
    }
    $conexion->close();
}

// SE HACE LA CONVERSIÓN DE ARRAY A JSON
echo json_encode($data, JSON_PRETTY_PRINT);
?>

