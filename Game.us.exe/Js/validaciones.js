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
			
			var error2 = validacionPrecioJuego();
        
        	if((error1.length==0) && (error2.length==0)){
        		
        	}else{
        		window.alert("Una fecha de lanzamiento de un juego tiene que ser posterior a 1983 y el precio mayor a 0");
        		window.location.href = "alta_producto.php";
       	    }	
			return (error1.length==0) && (error2.length==0); 
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
    var arfJuego = a.split('/');
    var b = parseInt(arfJuego[2]);
    var año = 1983;
    //document.write(año);
    //document.write(b);
    if(año>b){
        //document.write(fJuego);
        var error= "Una fecha de lanzamiento de un juego tiene que ser posterior a 1983";
        
    }else{
        var error = "";
    }

    
    date.setCustomValidity(error);

    return error;
}

function validacionPrecioJuego(){
    var precio = document.getElementById("precio");
    var aux = precio.value;



    var a = parseInt(aux);
    var cero= 0;
    if(cero>a){
        //document.write(fJuego);
        var error= "Un precio tiene que ser mayor a 0";
        
    }else{
        var error = "";
    }

    
    precio.setCustomValidity(error);

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
