$(function(){
	$("#lista_calles").bind({
		click:function(evt){
			evt.preventDefault();
			listarCalles();
		}
	});
});

function listarCalles(){
	msgLoading('#tabla_calles',"Obteniendo Datos de las Calles sea paciente!!!");
	$.ajax({
		url:'calle/listarCalles',
		type:'post',
		cache:false,
		success:function(data){
			$("#tabla_calles").html(data);
		},
		error:function(er){
			console.log(er.statusText);
			alert("Houston, tenemos un problema... Creo que has roto algo...");
		}
	});	
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
			listarSectores();
		},
		error:function(){
			alert("error");
		}
	});
}