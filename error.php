<?php 
require_once 'classes/constantes.php'; 

$errores_imei = '';
if(!isset($_GET) || !isset($_GET['iw'])){
	header('Location: index.html');
}else{
	
	$reg = trim($_GET['iw']);
	$reg = filter_var($reg, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH | FILTER_FLAG_STRIP_LOW);

	switch ($reg) {
		case 'intentos': $errores_imei = IMEI_SUPERADO_NUM_INTENTOS; break;
		case 'no-imei':$errores_imei = IMEI_NO_INDB_MESSAGE; break;
		case 'double-imei':$errores_imei = IMEI_INDB_USED_MESSAGE; break;
		case 'same-imei':$errores_imei = IMEI_INDB_SAME_MESSAGE; break;
		case 'user-error':$errores_imei = IMEI_NO_INDB_MESSAGE; break;
		default: header('Location: index.html'); break;
	}
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>ERROR | HONOR</title>
	<link rel="stylesheet" href="honor/css/user-main.css?ver=1.0">
</head>
<body>
	<main>
		<section id="section-image"></section>

		<section id="section-form">
			<div class="form-header">
				<img src="honor/img/logo-honor-forthebrave.jpg" alt="FOR THE BRAVE">
				<img src="honor/img/logo-honor-hihonor.jpg" alt="HI HONOR">
			</div>
			<div class="form-bases">
				<h1>ALGO NO HA IDO BIEN</h1>

				<div class="condiciones">
					<?php echo $errores_imei; ?>
					<p>Si la incidencia persiste, puedes ponerte en contacto con nosotros en la siguiente dirección de correo electrónico: <strong><a href="mail@mail.com" mailto:"mail@mail.com">mail@mail.com</a></strong></p>
					<p>Gracias.</p>
				</div>
				<div style="margin: 200px 0px"></div>
				<div class="condiciones condiciones-goback">
					<p class="bloque">
						<a href="http://dashboard.introworkshop.com//"><img src="honor/img/arrow-back.png" alt="volver">VOLVER</a>
					</p>
				</div>
			</div>	

			<div class="form-bases">
				<p class="centrado">*Promoción válida en España para los terminales móviles Honor 7X y Honor View 10 comprados entre el 15 de diciembre de 2017 y el 7 de enero de 2018. Promoción limitada a 400 unidades.<br><a href="politica-cookies.html">Política de cookies</a>
				</p>
			</div>

		</section>
	</main>
</body>
</html>








