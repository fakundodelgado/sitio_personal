<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "seguimiento_academico";

    $conexion = new mysqli($host, $user, $password, $database);

    if($conexion->connect_error){
        die("Error de conexión: " .$conexion->connect_error);
    }

    $conexion->set_charset("utf8mb4");
