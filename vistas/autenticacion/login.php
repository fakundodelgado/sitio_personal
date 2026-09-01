<?php include __DIR__ . '/../plantillas/encabezado.php'; ?> 

<body>
<main>
<h1>Iniciar sesión</h1>

<?php if (!empty($error)): ?>
    <div class="error"><?= htmlspecialchars($error) ?></div>
<?php endif; ?>

<form method="POST" action="?action=procesar_login" class="formulario-login">
    <fieldset>
    <legend>Login</legend>
    <label for="usuario" >Usuario: </label>
    <input id="usuario" type="text" name="usuario" required placeholder="Ingrese usuario...">

    <label for="contrasena">Contraseña: </label>
    <input id="contrasena" type="password" name="contrasena" required placeholder="Ingrese contraseña..."...>

    <button type="submit">Ingresar</button>
    </fieldset>
</form>

<div class="datos">
    <p><span id="top">Datos de prueba</span></p>
    <p><span>Usuario:</span> profesor</p>
    <p><span>Contraseña:</span> 123456</p>
</div>
</main>

<?php include __DIR__ . '/../plantillas/pie_de_pagina.php'; ?>