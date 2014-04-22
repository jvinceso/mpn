$(function(){      
    
    cboEstadoCivilUpd();
    
    // ACTUALIZAR PUBLICIDAD
    $("#frm_upd_documento").validate({         
        submitHandler: function(form){
            msgLoadSave("#c_btn_upd_documento_load","#btn_upd_documento");            
            $.ajax({
                type: "POST",
                url: "crearDocumento/crearDocumentoUpd",
                data: $(form).serialize(),
                success: function(data){ 
                    //console.log(data);
                    switch (data) {
                        case "0":
                            msgLoadSaveRemove("#btn_upd_documento");
                            mensaje("Estos adtos ya fueron ingresados.","r");
                            $(".popedit").dialog("close");
                            break; 
                        default:
                            msgLoadSaveRemove("#btn_upd_documento");                                                        
                            limpiarForm("#frm_upd_documento");        
                            //                            $("#txt_upd_pub_descripcion").val("").blur();  preguntar!!!                                                       
                            mensaje("Operacion realizada con exito.","e"); 
                            listarDocumentos();
                            $(".popedit").dialog("close");                             
                            break;                            
                    }      
                },
                error: function(){                
                    mensaje("Ha ocurrido un error, vuelva a intentarlo.","r");                        
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
    
