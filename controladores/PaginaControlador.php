<?php

    require_once __DIR__ . "/../configuracion/conexion.php";
    require_once __DIR__ . "/../modelos/EstadoMateria.php";

class PaginaControlador {

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

    // Manga a la página de inicio (no forma parte del crud como tal).
    public function inicio(){
        require __DIR__ . "/../vistas/inicio.php";
    }

    // Manga a la página de inicio (no forma parte del crud como tal).
    public function contacto(){
        require __DIR__ . "/../vistas/contacto.php";
    }

}