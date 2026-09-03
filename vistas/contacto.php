<?php include __DIR__ . '/plantillas/encabezado.php'; ?>


<main class="main-contacto">
    <h1> Formulario de contacto </h1>
    <form action="index.php?action=enviar_mensaje" method="POST" id="cont-form" novalidate>
        <fieldset class="contenedor-contacto">

            <legend> Envio de mail </legend>

            <label for="cont-nombre">
                Nombre: <input id="cont-nombre" type="text" name="nombre" placeholder="Escriba su nombre..." required>
            </label>

            <small id="error-nombre"></small>

            <label for="cont-mail">
                Mail: <input id="cont-mail" type="email" name="email" placeholder="Escriba su email..." required>
            </label>

            <small id="error-mail"></small>

            <label for="cont-asunto">
                Asunto: <input id="cont-asunto" type="text" name="asunto" placeholder="Escriba el asunto..." required>
            </label>

            <small id="error-asunto"></small>

            <label class="area-texto" for="cont-mensaje">
                Mensaje: <textarea id="cont-mensaje" name="mensaje" placeholder="Escriba su mensaje..." required></textarea>
            </label>

            <small id="error-mensaje"></small>
            
            <div class = "botones">
            <button type="submit">Enviar</button>

            <button type="reset">Borrar</button>
            </div>

        </fieldset>

    </form>

</main>


<?php include __DIR__ . '/plantillas/pie_de_pagina.php'; ?>