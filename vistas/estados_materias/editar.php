<?php include __DIR__ . '/../plantillas/encabezado.php'; ?> 

<h1>Editar Materia</h1>

<form action="index.php?action=actualizar" method="POST">
    <input type="hidden" name="codigo_materia" value="<?=htmlspecialchars($estadoMateria["codigo_materia"])?>">
    <label>ID del estado</label><input type="number" name="id_estado" value="<?=htmlspecialchars($estadoMateria["id_estado"])?>" required>
    <label>Año de la cursada</label><input type="number" name="anio" value="<?=htmlspecialchars($estadoMateria["anio"])?>" required>
    <label>Nota</label><input type="number" name="nota" value="<?=htmlspecialchars($estadoMateria["nota"] ?? '-') ?>">
    <button type="submit">Actualizar</button>
</form>

<?php include __DIR__ . '/../plantillas/pie_de_pagina.php'; ?>