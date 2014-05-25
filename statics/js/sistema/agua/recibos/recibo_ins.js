$(function(){
	$("#hid_fnd_ins_id_Contribuyente").val("");
	$(".chosen-select").chosen();

	$('#txt_ins_contribuyente_nombre').keyup(function(){
		// $("#hid_fnd_ins_id_Contribuyente").val("");
	    creaAutocomplete({
	        id:"hid_fnd_ins_id_Contribuyente",
	        value:"txt_ins_contribuyente_nombre",
	        url:'contribuyente/nomContribuyenteAuto',
	        funcion:""
	    });
	});
	$("#btn_process_contribuyente").bind({
	    click:function(evt){
	        evt.preventDefault();
	        var idx = $("#hid_fnd_ins_id_Contribuyente").val();
	        if( idx !== "" ){
	        	procesarRecibosParciales();
	        }else{
	        	mensaje("Por favor Seleccione un Contribuyente!!!","r"); 
	        }
	    }
	});
	$("#btn_print_recibo").bind({
	    click:function(evt){
	        evt.preventDefault();
	        impresionMasiva();
	    }
	});

	$("#btnProcesar").bind({
	    click:function(evt){
	        DesabilitarBoton('btn_ins_sec_registrar');
	        $.ajax({
	            url:'recibo/procesar_recibos',
	            cache:false,
	            type:'post',
	            // data:$(form).serialize(),
	            success:function(data){
	                switch (data) { 
	                    case "4":
	                    	mensaje("Seleccione un año!!!","a");
	                    break; 
	                    case "3":
	                    	var year = new Date().getFullYear()
	                    	mensaje("Ya se han Procesados los Arbitrios para el año "+year+" !!!","a");
	                    break; 
	                    case "2":
	                    	mensaje("Error al Procesar los recibos!!!","a"); 
	                    break;  
	                    case "1":
	                    	mensaje("Se Procesaron los recibos Correctamente","e");
	                    	limpiarForm('#frm_proc_anios');
	                    break
	                    default:
	                    	mensaje("Error no identificado contactese con sistemas!!!","r"); 
	                    break; 
	                }
	                HabilitarBoton('btn_ins_sec_registrar');
	            },
	            error:function(error){
	            }
	        });
	    }
	});
});

function procesarRecibosParciales(){
	// alert("go process");
	$.ajax({
	    url:'recibo/procesar_recibos/parcial',
	    cache:false,
	    type:'post',
	    data:{
	    	anio: $("#cbo_in_contribuyente_anio option:selected").val(),
	    	idx : $("#hid_fnd_ins_id_Contribuyente").val(),
	    	mes : $("#cbo_in_contribuyente_mes option:selected").val()
	    },
	    success:function(data){
	        switch (data) { 
	            case "4":
	            	mensaje("Seleccione un año!!!","a");
	            break; 
	            case "3":
	            	var year = $("#cbo_in_contribuyente_anio option:selected").val()
	            	mensaje("Ya se han Procesados los Arbitrios para el año "+year+" !!!","a");
	            break; 
	            case "2":
	            	mensaje("Error al Procesar los recibos!!!","a"); 
	            break;  
	            case "1":
	            	mensaje("Se Procesaron los recibos Correctamente","e");
	            	limpiarForm('#frm_proc_anios');
	            break
	            default:
	            	mensaje("Error no identificado contactese con sistemas!!!","r"); 
	            break; 
	        }
	        HabilitarBoton('btn_ins_sec_registrar');
	    },
	    error:function(error){
	    }
	});
	
	
}
function impresionMasiva(){
	set_popup('recibo/impresion_masiva','Impresion Masiva',920,400,{
		mes  : $("#cbo_imprimir_recibo_mes option:selected").val(),
		anio : $("#cbo_imprimir_recibo_anio option:selected").val(),
		mensaje : $("textarea[name=txt_imprimir_recibo_mensaje]").val()
	});
}