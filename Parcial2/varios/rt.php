<?php
require('Pusher.php');

$key="ff4b6a8b1f92ee1509c2";
$secret="04efc79af459c846ff82";
$app_id="160373";

$valor=(isset($_POST['valor']))?$_POST['valor']:0;
$equipo1=(isset($_POST['equipo1']))?$_POST['equipo1']:0;
$equipo2=(isset($_POST['equipo2']))?$_POST['equipo2']:0;
$marcador1=(isset($_POST['marcador1']))?$_POST['marcador1']:0;
$marcador2=(isset($_POST['marcador2']))?$_POST['marcador2']:0;
$minuto=(isset($_POST['minuto']))?$_POST['minuto']:0;
$comentario=(isset($_POST['comentario']))?$_POST['comentario']:0;
$reiniciar=(isset($_POST['reiniciar']))?$_POST['reiniciar']:0;
$channel=(isset($_POST['channel']))?$_POST['channel']:0;
$pusher = new Pusher($key, $secret, $app_id);

if($channel!=0){
	$pusher->trigger('rtch'.$channel, 'actualizar', array('reiniciar' => $reiniciar, 'equipo1' => $equipo1, 'equipo2' => $equipo2, 'marcador1' => $marcador1, 'marcador2' => $marcador2, 'minuto' => $minuto, 'comentario' => $comentario) );
	exit;
}
else{
	$pusher->trigger('rtch1', 'actualizar', array('valor' => $valor) );	
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Sensor 1</title>
		<meta charset="UTF-8" />	
	</head>
	<body>
		<div class='centrado'>
			<form method='post'>
				<input name='valor' type='text' size='4' maxlength='4'>&nbsp;<input type='submit' value='Enviar'>
			</form>
	  	</div>
	</body>
</html>