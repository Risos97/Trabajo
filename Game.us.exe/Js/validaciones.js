//validaciones

function validateForm() {
		
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
	
	
	function validateForm2() {
		var noValidation = document.getElementById("altaProducto").noValidate;

        if (!noValidation){
        	
			var error1 = validacionFechaJuego();
        
        	if((error1.length==0)){
        		
        	}else{
        		window.alert("Una fecha de lanzamiento de un juego tiene que ser posterior a 2000");
        		window.location.href = "alta_producto.php";
       	    }	
			return (error1.length==0);
		}
		else{
			return true;
		}
	}
function validacionFechaJuego(){
    //alert("Una fecha de lanzamiento de un juego tiene que ser posterior a ahora");
    var date = document.getElementById("launch");
    var aux = date.value;



    var a = aux.toString();
    var arfJuego = a.split('-');
    var b = parseInt(arfJuego[0]);
    var año = 90;
    //document.write(año);
    //document.write(b);
    if(año>b){
        //document.write(fJuego);
        var error= "Una fecha de lanzamiento de un juego tiene que ser posterior a 2000";
        
    }else{
        var error = "";
        b=b-2000;
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
