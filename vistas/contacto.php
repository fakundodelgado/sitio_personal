<?php include __DIR__ . '/plantillas/encabezado.php'; ?>


<main>
    <form action="index.php?action=enviar_mensaje" method="POST">
        <fieldset>

            <legend> Envio de mail </legend>

            <label>
                Nombre: <input type="text" name="nombre" placeholder="Escriba su nombre...">
            </label>

            <label>
                Mail: <input type="email" name="email" placeholder="Escriba su email...">
            </label>

            <label>
                Asunto: <input type="text" name="asunto" placeholder="Escriba el asunto...">
            </label>

            <label>
                Mensaje: <textarea name="mensaje" placeholder="Escriba su mensaje..."></textarea>
            </label>
            
            <button type="submit">Enviar</button>

            <button type="reset">Borrar</button>

        </fieldset>

    </form>

</main>


<?php include __DIR__ . '/plantillas/pie_de_pagina.php'; ?>