$(function(){
	$("#lista_pagos").bind({
		click:function(evt){
			evt.preventDefault();
			listaPagos();
		}
	});

	$("#lista_agua").bind({
		click:function(evt){
			evt.preventDefault();
			listaAgua();
		}
	});
})

function pagarReciboAgua(fila){
	var mes    =  $(fila).find("td:eq(4)").text().trim();
	var recibo =  $(fila).find("td:eq(5)").text().trim().split('-');
	var abono  =  $(fila).find("td:eq(3)").text().trim();
	// console.log(recibo[1])
	var impresion = confirm("Usted Cobrará el recibo del siguiente mes : "+mes+" es conforme?");
	if ( impresion ) {
		$.ajax({
			url:'caja_pagos/pagarReciboAgua',
			type:'post',
			cache:false,
			data:{
				nCpaId:$(fila).data('codx')
				,nRecId:recibo[1]
				,abono : abono
			},
			success:function(data){
				switch (data) { 
					case "0":
					mensaje("Hubo un error al pagar el recibo de agua!","a");                   
					break;
					default:                        
					mensaje("El recibo de agua se pago correctamente","e");
					listaAgua();
				}

			},
			error:function(er){
				console.log(er.statusText);
				alert("Houston, tenemos un problema... Creo que has roto algo...");
			}
		});
	}else
	mensaje("No se realizo el cobro del recibo","a");
}

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

function listaAgua(){
	msgLoading('#tabla_agua',"Obteniendo Datos de Agua!!!");
	$.ajax({
		url:'caja_pagos/listaAgua',
		type:'post',
		cache:false,
		success:function(data){
			$("#tabla_agua").html(data);
		},
		error:function(er){
			console.log(er.statusText);
			alert("Houston, tenemos un problema... Creo que has roto algo...");
		}
	});	
}

function confirmarDeletePago(nCpaId){
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
			}
		},
		error:function(){
			alert("error");
		}
	});
}