$(function(){


	$("#lista_servicios").bind({
		click:function(evt){
			evt.preventDefault();
			listarServicios();
		}
	});	

	$("#lista_tipo_servicios").bind({
		click:function(evt){
			evt.preventDefault();
			listarTipoServicios();
		}
	});

	$("#lista_servicios_por_tipo").bind({
		click:function(evt){
			evt.preventDefault();
			get_page('servicios/listarServiciosporTipo','tabla_servicios_por_tipo');
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

function listarServicios(){
	msgLoading('#tabla_servicios',"Obteniendo Datos de los Tipos de Servicios sea paciente!!!");
	$.ajax({
		url:'servicios/listarServicios',
		type:'post',
		cache:false,
		success:function(data){
			$("#tabla_servicios").html(data);
		},
		error:function(er){
			console.log(er.statusText);
			alert("Houston, tenemos un problema... Creo que has roto algo...");
		}
	});	
}

function confirmarDeleteServicioPorTipo(nSetId){//elimina de la tabla servicios_tipo y  costo_servicios_tipo
	$.ajax({
		type:"post",
		url: 'servicios/delServicioPorTipo',
		cache:false,
		data:{
			nSetId : nSetId
		},
		success:function(data){
			switch (data) { 
				case "0":
				mensaje("Error al eliminar el Servicio por Tipo!","a");                   
				break;
				case "2":
				mensaje("Error al eliminar el Costo del Servicio por Tipo!","a");                       
				break;
				default:                        
				mensaje("Se Eliminó correctamente el Servicio por Tipo","e");
				get_page('servicios/listarServiciosporTipo','tabla_servicios_por_tipo');
                        // limpiarForm('#frm_ins_trabajador');
                    }

                },
                error:function(){
                	alert("error");
                }
            });
}

function confirmarDeleteMultitabla(nMulId){ //elimina de la tabla Multimedia
	$.ajax({
		type:"post",
		url: 'servicios/delMultitabla',
		cache:false,
		data:{
			nMulId : nMulId
		},
		success:function(data){
			switch (data) { 
				case "0":
				mensaje("Error al eliminar el Registro!","a");                   
				break;
				default:                        
				mensaje("Se Eliminó correctamente el Registro","e");
				listarServicios();
				listarTipoServicios();
                        // limpiarForm('#frm_ins_trabajador');
                    }

                },
                error:function(){
                	alert("error");
                }
            });
}