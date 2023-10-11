<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de productos</title>
</head>
<body>
<form id="formulario"  method="post" enctype="multipart/form-data">

<h2>Modificar productos</h2>

  <fieldset>
    <legend>Ingresa la nueva información a editar</legend>

    <ul>
      <li><label for="form-name">Nombre:</label> <input type="text" name="nombre" value="<?= !empty($_POST['nombre'])?$_POST['nombre']:$_GET['nombre'] ?>"></li><br>
      <li><label for="form-marca">Marca:</label> <input type="text" name="marca" value="<?= !empty($_POST['marca'])?$_POST['marca']:$_GET['marca'] ?>"></li><br>
      <li><label for="form-modelo">Modelo:</label> <input type="text" name="modelo" value="<?= !empty($_POST['modelo'])?$_POST['modelo']:$_GET['modelo'] ?>"></li><br>
      <li><label for="form-precio">Precio:</label> <input type="text" name="precio" value="<?= !empty($_POST['precio'])?$_POST['precio']:$_GET['precio'] ?>"></li><br>
      <li><label for="form-detalles">Detalles: </label><br><textarea name="detalles" rows="4" cols="60" id="form-detalles" placeholder="No más de 300 caracteres de longitud"></textarea> <br>
      <li><label for="form-unidades">Unidades:</label> <input type="text" name="unidades" value="<?= !empty($_POST['unidades'])?$_POST['unidades']:$_GET['unidades'] ?>"></li><br>
      <li><label for="form-imagen">Agrega una imagen:</label> <input type="file" name="imagen" accept="image/*" value="<?= !empty($_POST['imagen'])?$_POST['imagen']:$_GET['imagen'] ?>"></li><br>
    </ul>
  </fieldset>
  <input type="submit" value="Modificar">
</form> <br>



<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    /* MySQL Conexion */
    $link = mysqli_connect("localhost", "root", "Mitatanka1", "marketzone");
    // Chequea conección
    if ($link === false) {
        die("ERROR: No pudo conectarse con la DB. " . mysqli_connect_error());
    }

    // Obtener los valores del formulario
    $nombre = $_POST['nombre'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $precio = $_POST['precio'];
    $detalles = $_POST['detalles'];
    $unidades = $_POST['unidades'];

    // Ejecuta la actualización del registro
    $sql = "UPDATE productos SET nombre='$nombre', marca='$marca', modelo='$modelo', precio='$precio', detalles='$detalles', unidades='$unidades' where id= 5";
    if (mysqli_query($link, $sql)) {
        echo "Registro actualizado.";
    } else {
        echo "ERROR: No se ejecutó $sql. " . mysqli_error($link);
    }

    // Cierra la conexión
    mysqli_close($link);
}
?>

    
</body>
</html>


