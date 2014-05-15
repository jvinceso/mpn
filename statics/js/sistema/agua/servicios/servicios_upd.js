$(function(){      
    
    cboTipoServicioUpd();

    $("#frm_upd_servicio").validate({
        rules: {
            txt_upd_serv_nom: {
                required: true ,
                // lettersonly: true,
                maxlength:80
            },
            txt_upd_serv_costo: {
                required: true ,
                // lettersonly: true,
                maxlength:80
            }

        },
        messages: {
            txt_upd_serv_nom:{
                required:"Ingrese el Nombre"
            }, 
            txt_upd_serv_costo:{
                required:"Ingrese el costo"
            }
        },
        submitHandler: function(form){ 
            DesabilitarBoton('btn_upd_serv_registrar')
            $.ajax({
                type: "POST",
                url:  "servicios/updServicio",
                data: $(form).serialize(),
                success: function(data){  
                    switch (data) { 
                        case "0":
                        mensaje("Error al guardar Actualizar la Calle!","a");   
                        HabilitarBoton('btn_upd_serv_registrar');                      
                        break;
                        default:                        
                        mensaje("Se Actualizó Correctamente la Calle","e");
                        HabilitarBoton('btn_upd_serv_registrar');
                        listarCalles();
                        // limpiarForm('#frm_ins_trabajador');
                    }

                },
                error: function(msg){                
                    mensaje("Error Inesperando Actualizando la Calle!, vuelva a intentarlo","r");   
                    HabilitarBoton('btn_upd_serv_registrar');                     ;
                }
            });
        }
    });   
});

// CARGA TIPO DE DOCUMENTO DESDE BD -> OPCION EDITAR DOCUMENTO
function cboTipoServicioUpd(){      
    // msgLoading("#c_cbo_upd_doc_tipo");
    $.ajax({
        type: "POST",
        url: "servicios/cboTipoServicioUpd",
        cache: false,
        data: { 
            txt_upd_servtipo_nMulId:$("#txt_upd_servtipo_nMulId").val()
        },        
        success: function(data) {                
            $("#c_cbo_upd_serv_tipo").html(data); 
            $(".chosen-select").chosen();
        },
        error: function() { 
            alert("error")
            // msgError("#c_cbo_upd_doc_tipo");   
        }              
    });        
}

    
