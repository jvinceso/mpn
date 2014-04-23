$(function(){      
    
    cboEstadoCivilUpd();    
    $('.input-mask-phone').mask('(999) 999-999');
    $('.date-picker').datepicker({
        autoclose:true
    });
        $("#frm_upd_contribuyente").validate({
        rules: {
            txt_upd_cont_dni: {
                // required: true ,
                maxlength:8,
                minlength:8,
                digits:true
                // ,remote: {
                //     url: "txtUsuarioGet",
                //     type: "post",
                //     data: {
                //         accion: "Dni",
                //         dni: function() {
                //             return $("#txt_upd_trab_dni").val();
                //         },
                //         cbo_upd_per_tipdoc: function() {
                //             return $("#cbo_upd_per_tipdoc").val();
                //         }
                //     }
                // }
            },
            txt_upd_cont_appaterno: {
                // required: true ,
                // lettersonly: true,
                maxlength:80
            },
            txt_upd_cont_apmaterno: {
                // required: true ,
                // lettersonly: true,
                maxlength:80
            },
            txt_upd_cont_nombres: {
                // required: true,
                // lettersonly: true,
                maxlength:200
            },
            txt_upd_cont_nacimiento: {
                // required: true
            },
            cbo_upd_cont_sexo: {
                // required: true
            },
            cbo_upd_cont_ecivil: {
                // required: true
            },
            txt_upd_cont_telefono: {
                // required: true,
                maxlength:11
            }, 
            txt_upd_cont_celular: {
                // required: true
            },
            txt_upd_cont_email: {
                // required: true,
                email: true,
                maxlength:250
            }
        },
        messages: {
            txt_upd_cont_dni:{
                remote:"Ya existe este documento de identidad <a href='recupera_clave.html' style='color: blue'>!Recupera tu clave Aquí¡</a>"
            },
            txt_upd_cont_email:{
                required:"Ingrese su e-mail"
            }
        },
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
                        mensaje("Se Actualizo Correctamente el Contribuyente","e");
                        HabilitarBoton('btn_upd_cont_registrar');
                        // limpiarForm('#frm_upd_trabajador');
                    }

                },
                error: function(msg){                
                    mensaje("r","Error Inesperando actualizando al Contribuyente!, vuelva a intentarlo"); 
                    HabilitarBoton('btn_upd_cont_registrar');                       ;
                }
            });
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
    
