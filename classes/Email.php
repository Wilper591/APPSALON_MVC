<?php
namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email {
    public $email;
    public $nombre;
    public $token;

    public function __construct($nombre, $email, $token) {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->token = $token;
        
    }
    public function enviarConfirmacion() {
        // Crear el objeto de email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '70948dff904e2d';
        $mail->Password = '5287ad9415375e';

        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com', 'AppSalon.com');
        $mail->Subject = 'Confirma tu cuenta';

        //Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has creado tu cuenta App Salon, solo debes confirmala presionando el siguiente enlace</p>";
        $contenido .= "<p>Presiona Aquí: <a href='https://frozen-mesa-37931.herokuapp.com/confirmar-cuenta?token=" . $this->token . "'>Confirmar Cuenta</a> </p>";
        $contenido .= "<p>Si tu no solicitaste esta cuenta, puedes ignorar el mensaje</p>";
        $contenido .= "</html>";
        $mail->Body = $contenido;

        // Enviar el mail
        $mail->send();
    }

    public function enviarInstrucciones() {
        // Crear el objeto de email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '70948dff904e2d';
        $mail->Password = '5287ad9415375e';

        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com', 'AppSalon.com');
        $mail->Subject = 'Reestablece tu password';

        //Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has solicitado reestablecer tu password, sigue el siguiente enlace para hacerlo.</p>";
        $contenido .= "<p>Presiona Aquí: <a href='https://frozen-mesa-37931.herokuapp.com/recuperar?token=" . $this->token . "'>Reestablecer Password</a> </p>";
        $contenido .= "<p>Si tu no solicitaste esta cambio, puedes ignorar el mensaje</p>";
        $contenido .= "</html>";
        $mail->Body = $contenido;

        // Enviar el mail
        $mail->send();
    }
}
