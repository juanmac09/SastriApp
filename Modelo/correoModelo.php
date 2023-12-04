<?php
// importamos la libreria de PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/Exception.php';
require '../phpmailer/PHPMailer.php';
require '../phpmailer/SMTP.php';

class Correo
{
    public function enviarCorreoRegistroPedido($datosPedido,$nomUsuario,$correo){
        $emailFor=$correo;
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            // comfiguracion de acceso al servidor de gmail para enviar los mails
            
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'sastriApp@gmail.com';                     //SMTP username
            $mail->Password   = 'smuiwvuswweldlax';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            // emisor:desde donde se envia el mensaje 
            $mail->setFrom('sastriApp@gmail.com', 'Soporte Sastri.App');
            // receptor: quien va a recibir el mensaje 
            $mail->addAddress($emailFor);
            
            // 
            // $mail->addAddress('ellen@example.com');               //Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            // par adjuntar archivos dentro del correo
            // //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);
            // para que dentro de los parametros lea el español con la ñ y tildes
            $mail->CharSet= "UTF-8";
            // ASUNTO DEL CORREO
            $mail->Subject = 'SastriApp - Información Pedido';
            // Cuerpo del mensaje 
            $mail->Body    = '<!DOCTYPE html
            PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <title>Detalles del pedido</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&family=Young+Serif&display=swap" rel="stylesheet">
        </head>
        
        <body style="margin: 0; padding: 0;">
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td style="padding: 10px 0 30px 0; ">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600"
                            style="border: 1px solid #000; border-collapse: collapse;">
                            <tr>
                                <td align="center" 
                                    style="padding: 20px 0 20px 0; color: #ffffff; font-size: 28px; font-weight: bold; background-color: #3E4651;">
                                    <img src="https://imgur.com/ALBGJAw.png" alt="" width="260"
                                    height="170" style="display: block;" />
                                </td>
                            </tr>
                            <tr>
                                <td  style="padding: 40px 30px 40px 30px; background-color: #F4F4F4;">
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                        <tr>
                                            <td align="center"
                                                style="color:#A12B42; font-size: 24px; ">
                                                <h2 style="font-family: \'Roboto\', sans-serif; font-family: \'Young Serif\', serif; font-weight: bold;">Información del pedido</h2>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                    <tr>
                                                        <td style="font-size: 0; line-height: 0;" width="100">
                                                            &nbsp;
                                                        </td>
                                                        <td width="400" valign="top">
                                                            <table style="margin-top: -8%;" border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                <tr >
                                                                    <td >
                                                                    <p style="color:#A12B42;  margin-left: -10%; font-size:18px; padding-top: 30px; font-family: \'Roboto\', sans-serif;">Estimado/a '.$nomUsuario.'</p>
                                                                    <p style="color:#A12B42; margin-top: -7%; margin-left: -10%; font-size:18px; padding-top: 30px; font-family: \'Roboto\', sans-serif;">Con gusto le informamos que su pedido personalizado en SastriApp está en marcha y en proceso activo.</p>
                                                                    <h4 style="color:#A12B42;  margin-left: -10%; font-size:22px; padding-top: 30px; font-family: \'Roboto\', sans-serif;">Detalles del Pedido:</h4>
                                                                    <p style="color:#A12B42; margin-top: -12%; font-size:18px; padding-top: 30px; font-family: \'Roboto\', sans-serif;">Número de Referencia: '.$datosPedido['id'].'</p>
                                                                    <p style="color:#A12B42; margin-top: -12%; font-size:18px; padding-top: 30px; font-family: \'Roboto\', sans-serif;">Producto: '.$datosPedido['infoProducto'].'</p>
                                                                    <p style="color:#A12B42; margin-top: -12%; font-size:18px; padding-top: 30px; font-family: \'Roboto\', sans-serif;">Estado del Pedido: '.$datosPedido['estado'].'</p>
                                                                    <p style="color:#A12B42; margin-top: -12%; font-size:18px; padding-top: 30px; font-family: \'Roboto\', sans-serif;">Fecha Estimada de Entrega: '.$datosPedido['fechaEntrega'].'</p>
                                                            
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="center"
                                                                        style="padding: 0; color: #FFFFFF; font-size: 16px; line-height: 20px;">
        
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td style="font-size: 0; line-height: 0;" width="100">
                                                            &nbsp;
                                                        </td>
        
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td  style="padding: 30px 30px 30px 30px; background-color: #3E4651;">
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                        <tr>
                                            <td align="center"
                                                style="color: #fff; font-size: 14px;"
                                                width="75%; text-aling:center">
                                                &reg; SastriApp 2023<br />
                                                
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </body>
        
        </html>	';
            // cuerpo alternativo de
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            // echo '<script>alert("Envio de correo exitoso");</script>';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            // echo "<script> location.href='../Vista/Administrador/VerClientes.php'</script>"; 
        }
    }

    public function enviarCorreoActualizacionEstado($correo,$mensaje,$estado){
        $emailFor=$correo;
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            // comfiguracion de acceso al servidor de gmail para enviar los mails
            
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'sastriApp@gmail.com';                     //SMTP username
            $mail->Password   = 'smuiwvuswweldlax';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            // emisor:desde donde se envia el mensaje 
            $mail->setFrom('sastriApp@gmail.com', 'Soporte Sastri.App');
            // receptor: quien va a recibir el mensaje 
            $mail->addAddress($emailFor);
            
            // 
            // $mail->addAddress('ellen@example.com');               //Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            // par adjuntar archivos dentro del correo
            // //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);
            // para que dentro de los parametros lea el español con la ñ y tildes
            $mail->CharSet= "UTF-8";
            // ASUNTO DEL CORREO
            $mail->Subject = 'SastriApp - Información Pedido';
            // Cuerpo del mensaje 
            $mail->Body    = '<!DOCTYPE html
            PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <title>NOTIFICACION LIVING SAFE</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Dosis&family=Great+Vibes&family=Parisienne&family=Playfair+Display&display=swap" rel="stylesheet">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Dosis&family=Great+Vibes&family=Lato&family=Parisienne&family=Playfair+Display&display=swap" rel="stylesheet">
        </head>
        
        <body style="margin: 0; padding: 0;">
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td style="padding: 10px 0 30px 0; ">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600"
                            style="border: 1px solid #000; border-collapse: collapse;">
                            <tr>
                                <td align="center" 
                                    style="padding: 20px 0 20px 0; color: #ffffff; font-size: 28px; font-weight: bold; background-color: #3E4651;">
                                    <img src="https://imgur.com/ALBGJAw.png" alt="" width="260"
                                    height="170" style="display: block;" />
                                </td>
                            </tr>
                            <tr>
                                <td  style="padding: 40px 30px 40px 30px; background-color: #F4F4F4;">
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                        <tr>
                                            <td align="center"
                                                style="color:#A12B42; font-size: 24px; ">
                                                <b style="font-family: \'Dosis\', sans-serif; font-family: \'Great Vibes\', cursive; font-family: \'Lato\', sans-serif; font-family: \'Parisienne\', cursive; font-family: \'Playfair Display\', serif;">INFORMACIÓN DE PEDIDO</b>
                                            </td>
                                        </tr><tr>
                                            
                                        </tr>
                                        <tr>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                    <tr>
                                                        <td style="font-size: 0; line-height: 0;" width="100">
                                                            &nbsp;
                                                        </td>
                                                        <td width="400" valign="top">
                                                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                <tr>
                                                                    <td align="center">
                                                                    <p style="color:#A12B42; font-size:22px; padding-top: 30px; font-family: \'Dosis\', sans-serif; font-family: \'Great Vibes\', cursive; font-family: \'Lato\', sans-serif; font-family: \'Parisienne\', cursive; font-family: \'Playfair Display\', serif;">'.$mensaje.'</p>
                                                                    <p style="color:#A12B42; font-size:22px; padding-top: 30px;font-family: \'Dosis\', sans-serif; font-family: \'Great Vibes\', cursive; font-family: \'Lato\', sans-serif; font-family: \'Parisienne\', cursive; font-family: \'Playfair Display\', serif;">'.$estado.'</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="center"
                                                                        style="padding: 0; color: #FFFFFF; font-size: 16px; line-height: 20px;">

                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td style="font-size: 0; line-height: 0;" width="100">
                                                            &nbsp;
                                                        </td>
        
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td  style="padding: 30px 30px 30px 30px; background-color: #3E4651;">
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                        <tr>
                                            <td align="center"
                                                style="color: #fff; font-size: 14px;"
                                                width="75%; text-aling:center">
                                                &reg; Sastriapp 2023<br />
                                                
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </body>
        
        </html>
        ';
            // cuerpo alternativo de
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo '<script>alert("Envio de correo exitoso");</script>';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            // echo "<script> location.href='../Vista/Administrador/VerClientes.php'</script>"; 
        }
    }

    public function enviarCorreoCambioPassword($correo,$link){
        $emailFor=$correo;
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            // comfiguracion de acceso al servidor de gmail para enviar los mails
            
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'sastriApp@gmail.com';                     //SMTP username
            $mail->Password   = 'smuiwvuswweldlax';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            // emisor:desde donde se envia el mensaje 
            $mail->setFrom('sastriApp@gmail.com', 'Soporte Sastri.App');
            // receptor: quien va a recibir el mensaje 
            $mail->addAddress($emailFor);
            
            // 
            // $mail->addAddress('ellen@example.com');               //Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            // par adjuntar archivos dentro del correo
            // //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);
            // para que dentro de los parametros lea el español con la ñ y tildes
            $mail->CharSet= "UTF-8";
            // ASUNTO DEL CORREO
            $mail->Subject = 'SastriApp - Cambia Tu Contraseña Ahora';
            // Cuerpo del mensaje 
            $mail->Body    = '<!DOCTYPE html
            PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <title>Cambia tu Contraseña</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Dosis&family=Great+Vibes&family=Lato&family=Parisienne&family=Playfair+Display&family=Roboto:wght@300&display=swap" rel="stylesheet">
        </head>
        
        <body style="margin: 0; padding: 0;">
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td style="padding: 10px 0 30px 0; ">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600"
                            style="border: 1px solid #000; border-collapse: collapse;">
                            <tr>
                                <td align="center" 
                                    style="padding: 20px 0 20px 0; color: #ffffff; font-size: 28px; font-weight: bold; background-color: #3E4651;">
                                    <img src="https://imgur.com/ALBGJAw.png" alt="" width="260"
                                    height="170" style="display: block;" />
                                </td>
                            </tr>
                            <tr>
                                <td  style="padding: 40px 30px 40px 30px; background-color: #F4F4F4;">
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                        <tr>
                                            <td align="center"
                                                style="color:#A12B42; font-size: 24px; ">
                                                <h2 style="font-family: \'Dosis\', sans-serif; font-family: \'Great Vibes\', cursive; font-family: \'Lato\', sans-serif; font-family: \'Parisienne\', cursive; font-family: \'Playfair Display\', serif;">¿Has olvidado tu contraseña?</h2>
                                            </td>
                                        </tr><tr>
                                            
                                        </tr>
                                        <tr>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                    <tr>
                                                        <td style="font-size: 0; line-height: 0;" width="100">
                                                            &nbsp;
                                                        </td>
                                                        <td width="400" valign="top">
                                                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                <tr>
                                                                    <td align="center">
                                                                    <h6 style="color:#A12B42; font-size:22px; padding-top: 30px; font-family: \'Dosis\', sans-serif; font-family: \'Dosis\', sans-serif; font-family: \'Great Vibes\', cursive; font-family: \'Lato\', sans-serif; font-family: \'Parisienne\', cursive; font-family: \'Playfair Display\', serif; font-family: \'Roboto\', sans-serif;">No te preocupes, ¡te ayudamos! Puedes tener una nueva contraseña.</h6>
                                                                    <a href="'.$link.'" style="text-decoration: none; color: black; padding: 14px 28px; cursor: pointer; border-radius: 5px; background-color: white; border: 2px solid #6b7f8d;">Cambiar Contraseña</a>
                                                                    <h6 style="color:#A12B42; font-size:22px; padding-top: 30px; font-family: \'Dosis\', sans-serif; font-family: \'Dosis\', sans-serif; font-family: \'Great Vibes\', cursive; font-family: \'Lato\', sans-serif; font-family: \'Parisienne\', cursive; font-family: \'Playfair Display\', serif; font-family: \'Roboto\', sans-serif;">Este link puede usarse solo una vez.</h6>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="center"
                                                                        style="padding: 0; color: #FFFFFF; font-size: 16px; line-height: 20px;">
        
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td style="font-size: 0; line-height: 0;" width="100">
                                                            &nbsp;
                                                        </td>
        
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td  style="padding: 30px 30px 30px 30px; background-color: #3E4651;">
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                        <tr>
                                            <td align="center"
                                                style="color: #fff; font-size: 14px;"
                                                width="75%; text-aling:center">
                                                &reg; SastriApp 2023<br />
                                                
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        </body>
        
        </html>';
            // cuerpo alternativo de
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            // echo '<script>alert("Envio de correo exitoso");</script>';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}



?>