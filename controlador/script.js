function restablecer() {
	// iniciamos el proceso
	var url = 'controlador/restablecer.php';
	var method = 'POST';
	var params = 'usuario='+document.getElementById('usuario').value;
	params += '&correo='+document.getElementById('correo').value;
	params += '&password='+document.getElementById('password').value;
	var container_id = 'list_container' ;
	var loading_text = '<img src="fb_loading.gif">' ;
	// llamamos ajax function
	ajax (url, method, params, container_id, loading_text) ;
}

function vaciar() {
	// iniciamos el proceso
	var url = 'controlador/vaciar.php';
	var method = 'POST';
	var params = 'producto='+document.getElementById('producto').value;

	var container_id = 'list_container' ;
	var loading_text = '<img src="fb_loading.gif">' ;
	// llamamos ajax function
	ajax (url, method, params, container_id, loading_text) ;
	
}

function nuevo_stock() {
	// iniciamos el proceso
	var url = 'controlador/agregar_stock.php';
	var method = 'POST';
	var params = 'producto='+document.getElementById('producto').value;
	params += '&descripcion='+document.getElementById('descripcion').value;
	params += '&cantidad='+document.getElementById('cantidad').value;

	var container_id = 'list_container' ;
	var loading_text = '<img src="fb_loading.gif">' ;
	// llamamos ajax function
	ajax (url, method, params, container_id, loading_text) ;
}
function modificar_stock() {
	// iniciamos el proceso
	var url = 'controlador/cambiar_stock.php';
	var method = 'POST';
	var params = 'producto='+document.getElementById('producto').value;
	params += '&descripcion='+document.getElementById('descripcion').value;
	params += '&id='+document.getElementById('id').value;
	params += '&cantidad='+document.getElementById('cantidad').value;

	var container_id = 'list_container' ;
	var loading_text = '<img src="fb_loading.gif">' ;
	// llamamos ajax function
	ajax (url, method, params, container_id, loading_text) ;
}


function vender() {
	var url = 'controlador/vender_producto.php';
	var method = 'POST';
	var params = 'producto='+document.getElementById('producto').value;
	params += '&cantidad='+document.getElementById('cantidad').value;
	params += '&precio='+document.getElementById('precio').value;

	var container_id = 'list_container' ;
	var loading_text = '<img src="fb_loading.gif">' ;
	ajax (url, method, params, container_id, loading_text) ;
}

function asignar_rol() {
	var url = 'controlador/asignar.php';
	var method = 'POST';
	var params = 'nombre='+document.getElementById('usuario').value;
	params += '&cargo='+document.getElementById('cargo').value;
	var container_id = 'list_container' ;
	var loading_text = '<img src="fb_loading.gif">' ;
	ajax (url, method, params, container_id, loading_text) ;
}

function vender_caja() {
	var url = 'controlador/vender_producto_caja.php';
	var method = 'POST';
	var params = 'producto='+document.getElementById('producto').value;
	params += '&cantidad='+document.getElementById('cantidad').value;
	params += '&precio='+document.getElementById('precio').value;

	var container_id = 'list_container' ;
	var loading_text = '<img src="fb_loading.gif">' ;
	ajax (url, method, params, container_id, loading_text) ;
}


function agregar_usuario() {
	var url = 'controlador/agregar_usuario.php';
	var method = 'POST';
	var params = 'usuario='+document.getElementById('usuario').value;
	params += '&correo='+document.getElementById('correo').value;
	params += '&password='+document.getElementById('password').value;
	params += '&puesto='+document.getElementById('puesto').value;
	var container_id = 'list_container' ;
	var loading_text = '<img src="fb_loading.gif">' ;
	// llamamos ajax function
	ajax (url, method, params, container_id, loading_text) ;
}


// delete_member function
function borrar_usuario(id) {
	if (confirm('¿Confirma eliminar usuario?')) {
		// initialisation
		var url = 'controlador/borrar_usuario.php';
		var method = 'POST';
		var params = 'id='+id;
		var container_id = 'list_container' ;
		var loading_text = '<img src="fb_loading.gif">' ;
		// call ajax function
		ajax (url, method, params, container_id, loading_text) ;
	}
}

function borrar_stock(id) {
	if (confirm('¿Confirma eliminar registro de este producto?')) {
		// initialisation
		var url = 'controlador/borrar_stock.php';
		var method = 'POST';
		var params = 'id='+id;
		var container_id = 'list_container' ;
		var loading_text = '<img src="fb_loading.gif">' ;
		// call ajax function
		ajax (url, method, params, container_id, loading_text) ;
	}
}
function modal_stock(id,producto,descripcion,cantidad) {
		
		
	document.querySelector('input[name="id"]').value =id;
	document.querySelector('input[name="producto"]').value =producto;
	document.querySelector('input[name="descripcion"]').value =descripcion;
	document.querySelector('input[name="cantidad"]').value =cantidad;
}

function borrar_venta(id) {
	if (confirm('¿Confirma eliminar esta venta?')) {
		// initialisation
		var url = 'controlador/borrar_venta.php';
		var method = 'POST';
		var params = 'id='+id;
		var container_id = 'list_container' ;
		var loading_text = '<img src="fb_loading.gif">' ;
		// call ajax function
		ajax (url, method, params, container_id, loading_text) ;
	}
}



// ajax : basic function for using ajax easily
function ajax (url, method, params, container_id, loading_text) {
    try { // For: chrome, firefox, safari, opera, yandex, ...
    	xhr = new XMLHttpRequest();
    } catch(e) {
	    try{ // for: IE6+
	    	xhr = new ActiveXObject("Microsoft.XMLHTTP");
	    } catch(e1) { // if not supported or disabled
	    	alert("Not supported!");
	    }
	}
	xhr.onreadystatechange = function() {
						       if(xhr.readyState == 4) { // when result is ready
						       	document.getElementById(container_id).innerHTML = xhr.responseText;
							   } else { // waiting for result 
							   	document.getElementById(container_id).innerHTML = loading_text;
							   }
							}
							xhr.open(method, url, true);
							xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
							xhr.send(params);
						}
