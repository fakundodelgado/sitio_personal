<?php include __DIR__ . '/../plantillas/encabezado.php'; ?> 

<body>
    <main>
        <h1>Iniciar sesión</h1>

        <?php if (!empty($error)): ?>
            <div class="error"><?= htmlspecialchars($error)?></div>
        <?php endif; ?>

        <form method="POST" action="?action=procesar_login" id="formulario-login" novalidate>

            <fieldset>

            <legend>Login</legend>

            <label for="usuario" >
                Usuario: <input id="usuario" type="text" name="usuario" placeholder="Ingrese usuario..." required>
            </label>

            <small id="error-usuario"></small>

            <label for="contrasena">
                Contraseña: <input id="contrasena" type="password" name="contrasena" placeholder="Ingrese contraseña..." required>
            </label>

            <small id="error-contrasena"></small>

            <button type="submit">Ingresar</button>

            </fieldset>
            
        </form>

        <div id="datos">
            <p><span id="top">Datos de prueba</span></p>
            <p><span>Usuario:</span> profesor</p>
            <p><span>Contraseña:</span> 123456</p>
        </div>
    </main>

<?php include __DIR__ . '/../plantillas/pie_de_pagina.php'; ?>