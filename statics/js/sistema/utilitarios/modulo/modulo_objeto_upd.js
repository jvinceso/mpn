$(function(){
	$("#frm_upd_modulo").validate({
	    submitHandler: function(form) { 
	    	DesabilitarBoton('btnUpdObjeto');
	        $.ajax({
	            url:'modulo/updObjeto',
	            cache:false,
	            type:'post',
	            data:$(form).serialize(),
	            success:function(data){
	                if (data=="1"){
	                	mensaje("Actualizo Correctamente","e");
	                }else{
	                    mensaje("Ocurrio un Error al actualizar la opcion seleccionada!","a");
	                }
	                HabilitarBoton('btnUpdObjeto');
	            },
	            error:function(error){
	            }
	        }) 
	    },            
	    rules: {
	        txt_upd_mod_nombre: {
	            required: true
	        },
	        txt_upd_mod_icono: {
	            required: true
	        }
	    },
	    messages: {
	        txt_upd_mod_nombre:{
	        },
	        txt_upd_mod_icono:{
	        }
	    }
	});
});