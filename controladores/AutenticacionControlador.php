<?php

require_once __DIR__ . "/../configuracion/conexion.php";
require_once __DIR__ . "/../modelos/Usuario.php";

class AutenticacionControlador
{
    
    private $administrador;

    public function __construct(){
        global $conexion; 
        $this->administrador = new Usuario($conexion);
    }

    public function mostrarLogin()
    {
        // Si no vacio el error me lanzara automaticamente el mensaje de error en la vista login aunque aun no haya hecho nada
        $error = $_SESSION['login_error'] ?? null;
        unset($_SESSION['login_error']);

        require __DIR__ . '/../vistas/autenticacion/login.php';

    }

    public function login(){

        $usuario = $_POST['usuario'] ?? '';
        $contrasena = $_POST['contrasena'] ?? '';

        $admin = $this->administrador->getByUsuario($usuario);

        if (!$admin || !password_verify($contrasena, $admin['contrasena'])) {
            $_SESSION['login_error'] = 'Usuario o contraseña incorrectos.';
            header('Location: ?action=login');
            exit;
        }

        // Evita fijación de sesión al iniciar sesión.
        session_regenerate_id(true);

        $_SESSION['usuario_id'] = $admin['id_usuario'];
        $_SESSION['usuario_nombre'] = $admin['usuario'];

        header('Location: ?action=administrar');
        exit;
    }

    public function logout()
    {
        // Borra todo de la sesion
        $_SESSION = [];

        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params['path'],
                $params['domain'],
                $params['secure'],
                $params['httponly']
            );
        }

        session_destroy();

        header('Location: ?action=login');
        exit;
    }
}
