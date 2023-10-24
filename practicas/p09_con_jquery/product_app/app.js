var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
  };
  
  $(document).ready(function() {
    init();
    listarProductos();
  
    $('#search-form').submit(function(e) {
      e.preventDefault();
      buscarProducto();
    });
  
    $('#product-form').submit(function(e) {
      e.preventDefault();
      agregarProducto();
    });
  });
  
  function init() {
    var jsonString = JSON.stringify(baseJSON, null, 2);
    $('#description').val(jsonString);
  }
  
  function listarProductos() {
    $.get('./backend/product-list.php', function(data) {
      var productos = JSON.parse(data);
  
      if (productos.length > 0) {
        var template = '';
  
        productos.forEach(function(producto) {
          var descripcion = '<ul>';
          descripcion += '<li>precio: ' + producto.precio + '</li>';
          descripcion += '<li>unidades: ' + producto.unidades + '</li>';
          descripcion += '<li>modelo: ' + producto.modelo + '</li>';
          descripcion += '<li>marca: ' + producto.marca + '</li>';
          descripcion += '<li>detalles: ' + producto.detalles + '</li>';
          descripcion += '</ul>';
  
          template += `
            <tr productId="${producto.id}">
              <td>${producto.id}</td>
              <td>${producto.nombre}</td>
              <td>${descripcion}</td>
              <td>
                <button class="product-delete btn btn-danger">
                  Eliminar
                </button>
              </td>
            </tr>
          `;
        });
  
        $('#products').html(template);
      }
    });
  }
  
  function buscarProducto() {
    var search = $('#search').val();
  
    $.get('./backend/product-search.php?search=' + search, function(data) {
      var productos = JSON.parse(data);
  
      if (productos.length > 0) {
        var template = '';
        var template_bar = '';
  
        productos.forEach(function(producto) {
          var descripcion = '<ul>';
          descripcion += '<li>precio: ' + producto.precio + '</li>';
          descripcion += '<li>unidades: ' + producto.unidades + '</li>';
          descripcion += '<li>modelo: ' + producto.modelo + '</li>';
          descripcion += '<li>marca: ' + producto.marca + '</li>';
          descripcion += '<li>detalles: ' + producto.detalles + '</li>';
          descripcion += '</ul>';
  
          template += `
            <tr productId="${producto.id}">
              <td>${producto.id}</td>
              <td>${producto.nombre}</td>
              <td>${descripcion}</td>
              <td>
                <button class="product-delete btn btn-danger">
                  Eliminar
                </button>
              </td>
            </tr>
          `;
  
          template_bar += `<li>${producto.nombre}</li>`;
        });
  
        $('#product-result').removeClass('d-none');
        $('#container').html(template_bar);
        $('#products').html(template);
      }
    });
  }
  
  function agregarProducto() {
    var productoJsonString = $('#description').val();
    var finalJSON = JSON.parse(productoJsonString);
    finalJSON['nombre'] = $('#name').val();
    productoJsonString = JSON.stringify(finalJSON, null, 2);
  
    // Aquí deberías agregar las validaciones del JSON antes de enviarlo
  
    $.ajax({
      type: 'POST',
      url: './backend/product-add.php',
      data: productoJsonString,
      contentType: 'application/json; charset=UTF-8',
      success: function(data) {
        console.log(data);
        var respuesta = JSON.parse(data);
        var template_bar = '';
        template_bar += `<li style="list-style: none;">status: ${respuesta.status}</li>`;
        template_bar += `<li style="list-style: none;">message: ${respuesta.message}</li>`;
        $('#product-result').removeClass('d-none');
        $('#container').html(template_bar);
        listarProductos();
      }
    });
  }
  
  $(document).on('click', '.product-delete', function() {
    if (confirm('¿De verdad deseas eliminar el producto?')) {
      var id = $(this).closest('tr').attr('productId');
  
      $.get('./backend/product-delete.php?id=' + id, function(data) {
        console.log(data);
        var respuesta = JSON.parse(data);
        var template_bar = '';
        template_bar += `<li style="list-style: none;">status: ${respuesta.status}</li>`;
        template_bar += `<li style="list-style: none;">message: ${respuesta.message}</li>`;
        $('#product-result').removeClass('d-none');
        $('#container').html(template_bar);
        listarProductos();
      });
    }
  });
  
  