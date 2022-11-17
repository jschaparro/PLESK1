<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email{

    public $email;
    public $nombre;
    public $token;

    public function __construct($email, $nombre, $token){

        $this->email= $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion(){
        //Crear el objeto de email

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 465;
        $mail->Username = 'e24aae643f00da';
        $mail->Password = '00cf3405c0a9ed';

        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com','AppSalon.com');
        $mail->Subject = 'Confirma tu cuenta';

        //set HTML
        $mail->isHTML(TRUE);       
        $mail->CharSet='UTF-8';     //definir el uso de html

        $contenido = '<hmtl>';
        $contenido .= "<p><strong>Hola " . $this->email . "</strong> Has creado tu cuenta en
        AppSalon, solo debes confirmarla precionando en el siguiente enlace</p>";        
        $contenido .="<p>Presiona aquí: <a href='https://shrouded-sands-21529.herokuapp.com/confirmar-cuenta?token=" 
        .$this->token."'>Confirmar Cuenta</a></p>";
        $contenido .= "<p>Si no solocitaste esta cuenta, ignora el mensaje</p>";
        $contenido .= '</hmtl>';

        $mail->Body= $contenido;

        //enviar el email
        $mail->send();

    }

    public function enviarInstrucciones(){
        //Crear el objeto de email

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 465;
        $mail->Username = 'e24aae643f00da';
        $mail->Password = '00cf3405c0a9ed';

        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com','AppSalon.com');
        $mail->Subject = 'Reestablecer tu password';

        //set HTML
        $mail->isHTML(TRUE);       
        $mail->CharSet='UTF-8';     //definir el uso de html

        $contenido = '<hmtl>';
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong>Has solicitado reestablecer tu password, sigue el siguiente enlace para hacerlo.</p>";        
        $contenido .="<p>Presiona aquí: <a href='https://shrouded-sands-21529.herokuapp.com/recuperar?token=" 
        .$this->token."'>Reestablecer Password</a></p>";
        $contenido .= "<p>Si no solocitaste esta cuenta, ignora el mensaje</p>";
        $contenido .= '</hmtl>';

        $mail->Body= $contenido;

        //enviar el email
        $mail->send();

    }

}