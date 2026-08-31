<?php include __DIR__ . '/../plantillas/encabezado.php'; ?> 

<h1>Nueva Materia</h1>

<form action="index.php?action=guardar" method="POST">
    <label>Código de Materia</label><input type="text" name="codigo_materia" required>
    <label>ID del estado</label><input type="number" name="id_estado" required>
    <label>Año de la cursada</label><input type="number" name="anio" required>
    <label>Nota</label><input type="number" name="nota">
    <button type="submit">Guardar</button>
</form>

<?php include __DIR__ . '/../plantillas/pie_de_pagina.php'; ?>