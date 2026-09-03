<?php

require_once __DIR__ . "/../configuracion/conexion.php";
require_once __DIR__ . "/../modelos/EstadoMateria.php";

class EstadoMateriaControlador {

    private $estadoMateriaModelo;

    public function __construct(){
        global $conexion; 
        $this->estadoMateriaModelo = new EstadoMateria($conexion);
    }

    
     private function requireLogin(){
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: ?action=login');
            exit;
        }
    }

    public function historial(){
        $estadoMateria=$this->estadoMateriaModelo->getAll(); 
        require __DIR__ . "/../vistas/historial.php";
    }
        
    // Me lleva al panel de "administración" (solo administradores)
    public function administrar(){

        $this->requireLogin();

        $estadoMateria=$this->estadoMateriaModelo->getAll(); 
        require __DIR__ . "/../vistas/estados_materias/administrar.php";
    }

    public function crear(){

       $this->requireLogin();

        require __DIR__ . "/../vistas/estados_materias/crear.php";
    }

    public function guardar(){

        $this->requireLogin();

        $codigoMateria=trim($_POST["codigo_materia"]??""); 
        $idEstado=(int)($_POST["id_estado"]??-1);
        $anio=(int)($_POST["anio"]??0); 
        $nota=(int)($_POST["nota"]??null);
        

        if($nota === 0){
            $nota = null;
        }

        if($codigoMateria===""||$idEstado<0||$idEstado>4||$anio===0){ 
            die("El codigo de la materia, el id del estado y el año de la cursada son obligatorios.");
        }

        if($nota != null && $idEstado!=4){
            die("No se puede cargar una nota a una materia no aprobada");
        }

        if ($idEstado === 4 && $nota === null) {
            die("Una materia aprobada requiere obligatoriamente una nota.");
        }

        $this->estadoMateriaModelo->create($codigoMateria, $idEstado, $anio, $nota);
        header("Location: index.php?action=administrar"); 
        exit;
    }

    public function editar(){

        $this->requireLogin();

        $codigoMateria=trim($_GET["codigo_materia"]??""); if($codigoMateria === "") die("Codigo de Materia inválido.");
        $estadoMateria = $this->estadoMateriaModelo->getByCodigoMateria($codigoMateria); 

        if(!$estadoMateria){
            die("Materia no encontrada.");
        } 

        require __DIR__."/../vistas/estados_materias/editar.php";
    }

    public function actualizar(){

        $this->requireLogin();

        $codigoMateria=trim($_POST["codigo_materia"]??""); 
        $idEstado=(int)($_POST["id_estado"]??-1);
        $anio=(int)($_POST["anio"]??0); 
        $nota=(int)($_POST["nota"]??null);

        if($nota === 0){
            $nota = null;
        }

        if($codigoMateria===""||$idEstado<0||$idEstado>4||$anio===0){
            die("El codigo de la materia, el id del estado y el año de la cursada son obligatorios.");
        }

        if($nota != null && $idEstado!=4){
            die("No se puede cargar una nota a una materia no aprobada");
        }

        if ($idEstado === 4 && $nota === null) {
            die("Una materia aprobada requiere obligatoriamente una nota.");
        }

        $this->estadoMateriaModelo->update($codigoMateria, $idEstado, $anio, $nota);
        header("Location: index.php?action=administrar"); 
        exit;
    }

    public function eliminar(){

       $this->requireLogin();

        $codigoMateria=trim($_GET["codigo_materia"]??"");

        if($codigoMateria !== ""){
            $this->estadoMateriaModelo->delete($codigoMateria);
        } 

        header("Location: index.php?action=administrar"); exit;
    }
}