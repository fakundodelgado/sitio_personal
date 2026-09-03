/* Menú desplegable */

const btrMenu = document.getElementById('btn-menu');
const navMenu = document.getElementById('nav-menu');

btrMenu.addEventListener('click', () => { // Reacciona ante el evento 'click'
    navMenu.classList.toggle('activo'); // Agrega o saca la clase "activo" de el atributo class="" para que se aplique o no el estilo
});

/* Validación del formulario de login */

const form = document.getElementById('formulario-login');

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



/* Validación del formulario de contacto */

const formCont = document.getElementById('cont-form'); // Obtengo una referencia al formulario

if(formCont){

    const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    const nomTxt = document.getElementById('cont-nombre'); // Obtengo una referencia al campo usuario  
    const mailTxt = document.getElementById('cont-mail'); // Obtengo una referencia al campo contraseña
    const asunTxt = document.getElementById('cont-asunto'); // ...
    const mensTxt = document.getElementById('cont-mensaje'); // ...

    const errorNombre = document.getElementById('error-nombre'); // ...
    const errorMail = document.getElementById('error-mail'); // ...
    const errorAsunto = document.getElementById('error-asunto'); // ...
    const errorMensaje = document.getElementById('error-mensaje'); // ...

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

        const nombre = nomTxt.value.trim(); // Saco el texto del campo usuario
        const mail = mailTxt.value.trim(); // Lo mismo pero con la contraseña
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



