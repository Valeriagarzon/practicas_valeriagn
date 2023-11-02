<?php

namespace API;

class Productos extends DataBase {
    protected $response = array();

    public function __construct($marketzone) {
        parent::__construct($marketzone);
    }

    public function getResponse() {
        return json_encode($this->response, JSON_PRETTY_PRINT);
    }

    public function agregarProducto($data) {
        $nombre = $data->nombre;
        $marca = $data->marca;
        $modelo = $data->modelo;
        $precio = $data->precio;
        $detalles = $data->detalles;
        $unidades = $data->unidades;
        $imagen = $data->imagen;

       
        $sql = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen, eliminado) 
                VALUES ('$nombre', '$marca', '$modelo', $precio, '$detalles', $unidades, '$imagen', 0)";

        if ($this->conexion->query($sql)) {
            return true;
        } else {
            return "Error al agregar el producto: " . $this->conexion->error;
        }
    }

    public function eliminarProducto($id) {
        $sql = "UPDATE productos SET eliminado=1 WHERE id = $id";

        if ($this->conexion->query($sql)) {
            return true;
        } else {
            return "Error al eliminar el producto: " . $this->conexion->error;
        }
    }

    public function actualizarProducto($data) {
        $id = $data->id;
        $nombre = $data->nombre;
        $marca = $data->marca;
        $modelo = $data->modelo;
        $precio = $data->precio;
        $detalles = $data->detalles;
        $unidades = $data->unidades;
        $imagen = $data->imagen;

        
        $sql = "UPDATE productos 
                SET nombre='$nombre', marca='$marca', modelo='$modelo', precio=$precio, detalles='$detalles', unidades=$unidades, imagen='$imagen'
                WHERE id=$id";

        if ($this->conexion->query($sql)) {
            return true;
        } else {
            return "Error al actualizar el producto: " . $this->conexion->error;
        }
    }

    public function listarProductos() {
        $productos = array();

        // Implementa la lógica para obtener la lista de productos desde la base de datos
        $sql = "SELECT * FROM productos WHERE eliminado = 0";
        $result = $this->conexion->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $productos[] = $row;
            }
        }

        return $productos;
    }

    public function buscarProductos($search) {
        $productos = array();

        // Implementa la lógica para buscar productos en base al criterio de búsqueda
        $search = $this->conexion->real_escape_string($search);
        $sql = "SELECT * FROM productos WHERE (id = '$search' OR nombre LIKE '%$search%' OR marca LIKE '%$search%' OR detalles LIKE '%$search%') AND eliminado = 0";
        $result = $this->conexion->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $productos[] = $row;
            }
        }

        return $productos;
    }

    public function obtenerProducto($id) {
        $producto = null;

        // Implementa la lógica para obtener detalles de un producto específico
        $sql = "SELECT * FROM productos WHERE id = $id";
        $result = $this->conexion->query($sql);

        if ($result->num_rows > 0) {
            $producto = $result->fetch_assoc();
        }

        return $producto;
    }

    public function cerrarConexion() {
        $this->conexion->close();
    }

}


