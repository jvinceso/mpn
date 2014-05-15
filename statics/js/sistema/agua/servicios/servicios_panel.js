$(function(){


	$("#lista_tipo_servicios").bind({
		click:function(evt){
			evt.preventDefault();
			listarTipoServicios();
		}
	});

	$("#lista_servicios_por_tipo").bind({
        click:function(evt){
            evt.preventDefault();
            get_page('servicios/listarServicios','tabla_servicios_por_tipo');
        }
    });
})

function listarTipoServicios(){
	msgLoading('#tabla_tipo_servicios',"Obteniendo Datos de los Tipos de Servicios sea paciente!!!");
	$.ajax({
		url:'servicios/listarTipoServicios',
		type:'post',
		cache:false,
		success:function(data){
			$("#tabla_tipo_servicios").html(data);
		},
		error:function(er){
			console.log(er.statusText);
			alert("Houston, tenemos un problema... Creo que has roto algo...");
		}
	});	
}