<?php
    namespace API\Eliminar;
    require_once __DIR__ . '/../DataBase/DataBase.php';
    use API\Database\DataBase as DataBase;

    class Eliminar extends DataBase{
    //FUNCION PARA ELIMINAR PRODUCTO
    public function delete($id){
        // SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
    $this->response = array(
        'status'  => 'error',
        'message' => 'La consulta falló'
    );
    // SE VERIFICA HABER RECIBIDO EL ID
    if( isset($_POST['id']) ) {
        $id = $_POST['id'];
        // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
        $sql = "UPDATE productos SET eliminado=1 WHERE id = {$id}";
        if ( $this->conexion->query($sql) ) {
            $this->response['status'] =  "success";
            $this->response['message'] =  "Producto eliminado";
		} else {
            $this->response['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($this->conexion);
        }
		$this->conexion->close();
    } 
    }
    }
?>