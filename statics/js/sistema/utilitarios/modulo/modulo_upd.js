$(function(){
	$("#frm_upd_modulo").validate({
	    submitHandler: function(form) { 
	        $.ajax({
	            url:'modulo/updAplicacion',
	            cache:false,
	            type:'post',
	            data:$(form).serialize(),
	            success:function(data){
	                if (data=="1"){
	                	mensaje("Actualizo Correctamente","e");
	                }else{
	                    mensaje("Error al guardar la Sesión de Consejo!","a"); 	                	
	                }
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
	            // required:'Ingrese una pinga'
	        },
	        txt_upd_mod_icono:{
	            // required:'Ingrese una pinga'
	        }
	    }
	});
});
