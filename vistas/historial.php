
<?php include __DIR__ . '/../plantillas/encabezado.php'; ?>

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
            <?php if(!empty($estadosMaterias)): // Materias sera un inner join con columnas (materia_nombre, ano_carrera, cuatrimestre, anio_cursada, estado_nombre, nota, visible)?> 
               <?php while($estadoMateria=$estadosMaterias->fetch_assoc()): ?>
                    <tr>

                        <td><?= htmlspecialchars($estadoMateria['materia_nombre']) ?></td>
                        <td><?= htmlspecialchars($estadoMateria['ano_carrera']) ?></td>
                        <td><?= htmlspecialchars($estadoMateria['cuatrimestre']) ?></td>
                        <td><?= htmlspecialchars($estadoMateria['anio_cursada']) ?></td>
                        <td><?= htmlspecialchars($estadoMateria['estado_nombre']) ?></td>
                        <td><?= htmlspecialchars($estadoMateria['nota'] ?? '-') ?></td>

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

<?php include __DIR__ . '/../plantillas/pie_de_pagina.php'; ?>