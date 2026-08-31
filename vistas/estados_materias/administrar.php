<?php include __DIR__ . '/../plantillas/encabezado.php'; ?> 

<h1>Historial de Materias</h1>
<p><a href="index.php?action=crear">+ Agregar Materia</a></p>
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
            <td class="actions">
                <a href="index.php?action=editar&codigo_materia=<?=$materia["codigo_materia"]?>">Editar</a>
                <a href="index.php?action=eliminar&codigo_materia=<?=$materia["codigo_materia"]?>" onclick="return confirm('¿Eliminar esta materia?')">Eliminar</a> <!-- tiene JS -->
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php include __DIR__ . '/../plantillas/pie_de_pagina.php'; ?>