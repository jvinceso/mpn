$(function(){

});
function pagarRecibo(fila){
	var nRecId   = $(fila).find("td:eq(0)").text().trim();

	var impresion = confirm("desea Imprimir Recibo");
	if ( impresion ) {
		// alert("imprimiendo.... Recibo");
		// set_popup(url,title,ancho,alto,parametro,func_close);
	}else{
		alert("ok entiendo y no imprimire Recibo");		
	}

	$.ajax({
	    url:'recibo/efectuarPago',
	    type:'post',
	    cache:false,
	    data:{
	    	nRecId:nRecId
	    },
	    success:function(data){
	    	// window.open()
	    	console.log( data );
	    },
	    error:function(er){
	    	console.log(er.statusText);
	        alert("Houston, tenemos un problema... Creo que has roto algo...");
	    }
	});
	
	

}