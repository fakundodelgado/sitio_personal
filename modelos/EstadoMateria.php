<?php

class EstadoMateria {
    
    private $conexion;

    public function __construct($conexion){
        $this->conexion=$conexion;
    }

    public function getAll(){
        return $this->conexion->query(
        "SELECT 
            * 
        FROM estado_x_materia
        INNER JOIN materias USING (codigo_materia) 
        INNER JOIN estados USING (id_estado)
        WHERE
            visible=1 
        ORDER BY 
            codigo_materia,anio_carrera,cuatrimestre_carrera DESC"
        );
    }

    public function getByCodigoMateria($codigoMateria){
        $s=$this->conexion->prepare(
        "SELECT 
            * 
        FROM estado_x_materia  
        INNER JOIN materias USING (codigo_materia) 
        INNER JOIN estados USING (id_estado) 
        WHERE codigo_materia=?");

        $s->bind_param("s",$codigoMateria); 
        $s->execute(); 
        return $s->get_result()->fetch_assoc();
    }

    // Aqui se utiliza una inserción que en caso de que el codigo_carrera que es PK ya exista (la fila debe estar oculta) lo que se hace es actualizar los datos.
    public function create($codigoMateria, $idEstado, $anio, $nota){
        $s=$this->conexion->prepare(
        "INSERT INTO 
            estado_x_materia (codigo_materia, id_estado, anio, nota, visible) 
         VALUES 
            (?, ?, ?, ?, 1)
         ON DUPLICATE KEY UPDATE 
            id_estado = VALUES(id_estado),
            anio = VALUES(anio),
            nota = VALUES(nota),
            visible = 1");
        $s->bind_param("siii",$codigoMateria,$idEstado,$anio,$nota); 
        return $s->execute();
    }

    public function update($codigoMateria, $idEstado, $anio, $nota){
        $s=$this->conexion->prepare(
        "UPDATE 
            estado_x_materia 
        SET 
            id_estado=?,anio=?,nota=?
        WHERE 
            codigo_materia=?");
        $s->bind_param("iiis",$idEstado,$anio,$nota,$codigoMateria); 
        return $s->execute();
    }

    public function delete($codigoMateria){
        $s=$this->conexion->prepare(
        "UPDATE 
            estado_x_materia 
        SET 
            visible=0 
        WHERE 
            codigo_materia=?");
        $s->bind_param("s",$codigoMateria); 
        return $s->execute();
    }
}