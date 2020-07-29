//validaciones

function validaciónFechaJuego(){
	var date = document.getElementById("launch");
	var aux = date.value;
	
	var ahora = new Date();
	var fJuego= new Date(aux);
	document.write(ahora);
	if(ahora>fJuego){
		document.write(fJuego);
		var error= "Una fecha de lanzamiento de un juego tiene que ser posterior a ahora";
	}
	
	launch.setCustomValidity(error);
	
	return error;
}
