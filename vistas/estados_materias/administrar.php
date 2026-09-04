<?php include __DIR__ . '/../plantillas/encabezado.php'; ?> 

<body>
<main>
<h1>Historial de Materias</h1>
<p> 
    En esta sección usted podrá agregar, editar y eliminar los estados de las materias que se muestran en el apartado "Formación". 
    Tener en cuenta que los códigos de materia están sacados del plan de estudio de la carrera de TUP y son solo los de las materias 
    principales, es decir, no están cargadas las optativas.  
</p>
<p id="agregar-materia"><a href="index.php?action=crear"><button type="button">Agregar Materia</button></a></p>
<table>
    <thead>
        <tr>
            <th>Código de Materia</th>
            <th>Estado</th>
            <th>Año de la cursada</th>
            <th>Nota</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php while($materia=$estadoMateria->fetch_assoc()): ?>
        <tr>
            <td><?=htmlspecialchars($materia["codigo_materia"])?></td>
            <td><?=htmlspecialchars($materia["nombre_estado"])?></td>
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