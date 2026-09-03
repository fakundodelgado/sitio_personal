
<?php include __DIR__ . '/plantillas/encabezado.php'; ?>

<main class="academico">

    <h1>Estado Académico</h1>

    <p>
        A continuación se muestra el estado mis materias, es decir
        dentro de mi plan de estudio cuales materias regularice, aprobe,
        quede libre, estoy cursando o me queda por cursar.
    </p>

    <h2>Progreso academico: </h2>
    
    <table>
        <thead>
            <tr>
                <th>Materia</th>
                <th>Año</th>
                <th>Cuatr.</th>
                <th>Año de Cursada</th>
                <th>Estado</th>
                <th>Nota</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($estadoMateria)):?> 
               <?php while($materia=$estadoMateria->fetch_assoc()): ?>
                    <tr>

                        <td><?= htmlspecialchars($materia['nombre_materia']) ?></td>
                        <td><?= htmlspecialchars($materia['anio_carrera']) ?></td>
                        <td><?= htmlspecialchars($materia['cuatrimestre_carrera']) ?></td>
                        <td><?= htmlspecialchars($materia['anio']) ?></td>
                        <td><?= htmlspecialchars($materia['nombre_estado']) ?></td>
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

    <?php if (!empty($errorHis)): ?>
        <div class="error"><?= htmlspecialchars($errorHis)?></div>
    <?php endif; ?>

</main>

<?php include __DIR__ . '/plantillas/pie_de_pagina.php'; ?>