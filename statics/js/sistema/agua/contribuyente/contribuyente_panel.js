$(function(){
	$("#anc_contri_listado").bind({
		click:function(evt){
			msgLoading('#tbl_contribuyentes_principal',"Obteniendo Datos del Contribuyente sea paciente!!!");
			evt.preventDefault();
			$.ajax({
				url:'contribuyente/listarContribuyente',
				type:'post',
				cache:false,
	            // data:{},
	            success:function(data){
	            	$("#tbl_contribuyentes_principal").html(data);
	            },
	            error:function(er){
	            	console.log(er.statusText);
	            	alert("Houston, tenemos un problema... Creo que has roto algo...");
	            }
	        });
		}
	});
});

function asignaDireccion(fila){
	console.log(fila);
	alert("Il Mondo E Nostro");
}