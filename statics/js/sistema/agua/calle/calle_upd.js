$(function(){      
    
    cboSectorUpd();    
    cboViaUpd();   

    $("#frm_upd_calle").validate({
        rules: {
            txt_upd_cal_nom: {
                required: true ,
                // lettersonly: true,
                maxlength:80
            }
        },
        messages: {
            txt_upd_cal_nom:{
                required:"Ingrese el Nombre de la calle"
            }
        },
        submitHandler: function(form){ 
            DesabilitarBoton('btn_upd_cal_registrar')
            $.ajax({
                type: "POST",
                url:  "calle/updCalle",
                data: $(form).serialize(),
                success: function(data){  
                    switch (data) { 
                        case "0":
                        mensaje("Error al guardar Actualizar la Calle!","a");   
                        HabilitarBoton('btn_upd_cal_registrar');                      
                        break;
                        default:                        
                        mensaje("Se Actualizó Correctamente la Calle","e");
                        HabilitarBoton('btn_upd_cal_registrar');
                        listarCalles();
                        // limpiarForm('#frm_ins_trabajador');
                    }

                },
                error: function(msg){                
                    mensaje("Error Inesperando Actualizando la Calle!, vuelva a intentarlo","r");   
                    HabilitarBoton('btn_upd_cal_registrar');                     ;
                }
            });
        }
    });   
});

// CARGA TIPO DE DOCUMENTO DESDE BD -> OPCION EDITAR DOCUMENTO
function cboSectorUpd(){      
    // msgLoading("#c_cbo_upd_doc_tipo");
    $.ajax({
        type: "POST",
        url: "calle/cboSectorUpd",
        cache: false,
        data: { 
            txt_upd_cal_nSecId:$("#txt_upd_cal_nSecId").val()
        },        
        success: function(data) {                
            $("#c_cbo_upd_cal_sector").html(data); 
            $(".chosen-select").chosen();
        },
        error: function() { 
            alert("error")
            // msgError("#c_cbo_upd_doc_tipo");   
        }              
    });        
}

function cboViaUpd(){      
    // msgLoading("#c_cbo_upd_doc_tipo");
    $.ajax({
        type: "POST",
        url: "calle/cboViaUpd",
        cache: false,
        data: { 
            txt_upd_cal_nViaId:$("#txt_upd_cal_nViaId").val()
        },        
        success: function(data) {                
            $("#c_cbo_upd_cal_via").html(data); 
            $(".chosen-select").chosen();
        },
        error: function() { 
            alert("error")
            // msgError("#c_cbo_upd_doc_tipo");   
        }              
    });        
}
    
