<?php include __DIR__ . '/../plantillas/encabezado.php'; ?> 

<body>
<main>
<h1>Historial de Materias</h1>
<p id="agregar-materia"><a href="index.php?action=crear"><button type="button">Agregar Materia</button></a></p>
<table>
    <thead>
        <tr>
            <th>Código de Materia</th>
            <th>ID del estado</th>
            <th>Año de la cursada</th>
            <th>Nota</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php while($materia=$estadoMateria->fetch_assoc()): ?>
        <tr>
            <td><?=htmlspecialchars($materia["codigo_materia"])?></td>
            <td><?=htmlspecialchars($materia["id_estado"])?></td>
            <td><?=htmlspecialchars($materia["anio"])?></td>
            <td><?=htmlspecialchars($materia["nota"] ?? '-' )?></td> <!-- Si nota es null pongo "-" -->
            <td class="actions botones-administrar">
                <a href=" ?action=editar&codigo_materia=<?=$materia["codigo_materia"]?>"><button type="button">Editar</button></a>
                <a id="btn-eliminar" href=" ?action=eliminar&codigo_materia=<?=$materia["codigo_materia"]?>" onclick="return confirm('¿Eliminar esta materia?')"><button type="button">Eliminar</button></a> <!-- tiene JS -->
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php if (!empty($errorAct)): ?>
    <div class="error"><?= htmlspecialchars($errorAct)?></div>
<?php endif; ?>

</main>

<?php include __DIR__ . '/../plantillas/pie_de_pagina.php'; ?>