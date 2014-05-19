$(function(){      
    
    cboTipoServicioUpd();

    $("#frm_upd_servicio").validate({
        rules: {
            txt_upd_serv_nom: {
                required: true ,
                // lettersonly: true,
                maxlength:80
            }
        },
        messages: {
            txt_upd_serv_nom:{
                required:"Ingrese el Nombre"
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
                        mensaje("Error al Actualizar el Servicio!","a");   
                        HabilitarBoton('btn_upd_serv_registrar');                      
                        break;
                        default:                        
                        mensaje("Se Actualizó Correctamente el Servicio","e");
                        HabilitarBoton('btn_upd_serv_registrar');
                        listarServicios();
                        // limpiarForm('#frm_ins_trabajador');
                    }

                },
                error: function(msg){                
                    mensaje("Error Inesperando Actualizando el Servicio!, vuelva a intentarlo","r");   
                    HabilitarBoton('btn_upd_serv_registrar');                     ;
                }
            });
        }
    });  

    $("#frm_upd_tiposervicio").validate({
        rules: {
            txt_upd_tserv_nom: {
                required: true ,
                maxlength:80
            }
        },
        messages: {
            txt_upd_tserv_nom:{
                required:"Ingrese el Nombre"
            }
        },
        submitHandler: function(form){ 
            DesabilitarBoton('btn_upd_tserv_registrar')
            $.ajax({
                type: "POST",
                url:  "servicios/updTipoServicio",
                data: $(form).serialize(),
                success: function(data){  
                    switch (data) { 
                        case "0":
                        mensaje("Error al Actualizar el Tipo de Servicio!","a");   
                        HabilitarBoton('btn_upd_tserv_registrar');                      
                        break;
                        default:                        
                        mensaje("Se Actualizó Correctamente el Tipo de Servicio","e");
                        HabilitarBoton('btn_upd_tserv_registrar');
                        listarTipoServicios();
                        // limpiarForm('#frm_ins_trabajador');
                    }

                },
                error: function(msg){                
                    mensaje("Error Inesperando Actualizando el Tipo de Servicio!, vuelva a intentarlo","r");   
                    HabilitarBoton('btn_upd_tserv_registrar');                     ;
                }
            });
        }
    });   

    $("#frm_upd_servicioportipo").validate({
        rules: {
            txt_upd_servpt_costo: {
                required: true ,
                // lettersonly: true,
                maxlength:80
            }

        },
        messages: {
            txt_upd_servpt_costo:{
                required:"Ingrese el costo"
            }
        },
        submitHandler: function(form){ 
            DesabilitarBoton('btn_upd_servpt_registrar')
            $.ajax({
                type: "POST",
                url:  "servicios/updServicioporTipo",
                data: $(form).serialize(),
                success: function(data){  
                    switch (data) { 
                        case "0":
                        mensaje("Error al Actualizar el Tipo de Servicio!","a");   
                        HabilitarBoton('btn_upd_servpt_registrar');                      
                        break;
                        case "2":
                        mensaje("Error al Actualizar el Costo!","a");   
                        HabilitarBoton('btn_upd_servpt_registrar');                      
                        break;
                        default:                        
                        mensaje("Se Actualizó Correctamente el Servicio por Tipo","e");
                        HabilitarBoton('btn_upd_servpt_registrar');
                        get_page('servicios/listarServiciosporTipo','tabla_servicios_por_tipo');
                        // limpiarForm('#frm_ins_trabajador');
                    }

                },
                error: function(msg){                
                    mensaje("Error Inesperando Actualizando el Servicio por Tipo!, vuelva a intentarlo","r");   
                    HabilitarBoton('btn_upd_servpt_registrar');
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
            txt_upd_servpt_nMulId:$("#txt_upd_servpt_nMulId").val()
        },        
        success: function(data) {                
            $("#c_cbo_upd_tipo_serv").html(data); 
            $(".chosen-select").chosen();
        },
        error: function() { 
            alert("error")
            // msgError("#c_cbo_upd_doc_tipo");   
        }              
    });        
}

    
