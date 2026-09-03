<?php include __DIR__ . '/../plantillas/encabezado.php'; ?> 

<body>
<main>

<h1>Editar Materia</h1>

<form action="index.php?action=actualizar" method="POST" id="formulario-editar" novalidate>

    <fieldset>

        <legend>Editar</legend>

        <input type="hidden" name="codigo_materia" value="<?=htmlspecialchars($estadoMateria["codigo_materia"])?>">

        <label for="id-estado">ID del estado: <input id="id-estado" type="number" name="id_estado" value="<?=htmlspecialchars($estadoMateria["id_estado"])?>" required placeholder="Ingresar id..."></label>

        <small id="error-estado"></small>

        <label for="ano-carrera">Año de la cursada: <input id="ano-carrera" type="number" name="anio" value="<?=htmlspecialchars($estadoMateria["anio"])?>" required placeholder="Ingresar año..."></label>

        <small id="error-cursada"></small>

        <label for="nota-materia">Nota: <input id="nota-materia" type="number" name="nota" value="<?=htmlspecialchars($estadoMateria["nota"] ?? '-') ?>" placeholder="Ingresar nota..."></label>

        <small id="error-nota"></small>

        <button type="submit">Actualizar</button>

    </fieldset>

</form>


</main>

<?php include __DIR__ . '/../plantillas/pie_de_pagina.php'; ?>