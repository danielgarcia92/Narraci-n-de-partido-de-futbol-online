<!DOCTYPE html>
<html lang="es">

	<head>
		
		<title>Partido :: Visitante</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

		<style> p{ color: black;} .paragraph1 { font-size: 35px; text-align: center; font-weight: bold; } .paragraph2 { text-align: center; } .p3 { text-align: center; } </style>

		<link rel="shortcut icon" type="image/x-icon" href="http://localhost/Parcial2/balon.ico" >
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
		<link href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" type="text/css" rel="stylesheet" />

		<script type="text/javascript" src="varios/js/ajaxGoogleApis.js"></script>
		<script src="varios/js/jquery-1.9.1.js" type="text/javascript"></script>
		<script src="varios/js/jquery-ui.js" type="text/javascript"></script>
		<script src="varios/js/pusher.min.js"></script>
		<script src='varios/js/rtch2.js'></script>
		<script>
			$(function () {
				$("#dialogo").dialog({
				autoOpen: false
				});
			});
		</script>
		
	</head>

	<body>

		<form id="narrador">

			<p class="paragraph1">Visitante</p>
			<div id="dialogo" title="ATENCIÓN!!!">
  				<p id="pDialogo"></p>
			</div>
			<div class='col-md-4'></div>
			<textarea id="e1" name="e1" rows="1" cols="20"  placeholder="Equipo 1" ></textarea>
			<textarea id="me1" name="me1" rows="1" style='width:40px' placeholder="#" ></textarea>
			<textarea id="me2" name="me2" rows="1" style='width:40px' placeholder="#" ></textarea>
			<textarea id="e2" name="e2" rows="1" cols="20"  placeholder="Equipo 2" ></textarea>

			<br/>
			<table id="tabla" name="tabla">
				<div class='col-md-3'></div>
				<textarea id="salida" rows='20' cols="91"></textarea>
			</table>

		</form>

		<script type="text/javascript">

			var filas = "<?php echo $filas; ?>";

			<?php 
				$js_minuto = json_encode($minuto);
				echo "var minuto = ". $js_minuto . ";\n";
				$js_comentarios = json_encode($comentarios);
				echo "var comentarios = ". $js_comentarios . ";\n";
				$js_equipo1 = json_encode($equipo1);
				echo "var equipo1 = ". $js_equipo1 . ";\n";
				$js_equipo2 = json_encode($equipo2);
				echo "var equipo2 = ". $js_equipo2 . ";\n";
				$js_golesEquipo1 = json_encode($golesEquipo1);
				echo "var golesEquipo1 = ". $js_golesEquipo1 . ";\n";
				$js_golesEquipo2 = json_encode($golesEquipo2);
				echo "var golesEquipo2 = ". $js_golesEquipo2 . ";\n";
			?>

			for (var i = 1; i <=filas; i++) {
				$("#salida").prepend(comentarios[i]);
				$("#salida").prepend('        ');
				$("#salida").prepend(minuto[i]);
				$("#salida").prepend('\n <br>');
				document.getElementById("e1").value = equipo1[filas]; 
				document.getElementById("e2").value = equipo2[filas];
				document.getElementById("me1").value = golesEquipo1[filas];
				document.getElementById("me2").value = golesEquipo2[filas];
			};

		</script>

	</body>

</html>