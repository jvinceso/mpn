$(function(){      
    cboTipoPagoUpd()
   	$("#frm_upd_tipopago").validate({
   		rules: {
   			txt_upd_tpago_nom: {
   				required: true ,
                maxlength:80
            }
        },
        messages: {
        	txt_upd_tpago_nom:{
        		required:"Ingrese el Nombre"
        	}
        },
        submitHandler: function(form){ 
        	DesabilitarBoton('btn_upd_tpago_actualizar')
        	$.ajax({
        		type: "POST",
        		url:  "concepto/updTipoPago",
        		data: $(form).serialize(),
        		success: function(data){  
        			switch (data) { 
        				case "0":
        				mensaje("Error al Actualizar el Tipo de Pago!","a");   
        				HabilitarBoton('btn_upd_tpago_actualizar');                      
        				break;
        				default:                        
        				mensaje("Se Actualizó Correctamente el Tipo de Pago","e");
        				HabilitarBoton('btn_upd_tpago_actualizar');
        				listarTipoPago();
                        // limpiarForm('#frm_ins_trabajador');
                    }

                },
                error: function(msg){                
                	mensaje("Error Inesperando Actualizando el Tipo de Pago!, vuelva a intentarlo","r");   
                	HabilitarBoton('btn_upd_tpago_actualizar');                     ;
                }
            });
        }
    }); 


    $("#frm_upd_concepto").validate({
        rules: {
            txt_upd_tpago_nom: {
                required: true ,
                maxlength:80
            }
        },
        messages: {
            txt_upd_tpago_nom:{
                required:"Ingrese el Nombre"
            }
        },
        submitHandler: function(form){ 
            DesabilitarBoton('btn_upd_concepto_actualizar')
            $.ajax({
                type: "POST",
                url:  "concepto/updConcepto",
                data: $(form).serialize(),
                success: function(data){  
                    switch (data) { 
                        case "0":
                        mensaje("Error al Actualizar el Concepto!","a");   
                        HabilitarBoton('btn_upd_concepto_actualizar');                      
                        break;
                        default:                        
                        mensaje("Se Actualizó Correctamente el Concepto","e");
                        HabilitarBoton('btn_upd_concepto_actualizar');
                        listarConcepto();
                        // limpiarForm('#frm_ins_trabajador');
                    }

                },
                error: function(msg){                
                    mensaje("Error Inesperando Actualizando el Concepto!, vuelva a intentarlo","r");   
                    HabilitarBoton('btn_upd_concepto_actualizar');                     ;
                }
            });
        }
    }); 


})
function cboTipoPagoUpd(){      
    // msgLoading("#c_cbo_upd_doc_tipo");
    $.ajax({
        type: "POST",
        url: "concepto/cboTipoPagoUpd",
        cache: false,
        data: { 
            txt_upd_con_nMulId:$("#txt_upd_con_nMulId").val()
        },        
        success: function(data) {                
            $("#c_cbo_upd_con_tipopago").html(data); 
            $(".chosen-select").chosen();
        },
        error: function() { 
            alert("error")
            // msgError("#c_cbo_upd_doc_tipo");   
        }              
    });        
}