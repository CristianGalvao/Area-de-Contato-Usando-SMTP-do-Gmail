<?php

//Chamando os arquivos
require_once('PHPMailer-Master/src/PHPMailer.php');
require_once('PHPMailer-Master/src/SMTP.php');
require_once('PHPMailer-Master/src/Exception.php');
    
        
//O Use indica que determinada classe vai ser importada e usada, e evitar conflitos de nomes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//O true habilita o modo Debug e ver o log de e-mail
$mail = new PHPMailer(true);

header('Content-Type: text/html; charset=utf-8');

//Verificar se existe usando o Isset
if(isset($_POST['email']) && !empty($_POST['email'])){

//Pegando os name do HTMl e upando aqui no PHP
$nome = $_POST['nome'];
$email = $_POST['email'];
$motivo = $_POST['motivo'];
$mensagem = $_POST['mensagem'];

$mail->SMTPDebug = SMTP::DEBUG_SERVER;

//Informamos que o protocolo utilizado é o SMTP, conforme recomendado pelo Gmail;
$mail->isSMTP();

// Este é o endereço para o servidor de e-mails do Gmail;
$mail->Host = 'smtp.gmail.com';

//O protocolo AUTH SMTP é usado para envio de email SMTP do cliente, normalmente na porta TCP 587. O AUTH SMTP dá suporte à autenticação moderna (Modern Auth).
$mail->SMTPAuth = true;

//De onde partirá o e-mail
$mail->Username = 'emailAqui';
$mail->Password = "senha-aqui";

//Porta do SMTP
$mail->Port = 587;

//De onde sairá o e-mail
$mail->SetFrom('cristiansilvaroyale@gmail.com');

//Para onde irá o e-mail enviado
$mail->addAddress('cristianport2021@outlook.com');

//Ativando o HTML
$mail->isHTML(true);

//Montando o e-mail
$mail->Subject = "Contato de: ".$nome." Enviou através do site";
$mail->Body = 'Nome do Usuario: '.$nome.' <br/> Usando o E-mail: '.$email. '<br/> Mensagem: '.$mensagem;
$mail->AltBody = 'Contato através do site';


//Condição caso o e-mail é enviado ou não
if($mail->Send()){

echo '<script>alert("Sua mensagem foi enviada, te retornaremos em breve!");location.href=("../../index.html")</script>';

}
else{
echo '<script>alert("Sua mensagem não foi enviada, verifique suas informações");location.href=("../../index.html")</script>';
    }

}
else{
    echo '<script>alert("Campo E-mail vázio");location.href=("../../index.html")</script>';
}

?>