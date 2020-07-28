//validaciones

function validateForm() {
		// Comprobar que la longitud de la contraseña es >=8, que contiene letras mayúsculas y minúsculas y números
		
		var noValidation = document.getElementById("altaUsuario").noValidate;

        if (!noValidation){
        	
		var error1 = validacionContraseña();
        
		var error2 = vC();
        if((error1.length==0) && (error2.length==0)){
        	
        }else{
        	window.alert("Está mal");
        	window.location.href = "formulario.php";
        }
		return (error1.length==0) && (error2.length==0);
		}
		else{
			return true;
		}
	}
	
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


function validacionContraseña(){
		var aM=document.getElementById("pass");
		var a = aM.value;
		var bM = document.getElementById("confirmpass");
		var b = bM.value;
		if(a!=b){
			var error ="Las contraseñas no son iguales";
			window.alert("ha saltado");
		}
		else{
			var error= "";
		}
		bM.setCustomValidity(error);
		return error;
  	}
	
function vC(){
	var aM=document.getElementById("pass");
	var a = aM.value;
	
	if(a<8){
		var error ="La contraseña es menor de 8 caracteres";
		}
		else{
			var error= "";
		}
		aM.setCustomValidity(error);
		return error;
}
