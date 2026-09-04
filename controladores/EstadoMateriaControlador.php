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

        $errorHis = "";

        $estadoMateria=$this->estadoMateriaModelo->getAll();

        if ($estadoMateria === false) {
            $errorHis = "Ocurrió un error al cargar la lista de materias.";
            $estadoMateria = [];
        }
         
        require __DIR__ . "/../vistas/historial.php";
    }
        
    // Me lleva al panel de "administración" (solo administradores)
    public function administrar(){

        $this->requireLogin();

        $errorAct = $_SESSION["error-act"] ?? "";
        unset($_SESSION["error-act"]);

        $estadoMateria=$this->estadoMateriaModelo->getAll();
        
        if ($estadoMateria === false) {
            $errorAct = "Ocurrió un error al cargar la lista de materias.";
            $estadoMateria = [];
        }

        require __DIR__ . "/../vistas/estados_materias/administrar.php";
    }

    public function crear(){

        $this->requireLogin();

        $errorCrea = $_SESSION['error-crea'] ?? null;
        unset($_SESSION['error-crea']);

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
            $_SESSION['error-crea'] = "El codigo de la materia, el id del estado y el año de la cursada son obligatorios.";
            header("Location: ?action=crear");
            exit; 
        }

        if($nota != null && $idEstado!=4){
            $_SESSION['error-crea'] = "No se puede cargar una nota a una materia no aprobada";
            header("Location: ?action=crear");
            exit; 
        }

        if ($idEstado === 4 && $nota === null) {
            $_SESSION['error-crea'] = "Una materia aprobada requiere obligatoriamente una nota.";
            header("Location: ?action=crear");
            exit; 
        }

        $resultado = $this->estadoMateriaModelo->create($codigoMateria, $idEstado, $anio, $nota);

        if(!$resultado){
            $_SESSION['error-crea'] = "Ocurrio un error al guardar la materia.";
            header("Location: ?action=crear");
            exit; 
        }
        
        header("Location: ?action=administrar");         
        exit;
    }

    public function editar(){

        $this->requireLogin();

        $codigoMateria=trim($_GET["codigo_materia"]??""); 
        
        if($codigoMateria === ""){
            $_SESSION["error-act"] = "Codigo de Materia inválido.";
            header("Location: ?action=administrar");
            exit;
        }

        $estadoMateria = $this->estadoMateriaModelo->getByCodigoMateria($codigoMateria); 

        if(!$estadoMateria){
            $_SESSION["error-act"] = "Materia no encontrada.";
            header("Location: ?action=administrar");         
            exit;
        }
        
        $errorAct = $_SESSION["error-act"] ?? "";
        unset($_SESSION["error-act"]);

        require __DIR__."/../vistas/estados_materias/editar.php";

    }

    public function actualizar(){

        $this->requireLogin();

        $codigoMateria=trim($_POST["codigo_materia"]??""); 
        $idEstado=(int)($_POST["id-estado"]??-1);
        $anio=(int)($_POST["anio"]??0); 
        $nota=(int)($_POST["nota"]??null);

        if($nota === 0){
            $nota = null;
        }

        if($codigoMateria===""||$idEstado<0||$idEstado>4||$anio===0){
            $_SESSION["error-act"] = "El codigo de la materia, el id del estado y el año de la cursada son obligatorios.";
            header("Location: ?action=editar&codigo_materia={$codigoMateria}");
            exit;
        }

        if($nota != null && $idEstado!=4){
            $_SESSION["error-act"] = "No se puede cargar una nota a una materia no aprobada";
            header("Location: ?action=editar&codigo_materia={$codigoMateria}");
            exit;
        }

        if ($idEstado === 4 && $nota === null) {
            $_SESSION["error-act"] = "Una materia aprobada requiere obligatoriamente una nota.";
            header("Location: ?action=editar&codigo_materia={$codigoMateria}");
            exit;
        }

        $resultado = $this->estadoMateriaModelo->update($codigoMateria, $idEstado, $anio, $nota);

        if(!$resultado){
            $_SESSION['error-act'] = "Ocurrio un error al actualizar la materia.";
            header("Location: ?action=editar&codigo_materia={$codigoMateria}");
            exit; 
        }

        header("Location: ?action=administrar"); 
        exit;
    }

    public function eliminar(){

        $this->requireLogin();

        $codigoMateria=trim($_GET["codigo_materia"]??"");

        // Como tanto este como el error de actualización van a para a la misma vista puedo usar la misma variable
        if($codigoMateria === ""){
            $_SESSION['error-act'] = "Es obligatorio pasar un codigo de materia a eliminar.";
            header("Location: ?action=administrar");
            exit; 
        }
        
        $resultado = $this->estadoMateriaModelo->delete($codigoMateria);

        if(!$resultado){
            $_SESSION['error-act'] = "Ocurrio un error al eliminar la materia.";
            header("Location: ?action=administrar");
            exit; 
        }
        
        header("Location: ?action=administrar"); 
        exit;
    }
}