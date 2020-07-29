//validaciones

function validateForm() {
		// Comprobar que la longitud de la contraseña es >=8, que contiene letras mayúsculas y minúsculas y números
		
		var noValidation = document.getElementById("altaUsuario").noValidate;

        if (!noValidation){
        	
			var error1 = validacionContraseña();
        
			var error2 = vC();
        	if((error1.length==0) && (error2.length==0)){
        		
        	}else{
        		window.alert("La contraseña es demasiado corta o no coincide");
        		window.location.href = "formulario.php";
       	    }	
			return (error1.length==0) && (error2.length==0);
		}
		else{
			return true;
		}
	}
	
function validaciónFechaJuego(){
	//alert("Una fecha de lanzamiento de un juego tiene que ser posterior a ahora");
	var date = document.getElementById("launch");
	var aux = date.value;
	
	
	var fJuego= new Date(aux);
	var a = fJuego.toString();
	var arfJuego = a.split(' ');
	var b = parseInt(arfJuego[3]);
	var año = 2000;
	//document.write(año);
	//document.write(b);
	if(año>b){
		//document.write(fJuego);
		var error= "Una fecha de lanzamiento de un juego tiene que ser posterior a 2000";
		window.alert("Una fecha de lanzamiento de un juego tiene que ser posterior a 2000");
	}else{
		var error = "";
	}
	
	date.setCustomValidity(error);
	
	return error;
}


function validacionContraseña(){
		var aM=document.getElementById("pass");
		var a = aM.value;
		var bM = document.getElementById("confirmpass");
		var b = bM.value;
		if(a!=b){
			var error ="Las contraseñas no son iguales";
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
