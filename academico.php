<?php

require_once 'base_de_datos/conexion.php';

$sql = "SELECT m.codigo as codigo, m.nombre as materia, m.anio as anio, 
m.cuatrimestre as cuatrimestre, e.nombre as estado
from materias m inner join estados e on m.codigo_estado = e.codigo
where e.visible = 1
order by m.anio asc, m.cuatrimestre asc";

$stmt = $conn->query($sql);
$materias = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include 'modulos/encabezado.php'; ?>

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
                <th>Código</th>
                <th>Materia</th>
                <th>Año</th>
                <th>Cuatrimestre</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($materias)): ?>
                <?php foreach ($materias as $mat): ?>
                    <tr>
                        <td><?= htmlspecialchars($mat['codigo']) ?></td>
                        <td><?= htmlspecialchars($mat['materia']) ?></td>
                        <td><?= htmlspecialchars($mat['anio']) ?></td>
                        <td><?= htmlspecialchars($mat['cuatrimestre']) ?></td>
                        <td><?= htmlspecialchars($mat['estado']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No hay materias disponibles.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</main>

<?php include 'modulos/pie_de_pagina.php'; ?>