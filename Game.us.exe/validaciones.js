//validaciones

function validaciónFechaJuego(){
	alert("Una fecha de lanzamiento de un juego tiene que ser posterior a ahora");
	var date = document.getElementById("launch");
	var aux = date.value;
	
	var ahora = new Date();
	var fJuego= new Date(aux);
	document.write(ahora);
	if(ahora>fJuego){
		//document.write(fJuego);
		//var error= "Una fecha de lanzamiento de un juego tiene que ser posterior a ahora";
		alert("Una fecha de lanzamiento de un juego tiene que ser posterior a ahora");
	}
	
	//launch.setCustomValidity(error);
	
	return error;
}


function validaciónContraseña(){
	var a=document.getElementById("pass");
	var b=document.getElementById("confirmpass");
	
	if(a!=b){
		alert("Las contraseñas no son iguales");
	}
	
}
