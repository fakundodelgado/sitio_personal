<?php

    require __DIR__ . "/../recursos/PHPMailer/src/Exception.php";
    require __DIR__ . "/../recursos/PHPMailer/src/PHPMailer.php";
    require __DIR__ . "/../recursos/PHPMailer/src/SMTP.php";

    use PHPMailer\PHPMailer\PHPMailer;
    USE PHPMailer\PHPMailer\Exception;

class ContactoControlador {

    public function contacto(){
        require __DIR__ . "/../vistas/contacto.php";
    }

    public function enviarMail(){

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ?action=contacto');
            exit;
        }

        $mail = new PHPMailer(true);
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $asunto = $_POST["asunto"];
        $mensaje = $_POST["mensaje"];

        if($nombre === "" || $mensaje === "" || $asunto === ""){
            exit("Debe completar ambos campos obligatoriamente.");
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            exit("El email no es valido.");
        }

        $mail->isSMTP();

        $mail->Host= 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Username = '76f75efd3a82e0';
        $mail->Password = '85227adc9c7195';
        $mail->Port = '2525';
        $mail->setFrom('web@ejemplo.com', 'formulario');
        $mail->addAddress('destino@ejemplo.com');
        $mail->addReplyTo($email, $nombre);
        $mail->isHTML(true);
        $mail->Subject = $asunto;

        $mail->Body = "
            <h2>Nuevo mensaje de contacto</h2>
            <p><strong>Nombre:</strong> $nombre</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Asunto:</strong> $asunto</p>
            <p><strong>Mensaje:</strong> $mensaje</p>
        ";

        try {
            $mail->send();
            echo "Mensaje enviado correctamente.";
        } catch (Exception $e){
            echo "No se pudo enviar el mensaje.";
        }
    }

}

