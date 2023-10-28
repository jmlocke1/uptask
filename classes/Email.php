<?php
namespace Classes;

use MVC\includes\config\Config;
use PHPMailer\PHPMailer\PHPMailer;

class Email {
	protected $email;
	protected $nombre;
	protected $token;

	public function __construct($email, $nombre, $token)
	{
		$this->email = $email;
		$this->nombre = $nombre;
		$this->token = $token;
	}

	public function enviarConfirmacion(){
		$mail = new PHPMailer();
		$mail->isSMTP();
		$mail->Host = Config::MAIL_HOST;
		$mail->SMTPAuth = true;
		$mail->Port = Config::MAIL_PORT;
		$mail->Username = Config::MAIL_USERNAME;
		$mail->Password = Config::MAIL_PASSWORD;

		$mail->setFrom(Config::MAIL_ORIGIN);
		$mail->addAddress($this->email, Config::DOMAIN_PROJECT);
		$mail->Subject = 'Confirma tu Cuenta';

		$mail->isHTML(true);
		$mail->CharSet = 'UTF-8';

		$contenido = '<html>';
		$contenido .= "<p><strong>Hola ". $this->nombre ." </strong> Has creado tu cuenta en UpTask, solo debes confirmarla en el siguiente enlace</p>";
		$contenido .= "<p>Presiona aquí: <a href='https://". Config::DOMAIN_PROJECT ."/confirmar?token=" . $this->token . "'>Confirmar Cuenta</a></p>";
		$contenido .= "<p>Si tú no creaste esta cuenta, puedes ignorar este mensaje</p>";
		$contenido .= "</html>";

		$mail->Body = $contenido;
		// Enviar el email
		$mail->send();
	}

	public function enviarInstrucciones(){
		$mail = new PHPMailer();
		$mail->isSMTP();
		$mail->Host = Config::MAIL_HOST;
		$mail->SMTPAuth = true;
		$mail->Port = Config::MAIL_PORT;
		$mail->Username = Config::MAIL_USERNAME;
		$mail->Password = Config::MAIL_PASSWORD;

		$mail->setFrom(Config::MAIL_ORIGIN);
		$mail->addAddress($this->email, Config::DOMAIN_PROJECT);
		$mail->Subject = 'Restablece tu Password';

		$mail->isHTML(true);
		$mail->CharSet = 'UTF-8';

		$contenido = '<html>';
		$contenido .= "<p><strong>Hola ". $this->nombre ." </strong> Parece que has olvidado tu password, sigue el siguiente enlace para recuperarlo</p>";
		$contenido .= "<p>Presiona aquí: <a href='https://uptask.test/reestablecer?token=" . $this->token . "'>Reestablecer Password</a></p>";
		$contenido .= "<p>Si tú no creaste esta cuenta, puedes ignorar este mensaje</p>";
		$contenido .= "</html>";

		$mail->Body = $contenido;
		// Enviar el email
		$mail->send();
	}
}