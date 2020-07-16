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
	var aM=document.getElementById("pass");
	var a = aM.value;
	var bM = document.getElementById("confirmpass");
var b = bM.value;
	if(a!=b){
		alert("Las contraseñas no son iguales");
	}
	
function vC(){
	var aM=document.getElementById("pass");
	var a = aM.value;
	
	if(a<8){
		alert("Las contraseñas no es grande");
	}
	
}
