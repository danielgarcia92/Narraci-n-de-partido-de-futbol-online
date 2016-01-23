$( document ).ready(inicializar);

function inicializar(){
	iniPusher();
}

function iniPusher(){
	var pusher = new Pusher('ff4b6a8b1f92ee1509c2');
	var channel = pusher.subscribe('rtch2');
	channel.bind('actualizar', function(data){

                                    if (data.reiniciar != 0){
                                          $("#pDialogo").text('Debes recargar la página');
                                          $(function () {
                                              $("#dialogo").dialog({
                                                  autoOpen: true
                                              });
                                          });
                                    }else{
                                          document.getElementById("e1").value = data.equipo1;
                                          document.getElementById("e2").value = data.equipo2;
                                          document.getElementById("me1").value = data.marcador1;
                                          document.getElementById("me2").value = data.marcador2;
                                          $("#salida").prepend(data.comentario);
                                          $("#salida").prepend('        ');
                                          $("#salida").prepend(data.minuto);
                                          $("#salida").prepend('\n <br>');
                                          $("#pDialogo").text(data.minuto + ' --- ' + data.comentario);
                                          $(function () {
                                              $("#dialogo").dialog({
                                                  autoOpen: true
                                              });
                                          });
                                    }
					});
}