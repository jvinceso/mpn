$(function(){
	$("#lista_tipo_pago").bind({
		click:function(evt){
			evt.preventDefault();
			listarTipoPago();
		}
	});	

	$("#lista_concepto").bind({
		click:function(evt){
			evt.preventDefault();
			listarConcepto();
		}
	});

	$("#registra_concepto").bind({
		click:function(evt){
			evt.preventDefault();
			cboTipoPago();
		}
	});

})

function listarTipoPago(){
	msgLoading('#tabla_tipo_pago',"Obteniendo Datos de los Tipos de Pago sea paciente!!!");
	$.ajax({
		url:'concepto/listarTipoPago',
		type:'post',
		cache:false,
		success:function(data){
			$("#tabla_tipo_pago").html(data);
		},
		error:function(er){
			console.log(er.statusText);
			alert("Houston, tenemos un problema... Creo que has roto algo...");
		}
	});	
}

function listarConcepto(){
	msgLoading('#tabla_concepto',"Obteniendo Datos de los Conceptos sea paciente!!!");
	$.ajax({
		url:'concepto/listarConcepto',
		type:'post',
		cache:false,
		success:function(data){
			$("#tabla_concepto").html(data);
		},
		error:function(er){
			console.log(er.statusText);
			alert("Houston, tenemos un problema... Creo que has roto algo...");
		}
	});	
}

function confirmarDeleteTipoPago(nMulId){
	$.ajax({
		type:"post",
		url: 'concepto/delTipoPago',
		cache:false,
		data:{
			nMulId : nMulId
		},
		success:function(data){
			switch (data) { 
				case "0":
				mensaje("Error al eliminar el Tipo de Pago!","a");                   
				break;
				default:                        
				mensaje("Se Eliminó correctamente el Tipo de Pago","e");
				listarTipoPago();
                        // limpiarForm('#frm_ins_trabajador');
            }
                },
                error:function(){
                	alert("error");
                }
            });
}