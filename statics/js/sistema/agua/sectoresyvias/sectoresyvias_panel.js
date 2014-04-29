$(function(){
	// listarSectores();
	$("#lista_sectores").bind({
		click:function(evt){
			evt.preventDefault();
			listarSectores();
		}
	});
});

function listarSectores(){
	msgLoading('#tabla_sectores',"Obteniendo Datos de los sectores sea paciente!!!");
	$.ajax({
		url:'sectoresyvias/listarSectores',
		type:'post',
		cache:false,
		success:function(data){
			$("#tabla_sectores").html(data);
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
			listarContribuyentes();
		},
		error:function(){
			alert("error");
		}
	});
}