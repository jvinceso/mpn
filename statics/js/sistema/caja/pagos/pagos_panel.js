$(function(){
	$("#lista_pagos").bind({
		click:function(evt){
			evt.preventDefault();
			listaPagos();
		}
	});

	// $("#registra_concepto").bind({
	// 	click:function(evt){
	// 		evt.preventDefault();
	// 		cboTipoPago();
	// 	}
	// });

})

function listaPagos(){
	msgLoading('#tabla_pagos',"Obteniendo Datos de los Pagos!!!");
	$.ajax({
		url:'caja_pagos/listaPagos',
		type:'post',
		cache:false,
		success:function(data){
			$("#tabla_pagos").html(data);
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

function confirmarDelete(nConId){
	$.ajax({
		type:"post",
		url: 'concepto/delConcepto',
		cache:false,
		data:{
			nConId : nConId
		},
		success:function(data){
			switch (data) { 
				case "0":
				mensaje("Error al eliminar el Concepto!","a");                   
				break;
				default:                        
				mensaje("Se Eliminó correctamente el Concepto","e");
				listarConcepto();
                        // limpiarForm('#frm_ins_trabajador');
            }
                },
                error:function(){
                	alert("error");
                }
            });
}