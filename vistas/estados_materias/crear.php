<?php include __DIR__ . '/../plantillas/encabezado.php'; ?> 

<body>
<main>

<h1>Nueva Materia</h1>

<form action="index.php?action=guardar" method="POST" id="formulario-crear" novalidate>

    <fieldset>

        <legend>Agregar Materia</legend>

        <label for="codigo-materia">Código de Materia: <input id="codigo-materia" type="text" name="codigo_materia" required placeholder="Ingresar código..."></label>

        <small id="error-codigo"></small>
        
        <label for="id-estado">ID del estado: <input id="id-estado" type="number" name="id_estado" required placeholder="Ingresar id..."></label>

        <small id="error-estado"></small>

        <label for="ano-carrera">Año de la cursada: <input id="ano-carrera" type="number" name="anio" required placeholder="Ingresar año..."></label>

        <small id="error-cursada"></small>

        <label for="nota-materia">Nota: <input id="nota-materia" type="number" name="nota" placeholder="Ingresar nota..."></label>

        <small id="error-nota"></small>

        <button type="submit">Guardar</button>

        <?php if (!empty($errorCrea)): ?>
            <div class="error"><?= htmlspecialchars($errorCrea)?></div>
        <?php endif; ?>

    </fieldset>
</form>

</main>

<?php include __DIR__ . '/../plantillas/pie_de_pagina.php'; ?>