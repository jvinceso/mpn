$(function(){
	$(".chosen-select").chosen();
	$("#frm_ins_servicio_contribuyente").submit(function(evt){
		DesabilitarBoton('btn_serviciotipo');
		evt.preventDefault();
		$.ajax({
			url:'contribuyente/insServiciosxDireccion',
			cache:false,
			type:'post',
			data:{
				nPdeId       : $("input[name='txt_hdn_nPdeId']").val(),
				nPerId       : $("input[name='txt_persona_id']").val(),
				serviciotipo : $("#cboServicioTipo option:selected").val()
			},
			success:function(data){
				switch (data) { 
					case "2":
						mensaje("Error al agregar el tipo de servicio!!!","a"); 
					break; 
					case "3":
						mensaje("Ya existe un servicio del mismo tipo registrado!!!","r"); 
					break; 
					default:
						mensaje("Se Agrego correctamente el tipo de servicio","e");
						// limpiarForm('#frm_ins_servicio_contribuyente');
						listarModulo();
				}
				HabilitarBoton('btn_serviciotipo');
			},
			error:function(error){
			}
		})
	});
});

function listarModulo(){
	msgLoading('#c_qry_serviciostipo',"Espere por favor!!!");
	$.ajax({
	    url:'contribuyente/listarServiciosxDireccion',
	    type:'post',
	    cache:false,
	    data:{
	    	nPerId : $("input[name='txt_persona_id']").val(),
	    	nPdeId : $("input[name='txt_hdn_nPdeId']").val()
	    },
	    success:function(data){
	    	$("#c_qry_serviciostipo").html(data);
	    },
	    error:function(er){
	    	console.log(er.statusText);
	        alert("Houston, tenemos un problema... Creo que has roto algo...");
	    }
	});
	
	
	// get_page('../agua/contribuyente/listarServiciosxDireccion','c_qry_serviciostipo',{ 'nPdeId':nPdeId, 'nPerId':nPerId });
}

function eliminarServicioTipo(id){
	console.log(id);
	// var nSecId   = $(fila).find("td:eq(0)").text().trim();
	$.ajax({
	    url:'contribuyente/eliminaServicioPredio',
	    type:'post',
	    cache:false,
	    data:{
	    	nSecId : id
	    },
	    success:function(data){
	    	mensaje("Se elimino correctamente el servicio","e");
	    	listarModulo();
	    },
	    error:function(er){
	    	console.log(er.statusText);
	        alert("Houston, tenemos un problema... Creo que has roto algo...");
	    }
	});
	
	
}