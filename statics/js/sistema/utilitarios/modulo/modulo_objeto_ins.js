$(function(){
	listarOpcionesxAplicacion();
	$("#btnBuscarController").bind({
	    click:function(evt){
	        evt.preventDefault();
	        set_popup('../utilitarios/modulo/qryControladores/','Controladores',350,400,'','');
	    }
	});

	$(document).on('click', '.anc_controlador', function(evt){
		evt.preventDefault();
		var ruta  = $(this).data('path');
		console.log(ruta);
		$("#txt_ins_ruta").val(ruta);
		$('.popedit').dialog('close');
	})
/*

*/
	$("#frm_ins_mod_objeto").validate({
	    submitHandler: function(form) { 
	        msgLoadSaveMsg('#pnl_mensaje_objeto','#btnInsObjeto');
	        $.ajax({
	            url:'modulo/#',
	            cache:false,
	            type:'post',
	            data:{
	            	txt_ins_obj_nombre  : $('#txt_ins_obj_nombre').val(),
	            	txt_ins_ruta        : $('#txt_ins_ruta').val(),
	            	txt_ins_apli_codigo : $('#txt_ins_apli_codigo').val(),
	            	txt_ins_obj_file    : $('#txt_ins_obj_file').val()
	            },
	            success:function(data){
	                switch (data) { 
	                    case "2":
	                    	mensaje("Error al guardar el Modulo!","a"); 
	                    break;
	                    default:
	                    	msgLoadSaveRemove("#btnInsObjeto");
	                    	mensaje("Se Registro Correctamente el Modulo","e");
	                    	limpiarForm('#frm_ins_mod_objeto');
	                    break;
	                }
	            },
	            error:function(error){
	            }
	        }) 
	    },            
	    rules: {
	        txt_ins_obj_file: {
	            required: true
	        },
	        txt_ins_obj_nombre: {
	            required: true
	        }
	    },
	    messages: {
	        txt_ins_obj_file: {
	            // required: true
	        },
	        txt_ins_obj_nombre: {
	            // required: true
	        }
	    }
	});

});

function saluda(fila){
	alert("HOla");
}
function listarOpcionesxAplicacion(){
	msgLoading('#c_frm_mod_aplicaciones',"Espere por favor!!!");
	$.ajax({
	    url:'modulo/loadDataGrid',
	    type:'post',
	    cache:false,
	    data:{
	    	x:'objetos',
	    	cod:$("#txt_ins_apli_codigo").val()
	    },
	    success:function(data){
	    	$("#c_frm_mod_aplicaciones").html(data);
	    },
	    error:function(er){
	    	console.log(er.statusText);
	        alert("Houston, tenemos un problema... Creo que has roto algo...");
	    }
	});
	
	
}