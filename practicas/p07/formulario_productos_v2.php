<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        ol,
        ul {
            list-style-type: none;
        }
    </style>
    <title>Formulario</title>
    <script>
        function actualizarProducto() {
            var id = document.getElementById("form-id").value;
            var nombre = document.getElementById("form-nombre").value;
            var marca = document.getElementById("form-marca").value;
            var modelo = document.getElementById("form-modelo").value;
            var precio = parseFloat(document.getElementById("form-precio").value);
            var detalles = document.getElementById("form-detalles").value;
            var unidades = parseInt(document.getElementById("form-unidades").value);

            // Validación de los campos (similar a tu código)

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "formulario_productos_v3.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                  
                    alert("Producto actualizado correctamente");
              
                    window.location.href = "get_productos_vigentes_v2.php";
                }
            };
            xhr.send("id=" + id + "&nombre=" + nombre + "&marca=" + marca + "&modelo=" + modelo + "&precio=" + precio + "&detalles=" + detalles + "&unidades=" + unidades);
        }
    </script>
</head>
<body>
    <h1>Datos Producto</h1>

    <form id="miFormulario">
        <input type="hidden" id="form-id" value="<?= isset($_GET['id']) ? $_GET['id'] : ''; ?>">
        <fieldset>
            <legend>Actualiza los datos del producto:</legend>
            <ul>
                <li><label>Nombre:</label> <input type="text" name="nombre" id="form-nombre" value="<?= !empty($_POST['nombre']) ? $_POST['nombre'] : $_GET['nombre'] ?>"></li>
                <li><label>Marca:</label> <input type="text" name="marca" id="form-marca" value="<?= !empty($_POST['marca']) ? $_POST['marca'] : $_GET['marca'] ?>"></li>
                <li><label>Modelo:</label> <input type="text" name="modelo" id="form-modelo" value="<?= !empty($_POST['modelo']) ? $_POST['modelo'] : $_GET['modelo'] ?>"></li>
                <li><label>Precio:</label> <input type="text" name="precio" id="form-precio" value="<?= !empty($_POST['precio']) ? $_POST['precio'] : $_GET['precio'] ?>"></li>
                <li><label>Unidades:</label> <input type="text" name="unidades" id="form-unidades" value="<?= !empty($_POST['unidades']) ? $_POST['unidades'] : $_GET['unidades'] ?>"></li>
                <li><label>Detalles:</label> <input type="text" name="detalles" id="form-detalles" value="<?= !empty($_POST['detalles']) ? $_POST['detalles'] : $_GET['detalles'] ?>"></li>
            </ul>
        </fieldset>
        <p>
            <input type="button" value="ENVIAR" onclick="actualizarProducto()">
        </p>
    </form>
</body>
</html>

