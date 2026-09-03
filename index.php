<?php
session_start();

require_once __DIR__."/controladores/EstadoMateriaControlador.php";
require_once __DIR__."/controladores/PaginaControlador.php";
require_once __DIR__."/controladores/AutenticacionControlador.php";
require_once __DIR__."/controladores/ContactoControlador.php";

$controladorEstado = new EstadoMateriaControlador(); 
$controladorPagina = new PaginaControlador();
$controladorAutenticacion = new AutenticacionControlador();
$controladorContacto = new ContactoControlador();

$action=$_GET["action"]??"inicio";

switch($action){

// Página comun
case "inicio": $controladorPagina->inicio(); break;


// Formulario de contacto
case "contacto": $controladorContacto->contacto(); break;
case "enviar_mensaje": $controladorContacto->enviarMail(); break;

// Autenticacion [Aplica MVC]
case "login": $controladorAutenticacion->mostrarLogin(); break; 
case "procesar_login": $controladorAutenticacion->login(); break; 
case "cerrar_sesion": $controladorAutenticacion->logout(); break; 

// CRUD (Creación, Lectura, Actualización y Eliminación) [Aplica MVC]
case "historial": $controladorEstado->historial(); break; // Lee la base de datos asi que tecnicamente es parte del CRUD
case "administrar": $controladorEstado->administrar(); break;
case "crear": $controladorEstado->crear(); break;
case "guardar": if($_SERVER["REQUEST_METHOD"]!=="POST") die("Método no permitido."); $controladorEstado->guardar(); break;
case "editar": $controladorEstado->editar(); break;
case "actualizar": if($_SERVER["REQUEST_METHOD"]!=="POST") die("Método no permitido."); $controladorEstado->actualizar(); break;
case "eliminar": $controladorEstado->eliminar(); break;
default: die("Acción no encontrada.");

}