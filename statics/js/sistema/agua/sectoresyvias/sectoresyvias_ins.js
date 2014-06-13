$(function(){

    $("#frm_ins_sector").validate({
        rules: {           
            txt_ins_sec_nom: {
                required: true
            }
        },
        messages: {
            txt_ins_sec_nom:{
                required:"Ingrese el nombre"
            }
        },
        submitHandler: function(form){ 
            DesabilitarBoton('btn_ins_sec_registrar')
            $.ajax({
                type: "POST",
                url:  "sectoresyvias/insSector",
                data: $(form).serialize(),
                success: function(data){                    
                    switch (data) { 
                        case "0":
                        mensaje("Error al guardar el Sector!","a"); 
                        HabilitarBoton('btn_ins_sec_registrar');                        
                        break;
                        default:                        
                        mensaje("Se Registro Correctamente el Sector","e");
                        HabilitarBoton('btn_ins_sec_registrar');
                        // limpiarForm('#frm_ins_trabajador');
                    }

                },
                error: function(msg){                
                    mensaje("r","Error Inesperando registrando el Sector!, vuelva a intentarlo"); 
                    HabilitarBoton('btn_ins_sec_registrar');                       ;
                }
            });
        }
    });

    
    $("#frm_ins_via").validate({
        rules: {           
            txt_ins_via_nom: {
                required: true
            }
        },
        messages: {
            txt_ins_via_nom:{
                required:"Ingrese el nombre"
            }
        },
        submitHandler: function(form){ 
            DesabilitarBoton('btn_ins_via_registrar')
            $.ajax({
                type: "POST",
                url:  "sectoresyvias/insVia",
                data: $(form).serialize(),
                success: function(data){                    
                    switch (data) { 
                        case "0":
                        mensaje("Error al guardar la Vía!","a"); 
                        HabilitarBoton('btn_ins_via_registrar');                        
                        break;
                        default:                        
                        mensaje("Se Registro Correctamente la Vía","e");
                        HabilitarBoton('btn_ins_via_registrar');
                        // limpiarForm('#frm_ins_trabajador');
                    }

                },
                error: function(msg){                
                    mensaje("r","Error Inesperando registrando la Vía!, vuelva a intentarlo"); 
                    HabilitarBoton('btn_ins_via_registrar');                       ;
                }
            });
        }
    });
    
})