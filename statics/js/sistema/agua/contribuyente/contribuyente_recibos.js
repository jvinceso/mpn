$(function(){

});
function pagarRecibo(fila){
	var nRecId   = $(fila).find("td:eq(0)").text().trim();

	var impresion = confirm("desea Imprimir Recibo");
	if ( impresion ) {
		// alert("imprimiendo.... Recibo");
		// set_popup(url,title,ancho,alto,parametro,func_close);
	}else{
		alert("ok entiendo y no imprimire Recibo");		
	}

	$.ajax({
	    url:'recibo/efectuarPago',
	    type:'post',
	    cache:false,
	    data:{
	    	nRecId:nRecId
	    },
	    success:function(data){
	    	// window.open()
	    	console.log( data );
	    },
	    error:function(er){
	    	console.log(er.statusText);
	        alert("Houston, tenemos un problema... Creo que has roto algo...");
	    }
	});
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