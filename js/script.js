document.getElementById("btn_ingresar_cliente").addEventListener("click", login_cliente);
document.getElementById("btn_ingresar_personal").addEventListener("click", login_personal);
window.addEventListener("resize", anchoPagina);

//Declaracion de variables
var contenedor_cliente_personal = document.querySelector(".contenedor_cliente-personal");
var login_cliente = document.querySelector(".formulario_cliente");
var login_personal = document.querySelector(".formulario_personal");
var caja_trasera_login_pe = document.querySelector(".caja_trasera-login_pe");
var caja_trasera_login_cli = document.querySelector(".caja_trasera-login_cli");

function anchoPagina(){
	if (window.innerWidth > 850) {
		caja_trasera_login_cli.style.display = block;
		caja_trasera_login_pe.style.display = block;
	}else{
		caja_trasera_login_pe.style.display = "block";
		caja_trasera_login_pe.style.opacity = "1";
		caja_trasera_login_cli.style.display = "none";
		login_cliente.style.display = "block";
		login_personal.style.display = "none";
		contenedor_cliente_personal.style.left = "0px";
	}
}

anchoPagina();


function login_cliente(){

	if (window.innerWidth > 850) {
		login_personal.style.display = "none";
		contenedor_cliente_personal.style.left = "10px";
		login_cliente.style.display = "block";
		caja_trasera_login_pe.style.opacity = "1";
		caja_trasera_login_cli.style.opacity = "0px";
	}else{
		login_personal.style.display = "none";
		contenedor_cliente_personal.style.left = "0px";
		login_cliente.style.display = "block";
		caja_trasera_login_pe.style.display = "block";
		caja_trasera_login_cli.style.display = "none";
	}

}

function login_personal(){

	if (window.innerWidth > 850) { 
		login_personal.style.display = "block";
		contenedor_cliente_personal.style.left = "410px";
		login_cliente.style.display = "none";
		caja_trasera_login_pe.style.opacity = "0";
		caja_trasera_login_cli.style.opacity = "1"; 
	}else{
		login_personal.style.display = "block";
		contenedor_cliente_personal.style.left = "0px";
		login_cliente.style.display = "none";
		caja_trasera_login_pe.style.display = "none";
		caja_trasera_login_cli.style.display = "block";
		caja_trasera_login_cli.style.opacity = "1"; 
	}
}

