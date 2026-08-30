
<?php include 'vistas/modulos/encabezado.php'; ?>

<main>

    <h1>Estado Académico</h1>

    <p>
        A continuación se muestra el progreso de mi carrera, es decir
        dentro de mi plan de estudio cuales materias regularice, aprobe,
        quede libre, estoy cursando o me queda por cursar.
    </p>

    <h2>Progreso del 3er año: </h2>
    
    <table>
        <thead>
            <tr>
                <th>Materia</th>
                <th>Año</th>
                <th>Cuatrimestre</th>
                <th>Año de Cursada</th>
                <th>Estado</th>
                <th>Nota</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($materias)): // Materias sera un inner join con columnas (materia_nombre, ano_carrera, cuatrimestre, anio_cursada, estado_nombre, nota, visible)?> 
               <?php while($materia=$materias->fetch_assoc()): ?>
                    <tr>

                        <td><?= htmlspecialchars($materia['materia_nombre']) ?></td>
                        <td><?= htmlspecialchars($materia['ano_carrera']) ?></td>
                        <td><?= htmlspecialchars($materia['cuatrimestre']) ?></td>
                        <td><?= htmlspecialchars($materia['anio_cursada']) ?></td>
                        <td><?= htmlspecialchars($materia['estado_nombre']) ?></td>
                        <td><?= htmlspecialchars($materia['nota'] ?? '-') ?></td>

                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">No hay materias disponibles.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</main>

<?php include 'vistas/modulos/pie_de_pagina.php'; ?>