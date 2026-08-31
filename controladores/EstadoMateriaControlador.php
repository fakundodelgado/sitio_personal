<?php

require_once __DIR__ . "/../configuracion/conexion.php";
require_once __DIR__ . "/../modelos/EstadoMateria.php";

class EstadoMateriaControlador {

    private $estadoMateriaModelo;

    public function __construct(){
        global $conexion; 
        $this->estadoMateriaModelo = new EstadoMateria($conexion);
    }

    // Me lleva a la paginita donde se ven mis materias (para cualquier usuario)
    public function historial(){
        $estadoMateria=$this->estadoMateriaModelo->getAll(); 
        require __DIR__ . "/../vistas/historial.php";
    }

    // Me lleva al panel de "administración" (solo administradores)
    public function administrar(){
        $estadoMateria=$this->estadoMateriaModelo->getAll(); 
        require __DIR__ . "/../vistas/estados_materias/administrar.php";
    }

    public function crear(){
        require __DIR__ . "/../vistas/estados_materias/crear.php";
    }

    public function guardar(){
        $codigoMateria=trim($_POST["codigo_materia"]??""); 
        $idEstado=(int)($_POST["id_estado"]??0);
        $anio=(int)($_POST["anio"]??0); 
        $nota=(int)($_POST["nota"]??0);
        

        if($nota === 0){
            $nota = null;
        }

        if($codigoMateria===""||$idEstado===0||$anio===0){ 
            die("El codigo de la materia, el id del estado y el año de la cursada son obligatorios.");
        }

        $this->estadoMateriaModelo->create($codigoMateria, $idEstado, $anio, $nota);
        header("Location: index.php?action=administrar"); 
        exit;
    }

    public function editar(){
        $codigoMateria=trim($_GET["codigo_materia"]??""); if($codigoMateria === "") die("Codigo de Materia inválido.");
        $estadoMateria=$this->estadoMateriaModelo->getByCodigoMateria($codigoMateria); 

        if(!$estadoMateria){
            die("Materia no encontrada.");
        } 

        require __DIR__."/../vistas/estados_materias/editar.php";
    }

    public function actualizar(){
        $codigoMateria=trim($_POST["codigo_materia"]??""); 
        $idEstado=(int)($_POST["id_estado"]??0);
        $anio=(int)($_POST["anio"]??0); 
        $nota=(int)($_POST["nota"]??0);

        if($nota === 0){
            $nota = null;
        }

        if($codigoMateria===""||$idEstado===0||$anio===0){
            die("El codigo de la materia, el id del estado y el año de la cursada son obligatorios.");
        }

        $this->estadoMateriaModelo->update($codigoMateria, $idEstado, $anio, $nota);
        header("Location: index.php?action=administrar"); 
        exit;
    }

    public function eliminar(){
        $codigoMateria=trim($_GET["codigo_materia"]??"");

        if($codigoMateria !== ""){
            $this->estadoMateriaModelo->delete($codigoMateria);
        } 

        header("Location: index.php?action=administrar"); exit;
    }
}