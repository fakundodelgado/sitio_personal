/* MENÚ DESPLEGABLE */

const btrMenu = document.getElementById('btn-menu');
const navMenu = document.getElementById('nav-menu');

btrMenu.addEventListener('click', () => { // Reacciona ante el evento 'click'
    navMenu.classList.toggle('activo'); // Agrega o saca la clase "activo" de el atributo class="" para que se aplique o no el estilo
});

/* VALIDACIÓN DE FORMULARIOS */

const formCont = document.getElementById('cont-form'); // Obtengo una referencia al formulario de contacto
const form = document.getElementById('formulario-login'); // Obtengo una referencia al formulario de login
const formAgre = document.getElementById('formulario-crear') // Obtengo una referencia al formulario de Agregar Materia
const formEdit = document.getElementById('formulario-editar')

/* DESACTIVAR LA OPCIÓN DE AGREGAR NOTA A NO SER QUE SE TENGA EL ESTADO APROBADO */

if (formAgre || formEdit){
    const valNota = document.getElementById('nota-materia');
    const valEst = document.getElementById('id-estado');

    const placeholder = valNota.placeholder;

    // Necesario para el formulario editar
    if(valEst.value.trim() !== "4"){
        valNota.disabled = true; // Desabilita el input
        valNota.placeholder = ""; // Permite modificar el contenido del placeholder     
    }

    valEst.addEventListener('input', ()=>{

    if(valEst.value.trim()==="4"){

        valNota.disabled = false;
        valNota.placeholder = placeholder;

    } else {

        valNota.disabled = true;
        valNota.value = ""
        valNota.classList.remove('input-error'); // Borra el estilo que da la clase 'input-error' al quitarla
        valNota.placeholder = ""

    }

});
}

/* LOGIN */

if(form){

    const userTxt = document.getElementById('usuario'); // Obtengo una referencia al campo usuario  
    const contraTxt = document.getElementById('contrasena'); // Obtengo una referencia al campo contraseña
    // Obtengo una referencia al formulario
    const errorUsuario = document.getElementById('error-usuario'); // ...
    const errorContra = document.getElementById('error-contrasena'); // ...


    form.addEventListener('submit', (e) => {
        e.preventDefault();
        errorUsuario.textContent = "";
        errorContra.textContent = "";
        userTxt.classList.remove('input-error');
        contraTxt.classList.remove('input-error');

        let correcto = true;
        const usuario = userTxt.value.trim(); // Saco el texto del campo usuario
        const contrasena = contraTxt.value.trim(); // Lo mismo pero con la contraseña

        if(usuario === ""){
            correcto = false;
            userTxt.classList.add('input-error');
            errorUsuario.textContent = "ERROR! El campo de usuario se encuentra vacio.";
        }
        
        if (contrasena === ""){
            correcto = false;
            contraTxt.classList.add('input-error');
            errorContra.textContent = "ERROR! El campo contraseña se encuentra vacio.";
        }

        if(correcto){
            form.submit(); // Si no hay errores, se procede con el envio.
        }

    });

}

/* Contacto */

if(formCont){

    const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    const nomTxt = document.getElementById('cont-nombre'); 
    const mailTxt = document.getElementById('cont-mail'); 
    const asunTxt = document.getElementById('cont-asunto'); 
    const mensTxt = document.getElementById('cont-mensaje'); 

    const errorNombre = document.getElementById('error-nombre');
    const errorMail = document.getElementById('error-mail'); 
    const errorAsunto = document.getElementById('error-asunto'); 
    const errorMensaje = document.getElementById('error-mensaje'); 

    formCont.addEventListener('submit', (e) => {

        e.preventDefault();

        errorNombre.textContent = "";
        errorMail.textContent = "";
        errorAsunto.textContent = "";
        errorMensaje.textContent = "";


        nomTxt.classList.remove('input-error');
        mailTxt.classList.remove('input-error');
        asunTxt.classList.remove('input-error');
        mensTxt.classList.remove('input-error');
        

        let correcto = true;

        const nombre = nomTxt.value.trim(); 
        const mail = mailTxt.value.trim(); 
        const asunto = asunTxt.value.trim();
        const mensaje = mensTxt.value.trim();

        if(nombre === ""){
            correcto = false;
            nomTxt.classList.add('input-error');
            errorNombre.textContent = "ERROR! El campo nombre se encuentra vacio.";
        }
        
        if (mail === ""){
            correcto = false;
            mailTxt.classList.add('input-error');
            errorMail.textContent = "ERROR! El campo mail se encuentra vacio.";
        } else if (!regexEmail.test(mail)){
            correcto = false;
            mailTxt.classList.add('input-error');
            errorMail.textContent = "ERROR! El mail ingresado no es valido.";
        }

        if (asunto === ""){
            correcto = false;
            asunTxt.classList.add('input-error');
            errorAsunto.textContent = "ERROR! El campo asunto se encuentra vacio.";
        }

        if (mensaje === ""){
            correcto = false;
            mensTxt.classList.add('input-error');
            errorMensaje.textContent = "ERROR! El campo mensaje se encuentra vacio.";
        }

        if(correcto){
            formCont.submit(); // Si no hay errores, se procede con el envio.
        }

    });

}

/* Agregar Materia */

if(formAgre){

    const codMat = document.getElementById('codigo-materia'); 
    const idEst = document.getElementById('id-estado'); 
    const anoCar = document.getElementById('ano-carrera'); // Me confundi, aqui era cursada... pero bueno, funciona bien.
    const notaMat = document.getElementById('nota-materia'); 

    const errorCodigo = document.getElementById('error-codigo'); 
    const errorEstado = document.getElementById('error-estado'); 
    const errorCursada = document.getElementById('error-cursada'); 
    const errorNota = document.getElementById('error-nota'); 

    formAgre.addEventListener('submit', (e) => {

        e.preventDefault();

        // Borra el mensaje de error que podria haber quedado escrito en los <small>
        errorCodigo.textContent = "";
        errorEstado.textContent = "";
        errorCursada.textContent = "";
        errorNota.textContent = "";

        // Permite darle estilo a la cajita del input en caso de error
        codMat.classList.remove('input-error');
        idEst.classList.remove('input-error');
        anoCar.classList.remove('input-error');
        notaMat.classList.remove('input-error');
        
        let correcto = true;

        const codigo = codMat.value.trim().toUpperCase(); 
        const estado = idEst.value.trim(); 
        const ano = anoCar.value.trim();
        const nota = notaMat.value.trim();

        if(codigo === ""){
            correcto = false;
            codMat.classList.add('input-error');
            errorCodigo.textContent = "ERROR! El campo código se encuentra vacio.";
        } else if((codigo<"T1201" || codigo>"T1238") && codigo!=="T12RC"){
            correcto = false;
            codMat.classList.add('input-error');
            errorCodigo.textContent = "ERROR! El campo código no es valido.";
        }
        
        if (estado === ""){
            correcto = false;
            idEst.classList.add('input-error');
            errorEstado.textContent = "ERROR! El campo estado se encuentra vacio.";
        } else if (isNaN(estado) || +estado>4 || +estado<0){
            correcto = false;
            idEst.classList.add('input-error');
            errorEstado.textContent = "ERROR! El estado ingresado no es valido.";
        }

        if (ano === ""){
            correcto = false;
            anoCar.classList.add('input-error');
            errorCursada.textContent = "ERROR! El campo año de carrera se encuentra vacio.";
        } else if (isNaN(ano) || +ano<0){
            correcto = false;
            anoCar.classList.add('input-error');
            errorCursada.textContent = "ERROR! El campo año de carrera no es valido.";
        }

        if(!notaMat.disabled){
            if (nota === ""){
                correcto = false;
                notaMat.classList.add('input-error');
                errorNota.textContent = "ERROR! El campo nota se encuentra vacio.";
            } else if (isNaN(nota) || +nota<0 || +nota>10){
                correcto = false;
                notaMat.classList.add('input-error');
                errorNota.textContent = "ERROR! El campo nota no es valido.";
            }
        }

        if(correcto){
            formAgre.submit(); // Si no hay errores, se procede con el envio.
        }

    });

}

if(formEdit){

    const idEst = document.getElementById('id-estado'); 
    const anoCar = document.getElementById('ano-carrera'); // Me confundi, aqui era cursada... pero bueno, funciona bien.
    const notaMat = document.getElementById('nota-materia'); 

    
    const errorEstado = document.getElementById('error-estado'); 
    const errorCursada = document.getElementById('error-cursada'); 
    const errorNota = document.getElementById('error-nota'); 

    formEdit.addEventListener('submit', (e) => {

        e.preventDefault();

        // Borra el mensaje de error que podria haber quedado escrito en los <small>
        
        errorEstado.textContent = "";
        errorCursada.textContent = "";
        errorNota.textContent = "";

        // Permite darle estilo a la cajita del input en caso de error
        
        idEst.classList.remove('input-error');
        anoCar.classList.remove('input-error');
        notaMat.classList.remove('input-error');
        
        let correcto = true;

        
        const estado = idEst.value.trim(); 
        const ano = anoCar.value.trim();
        const nota = notaMat.value.trim();

        
        if (estado === ""){
            correcto = false;
            idEst.classList.add('input-error');
            errorEstado.textContent = "ERROR! El campo estado se encuentra vacio.";
        } else if (isNaN(estado) || +estado>4 || +estado<0){
            correcto = false;
            idEst.classList.add('input-error');
            errorEstado.textContent = "ERROR! El estado ingresado no es valido.";
        }

        if (ano === ""){
            correcto = false;
            anoCar.classList.add('input-error');
            errorCursada.textContent = "ERROR! El campo año de carrera se encuentra vacio.";
        } else if (isNaN(ano) || +ano<0){
            correcto = false;
            anoCar.classList.add('input-error');
            errorCursada.textContent = "ERROR! El campo año de carrera no es valido.";
        }

        if(!notaMat.disabled){
            if (nota === ""){
                correcto = false;
                notaMat.classList.add('input-error');
                errorNota.textContent = "ERROR! El campo nota se encuentra vacio.";
            } else if (isNaN(nota) || +nota<0 || +nota>10){
                correcto = false;
                notaMat.classList.add('input-error');
                errorNota.textContent = "ERROR! El campo nota no es valido.";
            }
        }

        if(correcto){
            formEdit.submit(); // Si no hay errores, se procede con el envio.
        }

    }); 
}

/* Los dos ultimos 2 if son practicamente identicos, deberia de modificar eso despues con un simple if en el de arriba es decir el de agregar y haciendo if formAgre || formEdit */



