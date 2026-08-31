<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Mi sitio web</title>
        <link rel="icon" type="image/png" href="recursos/imagenes/favicon.png">
        <link rel="stylesheet" href="recursos/css/principal.css">
    </head>
    <body>
        <header>
            <div class="encabezado">
                <span class="titulo-sitio">Mi sitio personal</span>
                <span class="autor">Delgado Facundo</span>
            </div> 
            <nav>
            <!-- Aunque el encabezado esta en vista/modulos debo ubicar los links como si el mismo fuera parte del index... es decir desde la raiz -->
            <a href="index.php?action=historial">Formación</a> 
            <a href="index.php?action=inicio">Presentación</a>
            <a href="index.php?action=contacto">Contacto</a>
            <a href="index.php?action=administrar">Administración</a>
            </nav> 
        </header>