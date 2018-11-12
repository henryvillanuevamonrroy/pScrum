
<?php 


require '../../assests/PHPMailer-master/src/Exception.php';
require '../../assests/PHPMailer-master/src/PHPMailer.php';
require '../../assests/PHPMailer-master/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();

	
	$Mailer = new PHPMailer();
	
	//Define que será usado SMTP
	$Mailer->IsSMTP();
	
	//Enviar e-mail em HTML
	$Mailer->isHTML(true);
	
	//Aceitar carasteres especiais
	$Mailer->Charset = 'UTF-8';
	
	//Configurações
	$Mailer->SMTPAuth = true;
	$Mailer->SMTPSecure = 'tls';
	
	//nome do servidor
	$Mailer->Host = 'smtp.gmail.com';
	//Porta de saida de e-mail 
	$Mailer->Port = 587;
	
	//Dados do e-mail de saida - autenticação
	$Mailer->Username = 'henryzamirv@gmail.com';
	$Mailer->Password = 'S0porte#1';
	
	//E-mail remetente (deve ser o mesmo de quem fez a autenticação)
	$Mailer->From = 'henryzamirv@gmail.com';
	
	//Nome do Remetente
	$Mailer->FromName = 'Sistema MiCole';
	
	//Assunto da mensagem
	$Mailer->Subject = 'Titulo - Bienvenido a MiCole';
	
	//Corpo da Mensagem
	$Mailer->Body = '<p> Estimado' .$_SESSION['nombre_ing'].' </p> <br> '
                . 'Se ha creado su usuario en el sistema MiCole. <BR> '
                . 'Si eres estudiante por favor no olvide modificar su foto, celular y correo electronico de sus padres';
	
	//Corpo da mensagem em texto
	$Mailer->AltBody = '<p> Estimado' .$_SESSION['nombres'].' </p> <br> '
                . 'Se ha creado su usuario en el sistema MiCole' ;
	
	//Destinatario 
	//$Mailer->AddAddress('henry.villanueva.monrroy@gmail.com');
        $Mailer->AddAddress($_SESSION['mail']);
	
	if($Mailer->Send()){
	echo " 
                <script language='JavaScript'> 
                //alert('Correo enviado al nuevo usuario'); 
                </script>";
            
           
        }else{
            echo " 
                <script language='JavaScript'> 
                alert('Error en el envío del correo, contacte a su proveedor'); 
                </script>";
		//echo "Error en el envío del correo " . $Mailer->ErrorInfo;
	}
	
?>


