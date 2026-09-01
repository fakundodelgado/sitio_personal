<?php include __DIR__ . '/../plantillas/encabezado.php'; ?> 

<body>
<main>

<h1>Nueva Materia</h1>

<form action="index.php?action=guardar" method="POST" class="formulario-crear">
    <fieldset>
    <legend>Agregar Materia</legend>
    <label id="cod">Código de Materia:</label><input type="text" name="codigo_materia" required placeholder="Ingresar código...">
    <label>ID del estado:</label><input type="number" name="id_estado" required placeholder="Ingresar id...">
    <label>Año de la cursada:</label><input type="number" name="anio" required placeholder="Ingresar año...">
    <label>Nota:</label><input type="number" name="nota" placeholder="Ingresar nota...">
    <button type="submit">Guardar</button>
    </fieldset>
</form>

</main>

<?php include __DIR__ . '/../plantillas/pie_de_pagina.php'; ?>