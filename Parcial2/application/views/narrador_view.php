<!DOCTYPE html>
<html lang="es">

	<head>
		
		<title>Partido :: Narrador</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

		<style> p{ color: black;} .paragraph1 { font-size: 35px; text-align: center; font-weight: bold; } .paragraph2 { text-align: center; } .p3 { text-align: center; } </style>

		<link rel="shortcut icon" type="image/x-icon" href="http://localhost/Parcial2/balon.ico" >
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
		<link href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" type="text/css" rel="stylesheet" />

		<script type="text/javascript" src="varios/js/ajaxGoogleApis.js"></script>
		<script src="varios/js/jquery-1.9.1.js" type="text/javascript"></script>
		<script src="varios/js/jquery-ui.js" type="text/javascript"></script>
		<script src="varios/js/pusher.min.js"></script>
		<script src='varios/js/rtch1.js'></script>
		
	</head>

	<body>

		<input type="hidden" value="" name="" id="url">
		<script type="text/javascript">
			document.getElementById("url").value = '<?= base_url(); ?>';
		</script>

		<form id="narrador">

			<p class="paragraph1">Narrador</p>
			<div class='col-md-4'></div>
			<textarea id="e1" name="e1" rows="1" cols="20"  placeholder="Equipo 1" ></textarea>
			<textarea id="me1" name="me1" rows="1" style='width:40px' placeholder="#" ></textarea>
			<textarea id="me2" name="me2" rows="1" style='width:40px' placeholder="#" ></textarea>
			<textarea id="e2" name="e2" rows="1" cols="20"  placeholder="Equipo 2" ></textarea>

			<br/>
			<div class='col-md-3'></div>
			<textarea id="comentario" name="comentario" rows="3" cols="91" placeholder="Comentarios"></textarea>

			<br/>
			<div class='col-md-5'></div>
			Minuto: 
			<textarea id="minuto" name="minuto" rows="1" style='width:40px' placeholder="#" ></textarea>
			<button style='width:50px; color: green background: green' type='button' id='enviar' name="Enviar">Enviar</button>

			<br/>
			<table id="tabla" name="tabla">
				<div class='col-md-3'></div>
				<textarea id="salida" rows='20' cols="91"></textarea>
			</table>
			<div class='col-md-6'></div>
			<button style='width:70px; color: green background: green' type='button' id='reiniciarP' name="Reiniciar">Reiniciar</button>

		</form>

		<script type="text/javascript">
			$("#enviar").on('click',function(){
				var url = $("#url").val();
				var equipo1 = $("#e1").val();
				var equipo2 = $("#e2").val();
				var minuto = $("#minuto").val();
				var golesEquipo1 = $("#me1").val();
				var golesEquipo2 = $("#me2").val();
				var comentario = $("#comentario").val();
				$("#salida").prepend(comentario);
				$("#salida").prepend('        ');
				$("#salida").prepend(minuto);
				$("#salida").prepend('\n <br>');

				$.ajax({
					url 	: url + 'narrador/insertarComentario',
					type 	: 'POST',
					data	: {"equipo1":equipo1, "equipo2":equipo2, "comentarios":comentario, "minuto":minuto, "golesEquipo1":golesEquipo1, "golesEquipo2":golesEquipo2}
				});

			});

		</script>
		<script type="text/javascript">

			var minuto = "<?= $fila->minuto ?>";
			var comentarios = "<?= $fila->comentarios ?>";
			var equipo1 = "<?= $fila->equipo1 ?>";
			var equipo2 = "<?= $fila->equipo2 ?>";
			var golesEquipo1 = "<?= $fila->golesEquipo1 ?>";
			var golesEquipo2 = "<?= $fila->golesEquipo2 ?>";

			$("#salida").prepend(comentarios);
			$("#salida").prepend('        ');
			$("#salida").prepend(minuto);
			$("#salida").prepend('\n <br>');
			document.getElementById("e1").value = equipo1; 
			document.getElementById("e2").value = equipo2;
			document.getElementById("me1").value = golesEquipo1;
			document.getElementById("me2").value = golesEquipo2;

		</script>
		<script type="text/javascript">
			$("#reiniciarP").on('click',function(){
				var base_url = $("#url").val();
				$.ajax({
					url 	: '/Parcial2/varios/rt.php',
					type 	: 'POST',
					data	: {"reiniciar": "4","channel":"2"}
				})
				.done(function() {
					window.location.href = base_url + 'narrador';
				});	
			});
		</script>

	</body>

</html>