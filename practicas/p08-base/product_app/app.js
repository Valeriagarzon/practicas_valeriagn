function agregarProducto(e) {
    e.preventDefault();

    var nombre = document.getElementById('name').value;
    var marca = document.getElementById('marca').value;
    var modelo = document.getElementById('modelo').value;
    var precio = document.getElementById('precio').value;
    var detalles = document.getElementById('detalles').value;
    var unidades = document.getElementById('unidades').value;

    // Realiza validaciones
    if (nombre.trim() === "") {
        alert('Por favor, ingresa el nombre del producto.');
        return;
    }

    if (marca.trim() === "") {
        alert('Por favor, ingresa la marca del producto.');
        return;
    }

    if (modelo.trim() === "") {
        alert('Por favor, ingresa el modelo del producto.');
        return;
    }

    if (isNaN(parseFloat(precio)) || parseFloat(precio) <= 99.99) {
        alert('El precio debe ser un número mayor a 99.99.');
        return;
    }

    if (isNaN(parseInt(unidades)) || parseInt(unidades) < 0) {
        alert('Las unidades deben ser un número mayor o igual a 0.');
        return;
    }

    var producto = {
        "nombre": nombre,
        "marca": marca,
        "modelo": modelo,
        "precio": parseFloat(precio),
        "detalles": detalles,
        "unidades": parseInt(unidades)
    };

    var client = getXMLHttpRequest();
    client.open('POST', './backend/create.php', true);
    client.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
    client.onreadystatechange = function () {
        if (client.readyState == 4 && client.status == 200) {
            var response = client.responseText;

            if (response.startsWith('Éxito')) {
                alert(response); // Muestra el mensaje de éxito
            } else {
                alert('Error: ' + response); // Muestra el mensaje de error
            }
        }
    };
    client.send(JSON.stringify(producto));
}

