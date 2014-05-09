$(function(){
        $("#frm_upd_sector").validate({
        rules: {
            txt_upd_sec_nom: {
                // required: true ,
                // lettersonly: true,
                maxlength:80
            }            
        },
        messages: {
            txt_upd_sec_nom:{
                required:"Ingrese el nombre"
            }
        },
        submitHandler: function(form){ 
            DesabilitarBoton('btn_upd_sec_registrar')
            $.ajax({
                type: "POST",
                url:  "sectoresyvias/updSector",
                data: $(form).serialize(),
                success: function(data){                    
                    switch (data) { 
                        case "1":
                        mensaje("Se Actualizó Correctamente el Sector!","e"); 
                        HabilitarBoton('btn_upd_sec_registrar');
                        listarSectores();
                        break; 
                        case "0":
                        mensaje("Error al Actualizar el Sector!","r"); 
                        HabilitarBoton('btn_upd_sec_registrar');                        
                        break;
                        // default:                        
                        // mensaje("Se Actualizo Correctamente el Contribuyente","e");
                        // HabilitarBoton('btn_upd_sec_registrar');
                        // // limpiarForm('#frm_upd_trabajador');
                    }

                },
                error: function(msg){                
                    mensaje("Error Inesperando actualizando el Sector!, vuelva a intentarlo","r"); 
                    HabilitarBoton('btn_upd_sec_registrar');                       ;
                }
            });
        }
    });

    $("#frm_upd_via").validate({
        rules: {
            txt_upd_via_nom: {
                // required: true ,
                // lettersonly: true,
                maxlength:80
            }            
        },
        messages: {
            txt_upd_via_nom:{
                required:"Ingrese el nombre"
            }
        },
        submitHandler: function(form){ 
            DesabilitarBoton('btn_upd_via_registrar')
            $.ajax({
                type: "POST",
                url:  "sectoresyvias/updVia",
                data: $(form).serialize(),
                success: function(data){                    
                    switch (data) { 
                        case "1":
                        mensaje("Se Actualizó Correctamente la Vía!","e"); 
                        HabilitarBoton('btn_upd_via_registrar');
                        listarVias();
                        break; 
                        case "0":
                        mensaje("Error al Actualizar la Vía!","r"); 
                        HabilitarBoton('btn_upd_via_registrar');                        
                        break;
                        // default:                        
                        // mensaje("Se Actualizo Correctamente el Contribuyente","e");
                        // HabilitarBoton('btn_upd_via_registrar');
                        // // limpiarForm('#frm_upd_trabajador');
                    }

                },
                error: function(msg){                
                    mensaje("Error Inesperando actualizando la Vía!, vuelva a intentarlo","r"); 
                    HabilitarBoton('btn_upd_via_registrar');                       ;
                }
            });
        }
    });   
});

// CARGA TIPO DE DOCUMENTO DESDE BD -> OPCION EDITAR DOCUMENTO
function cboEstadoCivilUpd(){      
    // msgLoading("#c_cbo_upd_doc_tipo");
    $.ajax({
        type: "POST",
        url: "contribuyente/cboEstadoCivilUpd",
        cache: false,
        data: { 
            txt_upd_estcivil:$("#txt_upd_estcivil").val()
        },        
        success: function(data) {                
            $("#c_cbo_upd_cont_estcivil").html(data); 
        },
        error: function() { 
            alert("error")
            // msgError("#c_cbo_upd_doc_tipo");   
        }              
    });        
}
    
