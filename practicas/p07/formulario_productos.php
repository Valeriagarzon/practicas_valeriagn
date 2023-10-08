<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Modificar Productos</title>
    <style type="text/css">
        ol,
        ul {
            list-style-type: none;
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Obtén el ID del producto seleccionado de la URL
            const urlParams = new URLSearchParams(window.location.search);
            const id = urlParams.get("id");

            // Rellena los campos con la información del producto seleccionado
            document.getElementById("form-id").value = id; // Campo oculto para el ID
            document.getElementById("form-name").value = "<?php echo !empty($_POST['nombre']) ? $_POST['nombre'] : $_GET['nombre']; ?>";
            document.getElementById("form-marca").value = "<?php echo !empty($_POST['marca']) ? $_POST['marca'] : $_GET['marca']; ?>";
            document.getElementById("form-modelo").value = "<?php echo !empty($_POST['modelo']) ? $_POST['modelo'] : $_GET['modelo']; ?>";
            document.getElementById("form-precio").value = "<?php echo !empty($_POST['precio']) ? $_POST['precio'] : $_GET['precio']; ?>";
            document.getElementById("form-detalles").value = "<?php echo !empty($_POST['detalles']) ? $_POST['detalles'] : $_GET['detalles']; ?>";
            document.getElementById("form-unidades").value = "<?php echo !empty($_POST['unidades']) ? $_POST['unidades'] : $_GET['unidades']; ?>";

            // Validación del formulario (puedes mantener la validación anterior)
            var formulario = document.getElementById("formulario_productos");

            formulario.addEventListener("submit", function (event) {
                var nombre = document.getElementById("form-name").value;
                var marca = document.getElementById("form-marca").value;
                var modelo = document.getElementById("form-modelo").value;
                var precio = parseFloat(document.getElementById("form-precio").value);
                var detalles = document.getElementById("form-detalles").value;
                var unidades = parseInt(document.getElementById("form-unidades").value);

                // Validación del nombre (a)
                if (nombre.trim() === "" || nombre.length > 100) {
                    alert("El nombre es requerido y debe tener 100 caracteres o menos.");
                    event.preventDefault();
                    return;
                }

                // Validación de la marca (b)
                if (marca.trim() === "") {
                    alert("La marca es requerida.");
                    event.preventDefault();
                    return;
                }

                // Validación del modelo (c)
                if (modelo.trim() === "" || modelo.length > 25 || !/^[a-zA-Z0-9]+$/.test(modelo)) {
                    alert("El modelo es requerido, debe ser alfanumérico y tener 25 caracteres o menos.");
                    event.preventDefault();
                    return;
                }

                // Validación del precio (d)
                if (isNaN(precio) || precio <= 99.99) {
                    alert("El precio es requerido y debe ser mayor a 99.99.");
                    event.preventDefault();
                    return;
                }

                // Validación de los detalles (e)
                if (detalles.length > 250) {
                    alert("Los detalles deben tener 250 caracteres o menos.");
                    event.preventDefault();
                    return;
                }

                // Validación de las unidades (f)
                if (isNaN(unidades) || unidades < 0) {
                    alert("Las unidades son requeridas y deben ser un número mayor o igual a 0.");
                    event.preventDefault();
                    return;
                }
            });
        });
    </script>
</head>

<body>

    <h2>Modificar Producto</h2>
    <form id="formulario_productos" action="actualizar_producto.php" method="post">

        <fieldset>
            <legend>Modificar Producto</legend>

            <!-- Campo oculto para enviar el ID -->
            <input type="hidden" name="id" id="form-id" value="">

            <ul>
                <li><label for="form-name">Nombre:</label> <input type="text" name="nombre" id="form-name" required></li> <br>
                <li><label for="form-marca">Marca:</label> <input type="text" name="marca" id="form-marca" required></li> <br>
                <li><label for="form-modelo">Modelo:</label> <input type="text" name="modelo" id="form-modelo" required></li> <br>
                <li><label for="form-precio">Precio:</label> <input type="number" step="0.01" name="precio" id="form-precio" required></li> <br>
                <li><label for="form-detalles">Detalles:</label><br><textarea name="detalles" rows="4" cols="60" id="form-detalles" placeholder="No más de 300 caracteres de longitud" required></textarea></li> <br>
                <li><label for="form-unidades">Unidades:</label> <input type="number" name="unidades" id="form-unidades" required></li> <br>
                <li><label for="form-imagen">Imagen:</label> <input type="file" name="imagen" id="form-imagen" accept="image/*"></li> <br>
            </ul>
        </fieldset>
        <input type="submit" value="Actualizar Producto">
    </form>

</body>

</html>