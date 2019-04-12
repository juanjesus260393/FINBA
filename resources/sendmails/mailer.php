<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'C:/xampp/htdocs/finbaproject/FINBA/libraries/vendor/autoload.php';
require 'C:/xampp/htdocs/finbaproject/FINBA/libraries/vendor/auxx.php';

Class mailer {

    public static function sendPassmail($usuario, $contraseña, $a) {

        $mail = new PHPMailer(true);
        try {
//Server settings
            $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'SoporteCampeche360@gmail.com';                 // SMTP username
            $mail->Password = EMAIL_PASS;                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
//Recipients
            $mail->setFrom('SoporteCampeche360@gmail.com', 'Soporte Campeche360');
            $mail->addAddress('guilmon333@gmail.com', 'juan');


            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'CUENTA';
            if ($a === 1) {

                $mail->Body = '<h3>Esta es la nueva información de tu cuenta</h3>'
                        . '<h3>Tu contraseña se cambio con exito</h3>'
                        . '<br><br>'
                        . 'Usuario: <h3>' . $usuario . '</h3>'
                        . 'Contraseña : <h3>' . $contraseña . '</h3>';
            } else {

                $mail->Body = '<h3>Esta es la información de tu cuenta</h3>'
                        . '<br><br>'
                        . 'Usuario: <h3>' . $usuario . '</h3>'
                        . 'Contraseña : <h3>' . $contraseña . '</h3>';
            }
            $mail->AltBody = 'Esta es la información de tu cuenta'
                    . 'Usuario: ' . $usuario . ''
                    . 'Contraseña :' . $contraseña . '';

            $mail->SMTPDebug = false;
            $mail->send();
//echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }

}
