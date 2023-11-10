<?php
     namespace API\Actualizar;
     require_once __DIR__ . '/../DataBase/DataBase.php';
     use API\Database\DataBase as DataBase;
 
     class Actualizar extends DataBase{
        //FUNCION PARA EDITAR PRODUCTO
    public function edit($producto){
        $this->response = array(
            'status'  => 'error',
            'message' => 'No es posible actualizar'
        );
        
        if (isset($producto)) {
        
            $jsonOBJ = json_decode($producto);
            $sql_1 = "SELECT * FROM productos WHERE nombre = '{$jsonOBJ->nombre}' and marca = '{$jsonOBJ->marca}' and modelo = '{$jsonOBJ->modelo}' and precio = {$jsonOBJ->precio} and detalles = '{$jsonOBJ->detalles}' and unidades = {$jsonOBJ->unidades} and imagen = '{$jsonOBJ->imagen}'";
        
            $res = $this->conexion->query($sql_1);
        
            if ($res->num_rows == 0) {
                // SE ASUME QUE LOS DATOS YA FUERON VALIDADOS ANTES DE ENVIARSE
                $sql = "UPDATE productos SET nombre = '{$jsonOBJ->nombre}', marca = '{$jsonOBJ->marca}', modelo = '{$jsonOBJ->modelo}', precio = {$jsonOBJ->precio}, detalles = '{$jsonOBJ->detalles}', unidades = {$jsonOBJ->unidades}, imagen = '{$jsonOBJ->imagen}' WHERE id = '{$jsonOBJ->id}'";
                $result = $this->conexion->query($sql);
        
                $this->conexion->set_charset("utf8");
                if ($this->conexion->query($sql)) {
                    $this->response['status'] =  "success";
                    $this->response['message'] =  "Producto actualizado";
                } else {
                    $this->response['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($this->conexion);
                }
            } else {
                $this->response['status'] =  "success";
                $this->response['message'] =  "No es una actualizacion si son los mismos datos";
            }
            //$result->free();
            // Cierra la conexion
            $this->conexion->close();
        }
    }    
     }
?>