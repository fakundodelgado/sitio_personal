<?php include __DIR__ . '/../plantillas/encabezado.php'; ?> 

<body>
<main>

<h1>Editar Materia</h1>

<form action="index.php?action=actualizar" method="POST" id="formulario-editar" novalidate>

    <fieldset>

        <legend>Editar</legend>

        <input type="hidden" name="codigo_materia" value="<?=htmlspecialchars($estadoMateria["codigo_materia"])?>">

        <label for="id-estado">Estado:

            <select name="id-estado" id="id-estado" required>

                <option value="0" <?=$estadoMateria["id_estado"] == 0 ? 'selected' : ''?>>Sin Cursar</option>
                <option value="1" <?=$estadoMateria["id_estado"] == 1 ? 'selected' : ''?>>Cursando</option>
                <option value="2" <?=$estadoMateria["id_estado"] == 2 ? 'selected' : ''?>>Libre</option>
                <option value="3" <?=$estadoMateria["id_estado"] == 3 ? 'selected' : ''?>>Regular</option>
                <option value="4" <?=$estadoMateria["id_estado"] == 4 ? 'selected' : ''?>>Aprobada</option>

            </select>

        </label>

        <small id="error-estado"></small>

        <label for="ano-carrera">Año de la cursada: <input id="ano-carrera" type="number" name="anio" value="<?=htmlspecialchars($estadoMateria["anio"])?>" required placeholder="Ingresar año..."></label>

        <small id="error-cursada"></small>

        <label for="nota-materia">Nota: <input id="nota-materia" type="number" name="nota" value="<?=htmlspecialchars($estadoMateria["nota"] ?? null) ?>" placeholder="Ingresar nota..."></label>

        <small id="error-nota"></small>

        <button type="submit">Actualizar</button>

    </fieldset>

</form>

<?php if (!empty($errorAct)): ?>
    <div class="error"><?= htmlspecialchars($errorAct)?></div>
<?php endif; ?>

</main>

<?php include __DIR__ . '/../plantillas/pie_de_pagina.php'; ?>