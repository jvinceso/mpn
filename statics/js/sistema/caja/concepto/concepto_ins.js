$(function(){
    cboTipoPago();
    $("#frm_ins_tipopago").validate({
        rules: {           
            txt_ins_tpago_nom: {
                required: true
            }
        },
        messages: {
            txt_ins_tpago_nom:{
                required:"Ingrese el nombre"
            }
        },
        submitHandler: function(form){ 
            DesabilitarBoton('btn_ins_tpago_registrar')
            $.ajax({
                type: "POST",
                url:  "concepto/insTipoPago",
                data: $(form).serialize(),
                success: function(data){ 
                // alert(data)                   
                    switch (data) { 
                        case "0":
                        mensaje("Error al guardar el Tipo de Pago!","a"); 
                        HabilitarBoton('btn_ins_tpago_registrar');                        
                        break;
                        default:                        
                        mensaje("Se Registro Correctamente el Tipo de Pago","e");
                        HabilitarBoton('btn_ins_tpago_registrar');
                        // limpiarForm('#frm_ins_trabajador');
                    }


                },
                error: function(msg){                
                    mensaje("r","Error Inesperando registrando el Tipo de Pago!, vuelva a intentarlo"); 
                    HabilitarBoton('btn_ins_tpago_registrar');                       ;
                }
            });
        }
    });

    $("#frm_ins_concepto").validate({
        rules: {           
            txt_ins_con_desc: {
                required: true
            },
            txt_ins_con_costo:{
                required: true
            },
            cbo_ins_con_tipopago:{
                required: true
            }
        },
        messages: {
            txt_ins_con_desc:{
                required:"Ingrese euna descripción"
            },
            txt_ins_con_costo:{
                required: "Ingrese un monto"
            },
            cbo_ins_con_tipopago:{
                required: "Seleccione un tipo de pago"
            }
        },
        submitHandler: function(form){ 
            DesabilitarBoton('btn_ins_concepto_registrar')
             // var np = $('tr', $("#tbpermisos")).length};
            $.ajax({
                type: "POST",
                url:  "concepto/insConcepto",
                data: $(form).serialize(),
                success: function(data){ 
                // alert(data)                   
                    switch (data) { 
                        case "0":
                        mensaje("Error al guardar el Concepto de Pago!","a"); 
                        HabilitarBoton('btn_ins_concepto_registrar');                        
                        break;
                        default:                        
                        mensaje("Se Registro Correctamente el Concepto de Pago","e");
                        HabilitarBoton('btn_ins_concepto_registrar');
                        // limpiarForm('#frm_ins_trabajador');
                    }


                },
                error: function(msg){                
                    mensaje("r","Error Inesperando registrando el Concepto de Pago!, vuelva a intentarlo"); 
                    HabilitarBoton('btn_ins_concepto_registrar');                       ;
                }
            });
        }
    }); 
    
})

function cboTipoPago(){  
    // msgLoading("#c_cbo_ins_not_cat");    
    $.ajax({
        type: "POST",
        url: "concepto/cboTipoPago",
        cache: false,
        success: function(data) { 
            $("#c_cbo_ins_con_tipopago").html(data);     
            $(".chosen-select").chosen();
        },
        error: function() { 
            alert("error")
            // msgError("#c_cbo_ins_trab_estcivil");   
        }              
    });        
}