$(function(){
	$(".chosen-select").chosen();
	$("#cbo_anio_recibo").bind({
		    change:function(evt){
		        evt.preventDefault();
		        actualizarGrilla();
		    }
		});	
});
function pagarRecibo(fila){
	var nRecId  = $(fila).find("td:eq(0)").text().trim();
	var fecha   = $(fila).find("td:eq(2)").text().trim();

	var impresion = confirm("Usted Pagara el recibo de la siguiente fecha : "+fecha+" es conforme?");
	if ( impresion ) {
		$.ajax({
		    url:'recibo/efectuarPago',
		    type:'post',
		    cache:false,
		    data:{
		    	nRecId:nRecId
		    },
		    success:function(data){
		    	console.log( data );
				if (data == "1") {
					mensaje("Se Realizo el cobro de forma exitosa...","e");
					actualizarGrilla();
				}if (data == "3") {
					mensaje("El Recibo "+nRecId+" ya ha sido transferido a caja ó Pagado en caja","r");
				}else{
					mensaje("Por favor vuelva intentar...","a");
				}
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