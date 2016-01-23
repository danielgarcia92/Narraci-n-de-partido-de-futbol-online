$( document ).ready(inicializar);

function inicializar(){
    $("#enviar").on('click',ejecutarAjax);
}

function ejecutarAjax(){
	var equipo1 = $("#e1").val();
	var equipo2 = $("#e2").val();
	var marcador1 = $("#me1").val();
	var marcador2 = $("#me2").val();
	var minuto = $("#minuto").val();
	var comentario = $("#comentario").val();
	document.getElementById("minuto").value = '';
	document.getElementById("comentario").value = '';

	$.ajax({
		url 	: '/Parcial2/varios/rt.php',
		type 	: 'POST',
		data	: {"equipo1":equipo1,"equipo2":equipo2,"marcador1":marcador1,"marcador2":marcador2,"minuto":minuto,"comentario":comentario,"channel":"2"}
	});

}