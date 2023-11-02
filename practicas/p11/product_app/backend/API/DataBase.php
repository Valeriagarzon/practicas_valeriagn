<?php

namespace API;

abstract class DataBase {
    protected $conexion;

    public function __construct($marketzone) {
        $this->conexion = @mysqli_connect(
            'localhost',
            'root',
            'Mitatanka1',
            'marketzone',
            $databaseName
        );

        if (!$this->conexion) {
            die('¡Base de datos NO conectada!');
        }
    }
}
