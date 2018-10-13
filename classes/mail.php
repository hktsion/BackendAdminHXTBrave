<?php

class MAIL{

	public $user;
	public function __construct($user){ $this->user = $user; }
	public function __destruct(){}

	public function send_success(){
		//MENSAJE PARA EL USUARIO;
		$mUsuario1 = "Hemos recibido su solicitud para participar en la promoción de HonorXtheBrave.<br>";
		$mUsuario2 = "Los datos que hemos recogido son los siguientes:<br>";
		$datos_del_registro_usuario = "Nombre y apellidos: " . $this->user->getNombre() . " " . $this->user->getApellidos() . "<br>" . $this->user->getDireccion() . " - " . $this->user->getPoblacion() . "<br>" . $this->user->getCP() . " (" . $this->user->getProvincia() . ")<br>Factura: " . $this->user->getFct() . "<br><strong>IMEI: " . $this->user->getIMEI() . "</strong>" ;
		$pieUsuario = "<br>Huawei Technologies España, S.L.<br>Parque Empresarial Las Tablas<br>C/Federico Mompou 5 edif 1 Planta 5<br>28050 Madrid<br>";

		$htmlContent = '
		<html>
		<head>
		<title>Honor X The Brave</title>
		</head>
		<body>
		<main>
		<p>' . $mUsuario1. '</p>
		<p>' . $mUsuario2. '</p>
		<p>' . $datos_del_registro_usuario. '</p>
		</main>
		<footer>
		<p>' . $pieUsuario . '</p>
		<img src="http://dashboard.introworkshop.com/honor/img/honor-banner.png" alt="honor-banner-jpg">
		</footer>
		</body>
		</html>';

		// Set content-type header for sending HTML email
		$headers_user = "MIME-Version: 1.0" . "\r\n";
		$headers_user .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		// Additional headers
		$headers_user .= 'From:HonorXtheBrave<info@honorxthebrave.com>' . "\r\n";
		mail($this->user->getMail(), "PROMOCIÓN HONOR", '' . $htmlContent, $headers_user);
	}



	public function send_too_many_attempts(){
		//MENSAJE PARA EL USUARIO;
		$mUsuario1 = "Has superado el número de intentos.<br>Por favor contacta con nosotros en la siguiente dirección:<br>incidencias@honorxthebrave.com";
		$mUsuario2 = "Los datos que hemos recogido son los siguientes:<br>";
		$datos_del_registro_usuario = "Nombre y apellidos: " . $this->user->getNombre() . " " . $this->user->getApellidos() . "<br>" . $this->user->getDireccion() . " - " . $this->user->getPoblacion() . "<br>" . $this->user->getCP() . " (" . $this->user->getProvincia() . ")<br>Factura: " . $this->user->getFct() . "<br><strong>IMEI: " . $this->user->getIMEI() . "</strong>" ;
		$pieUsuario = "<br>Huawei Technologies España, S.L.<br>Parque Empresarial Las Tablas<br>C/Federico Mompou 5 edif 1 Planta 5<br>28050 Madrid<br>";

		$htmlContent = '
		<html>
		<head>
		<title>Honor X The Brave</title>
		</head>
		<body>
		<main>
		<p>' . $mUsuario1. '</p>
		<p>' . $mUsuario2. '</p>
		<p>' . $datos_del_registro_usuario. '</p>
		</main>
		<footer>
		<p>' . $pieUsuario . '</p>
		<img src="http://dashboard.introworkshop.com/honor/img/honor-banner.png" alt="honor-banner-jpg">
		</footer>
		</body>
		</html>';

		// Set content-type header for sending HTML email
		$headers_user = "MIME-Version: 1.0" . "\r\n";
		$headers_user .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		// Additional headers
		$headers_user .= 'From:HonorXtheBrave<info@honorxthebrave.com>' . "\r\n";
		mail($this->user->getMail(), "PROMOCIÓN HONOR", '' . $htmlContent, $headers_user);
	}
}



?>