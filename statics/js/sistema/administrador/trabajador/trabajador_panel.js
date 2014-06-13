$(function(){	
	$("#lista_trabajador").bind({
		click:function(evt){
			evt.preventDefault();
			listarTrabajador();
		}
	});	
});

function listarTrabajador(){
	msgLoading('#tabla_trabajador',"Obteniendo Datos del Trabajador sea paciente!!!");
	$.ajax({
		url:'trabajador/listarTrabajador',
		type:'post',
		cache:false,
		success:function(data){
			$("#tabla_trabajador").html(data);
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

function confirmarDelete(nPerId){
	$.ajax({
		type:"post",
		url: 'contribuyente/delContribuyente',
		cache:false,
		data:{
			nPerId : nPerId
		},
		success:function(data){
			mensaje("Se Eliminó correctamente la Aplicacion","e");
			listarContribuyentes();
		},
		error:function(){
			alert("error");
		}
	});
}