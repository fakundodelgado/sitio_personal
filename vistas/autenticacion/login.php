<?php include __DIR__ . '/../plantillas/encabezado.php'; ?> 

<h1>Iniciar sesión</h1>

<?php if (!empty($error)): ?>
    <div class="error"><?= htmlspecialchars($error) ?></div>
<?php endif; ?>

<form method="POST" action="?action=procesar_login">
    <label for="usuario">Usuario</label>
    <input id="usuario" type="text" name="usuario" required>

    <label for="contrasena">Contraseña</label>
    <input id="contrasena" type="password" name="contrasena" required>

    <button type="submit">Ingresar</button>
</form>

<div class="datos">
    <strong>Datos de prueba:</strong><br>
    Usuario: profesor  <br>
    Contraseña: 123456
</div>

<?php include __DIR__ . '/../plantillas/pie_de_pagina.php'; ?>