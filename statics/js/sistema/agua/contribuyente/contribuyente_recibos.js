$(function(){
	$(".chosen-select").chosen();
	$("#cbo_anio_recibo").bind({
		    change:function(evt){
		        evt.preventDefault();
		        actualizarGrilla();
		    }
	});
	$("#btnFrmInsPagos").bind({
	    click:function(evt){
	        evt.preventDefault();
	        procesaPagoMultiple();
	    }
	});
});
function pagarRecibo(fila){
	var nRecId  = $(fila).find("td:eq(0)").text().trim();
	var nPerid  = $("input[name=txt_hdn_nPerid]").val();
	var fecha   = $(fila).find("td:eq(2)").text().trim();

	var impresion = confirm("Usted Pagara el recibo de la siguiente fecha : "+fecha+" es conforme?");
	if ( impresion ) {
		$.ajax({
		    url:'recibo/efectuarPago',
		    type:'post',
		    cache:false,
		    data:{
		    	nRecId:nRecId,
		    	nPerid:nPerid
		    },
		    success:function(data){
		    	console.log( data );
				if (data == "1") {
					mensaje("Se Transfirio a Caja de forma exitosa...","e");
					actualizarGrilla();
				}if (data == "3") {
					mensaje("El Recibo "+nRecId+" ya ha sido transferido a caja ó Pagado en caja","r");
				}if (data == "0") {
					mensaje("Existen Recibos pendientes de Transferencia por favor asegurese revisarlo","a");
				}
				// else{
					// mensaje("Por favor vuelva intentar...","a");
				// }
		    },
		    error:function(er){
		    	console.log(er.statusText);
		        alert("Houston, tenemos un problema... Creo que has roto algo...");
		    }
		});

	}else{
		mensaje("No se realizo el cobro del recibo","a");
	}
}
function coloresPago(){
	// using jQuery to populate the table cells
	var min = -10;
	var max = 10;

	$('td').each(
	    function(){
	        $(this).text(Math.floor(Math.random() * (max - min + 1)) + min);
	    }
	);


	var table = document.getElementById('tableID');
	var tbody = table.getElementsByTagName('tbody')[0];
	var cells = tbody.getElementsByTagName('td');

	for (var i=0, len=cells.length; i<len; i++){
	    if (parseInt(cells[i].innerHTML,10) > 5){
	        cells[i].style.backgroundColor = 'red';
	    }
	    else if (parseInt(cells[i].innerHTML,10) < -5){
	        cells[i].style.backgroundColor = 'green';
	    }
	}	
}

function actualizarGrilla(){
	var anio   = $("#cbo_anio_recibo option:selected").val();
	var nPerId = $("input[name=txt_hdn_nPerid]").val();
	get_page('contribuyente/get_recibos_contribuyente/','c_qry_direccion_contribuyente',{"opt":'list',"anio":anio,"nPerId":nPerId });	
}

function disableEliminar(){
	var tablita = $('#tabla-direcccion-contribuyente').dataTable().fnGetNodes();
	var estado;
	console.log("tablis");
	$.each(tablita, function (indice, valor) {
	    estado = $(valor).find('td:eq(3)').text().trim();
	    if (estado.toUpperCase() != "TRANSFERIDO") {
	        //    var opcion = $(valor).find('a>.icon-ban-circle');
	        $(valor).find('a>.icon-ban-circle').parent('a').addClass('disabled');
	    }else{
	        $(valor).find('a>.icon-retweet').parent('a').addClass('disabled');	    	
	        $(valor).find('a>.icon-credit-card').parent('a').addClass('disabled');	    	
	    }

	});	
}
function EliminarTransferencia(fila){
	msjCargando();
	console.log(fila);
	var nRecId = $(fila).find('td:eq(0)').text().trim();
	$.ajax({
	    url:'recibo/cancelarTransferenciaCaja',
	    type:'post',
	    cache:false,
	    data:{
	    	nRecId : nRecId
	    },
	    success:function(data){
	    	if (data == "1") {
	    		cierraCargando();
	    		mensaje("Se Cancelo el recibo de forma Exitosa...","e");
	    		actualizarGrilla();
	    	}if (data == "0") {
	    		cierraCargando();
	    		mensaje("El Recibo "+nRecId+" ya ha sido Pagado en caja por favor comuniquese con dicha area","r");
	    	}
	    },
	    error:function(er){
	    	console.log(er.statusText);
	        alert("Houston, tenemos un problema... Creo que has roto algo...");
	    }
	});
	
	
}
function procesaPagoMultiple(){
	var nPdeId = 5;
	var nPerId = 23;
	set_popup('../agua/contribuyente/popupPagos/','Recibos por Periodo',650,450,{'codx':nPdeId,'PerId':nPerId},'');
}