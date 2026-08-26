<?php
    try {
        $conn = new PDO("mysql:host=localhost;dbname=estado_academico", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e){
        echo "Conexión fallida: " . $e->getMessage(); 
    }
?>