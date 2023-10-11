<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">

<?php
if (isset($_GET['tope'])) {
    $tope = $_GET['tope'];
} else {
    die('Parámetro "tope" no detectado...');
}

/** SE CREA EL OBJETO DE CONEXIÓN */
@$link = new mysqli('localhost', 'root', 'Mitatanka1', 'marketzone');
if ($link->connect_errno) {
    @die('Falló la conexión: ' . $link->connect_error . '<br/>');
}

/** Crear una tabla que no devuelve un conjunto de resultados */
if ($result = $link->query("SELECT * FROM productos WHERE unidades <= $tope AND eliminado = 0")) {
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Productos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
</head>
<body>

<p>
    <a href="http://validator.w3.org/check?uri=referer"><img
      src="http://www.w3.org/Icons/valid-xhtml11" alt="Valid XHTML 1.1" height="31" width="88" /></a>
  </p>

    <h3>PRODUCTOS</h3>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Marca</th>
                <th scope="col">Modelo</th>
                <th scope="col">Precio</th>
                <th scope="col">Unidades</th>
                <th scope="col">Detalles</th>
                <th scope="col">Imagen</th>
                <th scope="col">Editar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $row) : ?>
                <tr>
                    <th scope="row"><?= $row['id'] ?></th>
                    <td><?= $row['nombre'] ?></td>
                    <td><?= $row['marca'] ?></td>
                    <td><?= $row['modelo'] ?></td>
                    <td><?= $row['precio'] ?></td>
                    <td><?= $row['unidades'] ?></td>
                    <td><?= $row['detalles'] ?></td>
                    <td><img src="<?= $row['imagen'] ?>" alt="Imagen del producto" /></td>
                    <td><input type="button" 
                               value="Editar" 
                               onclick="confirmEdit('<?= $row['nombre'] ?>', '<?= $row['marca'] ?>', '<?= $row['modelo'] ?>', '<?= $row['precio'] ?>', '<?= $row['unidades'] ?>', '<?= $row['detalles'] ?>', '<?= $row['imagen'] ?>')" /></td> 
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php
    /** Útil para liberar memoria asociada a un resultado con demasiada información */
    $result->free();
} else {
    echo '<p>No se encontraron productos.</p>';
}

$link->close();
?>
<script>
    function confirmEdit(nombre, marca, modelo, precio, unidades, detalles, imagen) {
        var confirmationMessage = "Se editará este Producto\n\n";
        confirmationMessage += "Nombre: " + nombre + "\n";
        confirmationMessage += "Marca: " + marca + "\n";
        confirmationMessage += "Modelo: " + modelo + "\n";
        confirmationMessage += "Precio: " + precio + "\n";
        confirmationMessage += "Unidades: " + unidades + "\n";
        confirmationMessage += "Detalles: " + detalles + "\n";
        confirmationMessage += "Imagen: " + imagen + "\n";

        if (confirm(confirmationMessage)) {
            send2form(nombre, marca, modelo, precio, unidades, detalles, imagen);
        }
    }

    function send2form(nombre, marca, modelo, precio, unidades, detalles, imagen) {
        var form = document.createElement("form");

        var nombreIn = document.createElement("input");
        nombreIn.type = 'text';
        nombreIn.name = 'nombre';
        nombreIn.value = nombre;
        form.appendChild(nombreIn);

        var marcaIn = document.createElement("input");
        marcaIn.type = 'text';
        marcaIn.name = 'marca';
        marcaIn.value = marca;
        form.appendChild(marcaIn);

        var modeloIn = document.createElement("input");
        modeloIn.type = 'text';
        modeloIn.name = 'modelo';
        modeloIn.value = modelo;
        form.appendChild(modeloIn);

        var precioIn = document.createElement("input");
        precioIn.type = 'number';
        precioIn.name = 'precio';
        precioIn.value = precio;
        form.appendChild(precioIn);

        var unidadesIn = document.createElement("input");
        unidadesIn.type = 'number';
        unidadesIn.name = 'unidades';
        unidadesIn.value = unidades;
        form.appendChild(unidadesIn);

        var detallesIn = document.createElement("input");
        detallesIn.type = 'text';
        detallesIn.name = 'detalles';
        detallesIn.value = detalles;
        form.appendChild(detallesIn);

        var imagenIn = document.createElement("input");
        imagenIn.type = 'text';
        imagenIn.name = 'imagen';
        imagenIn.value = imagen;
        form.appendChild(imagenIn);

        console.log(form);

        form.method = 'POST';
        form.action = 'http://localhost/practicas_valeriagn/practicas/p07/formulario_productos_v3.php';

        document.body.appendChild(form);
        form.submit();
    }
</script>

</body>
</html>

