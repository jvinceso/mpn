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

function confirmarDelete(nCalId){
	$.ajax({
		type:"post",
		url: 'calle/delCalle',
		cache:false,
		data:{
			nCalId : nCalId
		},
		success:function(data){
			switch (data) { 
				case "0":
				mensaje("Error al eliminar la calle!","a");                   
				break;
				default:                        
				mensaje("Se Eliminó correctamente la Calle","e");
				listarCalles();
                        // limpiarForm('#frm_ins_trabajador');
            }
                },
                error:function(){
                	alert("error");
                }
            });
}