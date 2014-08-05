	var READY_STATE_UNINITIALIZED=0;
	var READY_STATE_LOADING=1;
	var READY_STATE_LOADED=2;
	var READY_STATE_INTERACTIVE=3;
	var READY_STATE_COMPLETE=4;
	var peticion_http;
	
	function cargaContenido(url, metodo, funcion) {
		peticion_http = inicializa_xhr();
		if(peticion_http) {
			peticion_http.onreadystatechange = funcion;
			peticion_http.open(metodo, url, true);
			peticion_http.send(null);
		}
	}
	
	function inicializa_xhr(){
		if(window.XMLHttpRequest) {
			return new XMLHttpRequest();
		}else if(window.ActiveXObject){
			return new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	
	//saving and edit details from Tattoos or Paints
	function saveDetails(secid){
		
		var desc_es = $('#desc_'+secid).val();		
		cargaContenido("save_pic_details.php?desc_es="+desc_es+"&pid="+secid, "GET", handleOpt);
		closeOptions(secid);
	}

	//close form panel option
	function handleOpt() {
		if(peticion_http.readyState == READY_STATE_COMPLETE) {
			if(peticion_http.status == 200){
			}
		}
	}
	
	function closeOptions(idpanel){
		$("#thumb_"+idpanel).fadeOut(1000);
	}