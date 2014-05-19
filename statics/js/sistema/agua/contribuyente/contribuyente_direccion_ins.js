$(function(){
	$(".chosen-select").chosen();
	$("#frm_reg_direccion_par").validate({
	    submitHandler: function(form) {
	        DesabilitarBoton('btn_asignar_direccion');
	        var direccion = $("#txt_valor_direccion").val();
	        $.ajax({
	            url:'contribuyente/insdireccion',
	            cache:false,
	            type:'post',
	            data:{
	            	cbo_calle:$("#cbo_calle option:selected").val(),
	            	direc: direccion,
	            	txt_hdn_nPerid:$("input[name='txt_hdn_nPerid']").val(),
	            	txt_hdn_nMulId:$("input[name='txt_hdn_nMulId']").val(),
	            	txt_direccion:$("#txt_valor_direccion").val()
	            },
	            success:function(data){
	                switch (data) { 
	                    case "e":
	                    mensaje("Error al guardar la Dirección!","a"); 
	                    break; 
	                    default:
	                    msgLoadSaveRemove("#btnRegistrar");
	                    mensaje("Se Registro Correctamente la Dirección","e");
	                    limpiarForm('#frm_ins_modulo');
	                    listaDireccion();
	                    break;
	                }
	        		HabilitarBoton('btn_asignar_direccion');
	            },
	            error:function(error){
	                alert("Houston, tenemos un problema... Creo que has roto algo...");
	            }
	        }) 
	    },            
	    rules: {
	        txt_requeridos: { required: true }
	    },
	    messages: {
	        txt_requeridos:{}
	    }
	});
	$("#cbo_sector").bind({
	    change:function(evt){
	        evt.preventDefault();
	    	cargar_cboCalles();
	    }
	});
	cargar_cboCalles();
});

function listaDireccion(){
	var nPerId = $("input[name='txt_hdn_nPerid']").val();
	var nMulId = $("input[name='txt_hdn_nMulId']").val()
	get_page('contribuyente/listarDirecciones','c_qry_direccion_contribuyente',{'nPerId':nPerId,'nMulId':nMulId});
}

function cargar_cboCalles(){
	msgLoading('#c_cbo_calles',"Buscando calles...");
	var nSector = $("#cbo_sector option:selected").val();
	$.ajax({
	    url:'contribuyente/get_calles/',
	    type:'post',
	    cache:false,
	    data:{"nSector":nSector},
	    success:function(data){
	    	if (data!="0") {
	    		$("#c_cbo_calles").html(data);
				$(".chosen-select").chosen();	            		
	    	}else{
	    		mensaje("No hemos encontrado calles que coincidan con el sector seleccionado, por favor vuelva a intentarlo... :(","a"); 
	    	}
	    },
	    error:function(er){
	    	console.log(er.statusText);
	        alert("Houston, tenemos un problema... Creo que has roto algo...");
	    }
	});
}
function asignarTipo(fila){
	console.log("servicio_direccion");
	console.log(fila);
	var nPdeId = $(fila).data('codx');
	var nPerId = $("input[name='txt_hdn_nPerid']").val();
	set_popup('../agua/contribuyente/qryServicios/','Servicios',650,450,{'codx':nPdeId,'PerId':nPerId},'');
}