<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Registro de Productos</title>
    <style type="text/css">
        ol,
        ul {
            list-style-type: none;
        }
    </style>
</head>

<body>

    <h2>Registro de nuevos productos</h2>
    <form id="formulario_productos" action="set_producto_v2.php" method="post">

        <fieldset>
            <legend>Registra nuevos productos</legend>

            <ul>
                <li><label for="form-name">Nombre:</label> <input type="text" name="name" id="form-name" required></li> <br>
                <li><label for="form-marca">Marca:</label> <input type="text" name="marca" id="form-marca" required></li> <br>
                <li><label for="form-modelo">Modelo:</label> <input type="text" name="modelo" id="form-modelo" required></li> <br>
                <li><label for="form-precio">Precio:</label> <input type="number" step="0.01" name="precio" id="form-precio" required></li> <br>
                <li><label for="form-detalles">Detalles:</label><br><textarea name="detalles" rows="4" cols="60" id="form-detalles" placeholder="No más de 300 caracteres de longitud" required></textarea></li> <br>
                <li><label for="form-unidades">Unidades:</label> <input type="number" name="unidades" id="form-unidades" required></li> <br>
                <li><label for="form-imagen">Imagen:</label> <input type="file" name="imagen" id="form-imagen" accept="image/*" required></li> <br>
            </ul>
        </fieldset>
        <input type="submit" value="Agregar nuevo producto">
    </form>

</body>

</html>
