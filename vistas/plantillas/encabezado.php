<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <title>Mi sitio web</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="recursos/imagenes/favicon.png">
        <link rel="stylesheet" href="recursos/css/estilos.css">
        <script src="recursos/js/script.js" defer></script> 
    </head>

    <body>
        <div class="row">
            <header class="col-12 col-s-12">

                <div class="encabezado">
                    <span id="titulo-sitio">Mi sitio personal</span>
                    <span id="autor">Delgado Facundo</span>
                </div> 

                <!-- Esto es para un intento de menú desplegable para las pantallas de celulars -->
                <button id="btn-menu" class="btn-menu">☰ Menú</button>   
            </header>

            <nav id="nav-menu" class="nav-menu col-12 col-s-3">
                <!-- Aunque el encabezado esta en vista/modulos debo ubicar los links como si el mismo fuera parte del index... es decir desde la raiz -->
                <a href="index.php?action=historial">Formación</a> 
                <a href="index.php?action=inicio">Presentación</a>
                <a href="index.php?action=contacto">Contacto</a>
                <!-- Este if hace que al procesar php la solicitud ni siquiera mande el boton, no esta escondido, simplemente no existe -->
                <?php if (isset($_SESSION['usuario_id'])): ?>
                    <!-- Si se inicio sesioon -->
                    <a href="index.php?action=administrar">Administración</a>
                    <a href="index.php?action=cerrar_sesion">Cerrar Sesión</a>
                <?php else: ?>
                    <!-- sino -->
                    <a href="index.php?action=login" class="inicio-session">Iniciar Sesión</a>
                <?php endif; ?>
            </nav>