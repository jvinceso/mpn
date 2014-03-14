$(function(){    

	$('.date-picker').datepicker({autoclose:true}).next().on(ace.click_event, function(){
		$(this).prev().focus();
	});

	
	$("#frm_ins_modulo").validate({
		submitHandler: function(form) { 
			$.ajax({
				url:'modulo/insAplicacion',
				cache:false,
				type:'post',
				data:$(form).serialize(),
				success:function(data){
					alert(data)
                    // switch (data) { 
                    //     case "2":
                    //     mensaje("Error al guardar la Sesión de Consejo!","a"); 
                    //     break; 
                    //     default:
                    //     msgLoadSaveRemove("#btn_ins_cons");
                    //     mensaje("Se guardo correctamente la Sesión de Consejo","e");
                    //     get_page('crearSesionConsejo/vistaGet/insertar','c_tab_ins_sesionconsejo',{
                    //         'txt_fnd_cons_titulo':$('#txt_fnd_cons_titulo').val()
                    //     });
                    // }
                },
                error:function(error){
                }
            }) 
		},            
		rules: {
			txt_ins_mod_nombre: {
				required: true
			}
		},
		messages: {
			txt_ins_mod_nombre:{
                // required:'Ingrese una pinga'
            }
        }
    });
})
