<?php

class Usuario {

    private $conexion;

    public function __construct($conexion){
        $this->conexion=$conexion;
    }

    public function getByUsuario($usuario){

        $s=$this->conexion->prepare(
        "SELECT 
            * 
        FROM administradores   
        WHERE usuario=?");

        $s->bind_param("s",$usuario); 
        $s->execute(); 
        return $s->get_result()->fetch_assoc();

    }

}
