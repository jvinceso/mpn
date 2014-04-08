$(function(){
	listarContribuyentes();
	$("#anc_contri_listado").bind({
		click:function(evt){
			evt.preventDefault();
			listarContribuyentes();
		}
	});
});

function listarContribuyentes(){
	msgLoading('#tbl_contribuyentes_principal',"Obteniendo Datos del Contribuyente sea paciente!!!");
	$.ajax({
		url:'contribuyente/listarContribuyente',
		type:'post',
		cache:false,
		success:function(data){
			$("#tbl_contribuyentes_principal").html(data);
		},
		error:function(er){
			console.log(er.statusText);
			alert("Houston, tenemos un problema... Creo que has roto algo...");
		}
	});	
}
function asignaDetalle(fila,option){
	console.log(fila);
	switch(option){
		case 'dir':
			console.log(option);
		break;
		case 'docu':
			console.log(option);
		break;
		case 'pago':
			console.log(option);
		break;
		case 'tele':
			console.log(option);
		break;
		case 'baja':
			console.log(option);
		break;		
	}
	alert("Il Mondo E Nostro");
}