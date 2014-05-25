$(function(){
	// console.log(obtenerCamposArray("txt_rec_servicios"))
	$("#frm_rec_recibo").validate({
        submitHandler: function(form){ 
        	DesabilitarBoton('btn_rec_recibo_actualizar')
        	$.ajax({
        		type: "POST",
        		url:  "recibo_detalle/recalcularRecibo",
        		data :  {
        			atributos: obtenerCamposArray("txt_rec_servicios")
        		},
        		success: function(data){  
        			switch (data) { 
        				case "0":
        				mensaje("Error al Recalcular el Recibo!","a");   
        				HabilitarBoton('btn_rec_recibo_actualizar');                      
        				break;
        				default:                        
        				mensaje("Se Recalculo Correctamente el Recibo","e");
        				HabilitarBoton('btn_rec_recibo_actualizar');
        				actualizarGrilla();
                        // limpiarForm('#frm_ins_trabajador');
                    }

                },
                error: function(msg){                
                	mensaje("Error Inesperando Recalculando el Recibo!, vuelva a intentarlo","r");   
                	HabilitarBoton('btn_rec_recibo_actualizar');                     ;
                }
            });
        }
    });  
})
