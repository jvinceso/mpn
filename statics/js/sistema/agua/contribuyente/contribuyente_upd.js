$(function(){      
    
    cboEstadoCivilUpd();    
   
    $("#frm_upd_contribuyente").validate({         
        submitHandler: function(form){
            DesabilitarBoton('btn_upd_cont_registrar')            
            $.ajax({
                type: "POST",
                url:  "contribuyente/updContribuyente",
                data: $(form).serialize(),
                success: function(data){                    
                    switch (data) { 
                        case "2":
                        mensaje("Error al actualizar el Contribuyente!","a"); 
                        HabilitarBoton('btn_upd_cont_registrar');
                        break; 
                        case "0":
                        mensaje("Error al actualizar el Contribuyente!","a"); 
                        HabilitarBoton('btn_upd_cont_registrar');                        
                        break;
                        default:                        
                        mensaje("Se actualizó Correctamente el Contribuyente","e");
                        HabilitarBoton('btn_upd_cont_registrar');
                        // limpiarForm('#frm_ins_trabajador');
                    }

                },
                error: function(msg){                
                    mensaje("r","Error Inesperando actualizando al Contribuyente!, vuelva a intentarlo"); 
                    HabilitarBoton('btn_upd_cont_registrar');                       ;
                }
            });
        },
        rules: {            
            txt_upd_doc_numero:{
                required:true
            },
            txt_upd_doc_titulo:{
                required:true  
            }, 
            txt_upd_doc_sumilla:{
                required:true               
            },  
            txt_upd_doc_fecha:{
                required:true  
            }, 
            cbo_upd_doc_tipo:{
                required:true               
            } 
        }        
    });    
});

// CARGA TIPO DE DOCUMENTO DESDE BD -> OPCION EDITAR DOCUMENTO
function cboEstadoCivilUpd (){      
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
    
