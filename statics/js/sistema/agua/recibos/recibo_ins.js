$(function(){
	$(".chosen-select").chosen();
	$("#cbo_servicio").bind({
	    change:function(evt){
	        evt.preventDefault();
	        load_anios();
	    }
	});
	
});
function load_anios(){
	msgLoading('#c_cbo_anios',"Buscando años...");
	$.ajax({
	    url:'recibo/obtenerAnios',
	    type:'post',
	    cache:false,
	    data:{
	    	servicio:$("#cbo_servicio option:selected").val()
	    },
	    success:function(data){
	    	if (data!="2") {
	    		$("#c_cbo_anios").html( data );
	    		$(".chosen-select").chosen();
	    	}else{
	    		$("#c_cbo_anios").html( "lo sentimos no encontramos años" );	    		
	    	}
	    },
	    error:function(er){
	    	console.log(er.statusText);
	        alert("Houston, tenemos un problema... Creo que has roto algo...");
	    }
	});	
}