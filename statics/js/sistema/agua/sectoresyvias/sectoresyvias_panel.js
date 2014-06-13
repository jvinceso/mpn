$(function(){
	// listarSectores();
	$("#lista_sectores").bind({
		click:function(evt){
			evt.preventDefault();
			listarSectores();
		}
	});
	$("#lista_vias").bind({
		click:function(evt){
			evt.preventDefault();
			listarVias();
		}
	});
});

function listarSectores(){
	msgLoading('#tabla_sectores',"Obteniendo Datos de los Sectores sea paciente!!!");
	$.ajax({
		url:'sectoresyvias/listarSectores',
		type:'post',
		cache:false,
		success:function(data){
			$("#tabla_sectores").html(data);
		},
		error:function(er){
			console.log(er.statusText);
			alert("Houston, tenemos un problema... Creo que has roto algo...");
		}
	});	
}

function listarVias(){
	msgLoading('#tabla_vias',"Obteniendo Datos de las Vías sea paciente!!!");
	$.ajax({
		url:'sectoresyvias/listarVias',
		type:'post',
		cache:false,
		success:function(data){
			$("#tabla_vias").html(data);
		},
		error:function(er){
			console.log(er.statusText);
			alert("Houston, tenemos un problema... Creo que has roto algo...");
		}
	});	
}

function confirmarDeleteVia(nViaId){
	$.ajax({
		type:"post",
		url: 'sectoresyvias/delVia',
		cache:false,
		data:{
			nViaId : nViaId
		},
		success:function(data){

			switch (data) { 
				case "0":
				mensaje("Error al eliminar la Via!","a");                   
				break;
				default:                        
				mensaje("Se Eliminó correctamente la Via","e");
				listarVias();
                        // limpiarForm('#frm_ins_trabajador');
                    }

                },
                error:function(){
                	alert("error");
                }
            });
}

function confirmarDeleteSector(nSecId){
	$.ajax({
		type:"post",
		url: 'sectoresyvias/delSector',
		cache:false,
		data:{
			nSecId : nSecId
		},
		success:function(data){
			switch (data) { 
				case "0":
				mensaje("Error al eliminar el Sector!","a");                   
				break;
				default:                        
				mensaje("Se Eliminó correctamente el Sector","e");
				listarSectores();
                        // limpiarForm('#frm_ins_trabajador');
                    }
                },
                error:function(){
                	alert("error");
                }
            });
}