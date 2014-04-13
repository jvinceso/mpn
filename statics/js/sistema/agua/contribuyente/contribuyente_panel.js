$(function(){
	listarContribuyentes();
	$("#anc_contri_listado").bind({
		click:function(evt){
			evt.preventDefault();
			listarContribuyentes();
		}
	});
	// Evento Regresar Pantalla Anterior
	$("#anc_back_contribuyente").click(function(evt){
	    evt.preventDefault();
	    MostrarOcultarCapas('#c_frm_contribuyente','#tbl_contribuyentes_principal');
	    $('#pnl_frm_title').show();
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
	var url = "", title = "";
	switch(option){
		case 'dir':
			title = 'Dirección';
			url = 'contribuyente/get_agregar_direccion';
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
	set_popup(url,title,350,250,'','');
	// alert("Il Mondo E Nostro");
}
function asignar_direccion(fila){
	var nPerId   = $(fila).find("td:eq(0)").text().trim();
	var nombre   = $(fila).find("td:eq(1)").text().trim();	
	var apellido = $(fila).find("td:eq(2)").text().trim();	
	console.log(fila);
	$('#pnl_frm_title').hide();
	get_page('contribuyente/get_agregar_direccion/','c_frm_procesos_contribuyente',{"nPerId":nPerId,"nombre":nombre,'apellido':apellido});
	MostrarOcultarCapas('#tbl_contribuyentes_principal','#c_frm_contribuyente','','');
}