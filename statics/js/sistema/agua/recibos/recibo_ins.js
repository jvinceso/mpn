$(function(){
	$(".chosen-select").chosen();

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
