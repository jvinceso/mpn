$(function(){
	listarOpcionesxAplicacion();
});

function listarOpcionesxAplicacion(){
	$.ajax({
	    url:'modulo/listarObjetos',
	    type:'post',
	    cache:false,
	    data:{
	    	x:'objetos',
	    	cod:$("#txt_ins_apli_codigo").val()
	    },
	    success:function(data){
	
	    },
	    error:function(er){
	    	console.log(er.statusText);
	        alert("Houston, tenemos un problema... Creo que has roto algo...");
	    }
	});
	
	
}