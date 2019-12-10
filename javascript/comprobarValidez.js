var regt = 0;
var v1 = 0;
function correoValido(correo){
	var caracteres = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);
	if(caracteres.test(correo) == false)
		return false;
	else return true;
}

function esconder(siCorreo, noCorreo, siPass, noPass, siNombre, noNombre, siApe, noApe, noNick){
	 siCorreo.hide();
	 noCorreo.hide();
	 siPass.hide();
	 noPass.hide();
	 siNombre.hide();
	 noNombre.hide();
	 siApe.hide();
	 noApe.hide();
	 noNick.hide();
}

function comprobar(correo, si, no){
	//var regt = regt;
	correo.change(function(){
    if (correoValido(correo.val() ) ) {
         no.hide();
		 si.show();
		 regt = 1;
    } else {
         si.hide();
		 no.show();
		 regt = 0;
    }
	});
}

function comprobarAjaX(username, no){
  username.change(function(){
  no.hide();	
  var url="comprobarUsuario.php?user=" + username.val();
  $.get(url,usuarioExiste);
});
}

function usuarioExiste(data, status){
	alert(data);

}

function comprobarVacio(input, si, no){

	input.change(function(){
    if (input.val() == '')  {
         si.hide();
		 no.show();
		 v1 = 0;
    } else {
         no.hide();
		 si.show();
		 v1 = 1;
    }
	});
}

function comprobarInfor(t1, buttonRegist,clave,name, ape){
	t1.change(function(){
		var vacio = 1;
		if((clave.val()=='')||(name.val()=='')||(ape.val()=='')){
			vacio = 0;
		}
		
	    if((regt&&v1&&vacio) === 0){
			document.getElementById("buttonRegist").disabled=true;  
			document.getElementById("buttonRegist").innerHTML="Por favor, confirme las informaciones";  
		}else{
			document.getElementById("buttonRegist").disabled=false;  
			document.getElementById("buttonRegist").innerHTML="Registrarse";  
		}
	});
}