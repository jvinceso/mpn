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
		$("#txt_ins_obj_file").val(ruta);
		$('.popedit').dialog('close');
	})
/*

*/
	$("#frm_ins_mod_objeto").validate({
	    submitHandler: function(form) { 
	        msgLoadSaveMsg('#pnl_mensaje_objeto','#btnInsObjeto');
	        $.ajax({
	            url:'modulo/insObjeto',
	            cache:false,
	            type:'post',
	            data:{
	            	txt_ins_obj_nombre  : $('#txt_ins_obj_nombre').val(),
	            	txt_ins_apli_codigo : $('#txt_ins_apli_codigo').val(),
	            	txt_ins_obj_file    : $('#txt_ins_obj_file').val()
	            },
	            success:function(data){
	                switch (data) { 
	                    case "errObt":
	                    	mensaje("Error al guardar el Objeto!","a"); 
	                    break;
	                    case "err002":
	                    	mensaje("Error al guardar el Objeto Detalle!","a"); 
	                    break;
	                    case "succes_all":
	                    // default:
	                    	msgLoadSaveRemove("#btnInsObjeto");
	                    	mensaje("Se Registro Correctamente la opcion","e");
	                    	listarOpcionesxAplicacion();
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

function editarObjeto(fila){
	var nObjId = $(fila).find("td:eq(0)").text().trim();
	set_popup("../utilitarios/modulo/vistaGet/upd_obj_view/"+nObjId,'Actualizar Opcion',450,250,'','listarOpcionesxAplicacion()');
	// alert("HOla");
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