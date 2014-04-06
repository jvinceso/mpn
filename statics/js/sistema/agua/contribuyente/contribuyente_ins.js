$(function(){
    cboTipoEstadoCivil();
    $('.input-mask-phone').mask('(999) 999-999');
    $('.date-picker').datepicker({
        autoclose:true
    });

        $("#frm_ins_contribuyente").validate({
        rules: {
            txt_ins_cont_dni: {
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
                //             return $("#txt_ins_trab_dni").val();
                //         },
                //         cbo_ins_per_tipdoc: function() {
                //             return $("#cbo_ins_per_tipdoc").val();
                //         }
                //     }
                // }
            },
            txt_ins_cont_appaterno: {
                // required: true ,
                // lettersonly: true,
                maxlength:80
            },
            txt_ins_cont_apmaterno: {
                // required: true ,
                // lettersonly: true,
                maxlength:80
            },
            txt_ins_cont_nombres: {
                // required: true,
                // lettersonly: true,
                maxlength:200
            },
            txt_ins_cont_nacimiento: {
                // required: true
            },
            cbo_ins_cont_sexo: {
                // required: true
            },
            cbo_ins_cont_ecivil: {
                // required: true
            },
            txt_ins_cont_telefono: {
                // required: true,
                maxlength:11
            }, 
            txt_ins_cont_celular: {
                // required: true
            },
            txt_ins_cont_email: {
                // required: true,
                email: true,
                maxlength:250
            }
        },
        messages: {
            txt_ins_cont_dni:{
                remote:"Ya existe este documento de identidad <a href='recupera_clave.html' style='color: blue'>!Recupera tu clave Aquí¡</a>"
            },
            txt_ins_cont_email:{
                required:"Ingrese su e-mail"
            }
        },
        submitHandler: function(form){ 
            DesabilitarBoton('btn_ins_cont_registrar')
            $.ajax({
                type: "POST",
                url:  "contribuyente/insContribuyente",
                data: $(form).serialize(),
                success: function(data){                    
                    switch (data) { 
                        case "2":
                        mensaje("Error al guardar el Contribuyente!","a"); 
                        HabilitarBoton('btn_ins_cont_registrar');
                        break; 
                        case "0":
                        mensaje("Error al guardar el Contribuyente!","a"); 
                        HabilitarBoton('btn_ins_cont_registrar');                        
                        break;
                        default:                        
                        mensaje("Se Registro Correctamente el Contribuyente","e");
                        HabilitarBoton('btn_ins_cont_registrar');
                        // limpiarForm('#frm_ins_trabajador');
                    }

                },
                error: function(msg){                
                    mensaje("r","Error Inesperando registrando al Contribuyente!, vuelva a intentarlo"); 
                    HabilitarBoton('btn_ins_cont_registrar');                       ;
                }
            });
        }
    });
    
})
function cboTipoEstadoCivil(){  
    // msgLoading("#c_cbo_ins_not_cat");    
    $.ajax({
        type: "POST",
        url: "Contribuyente/cboTipoEstadoCivil",
        cache: false,
        success: function(data) { 
            $("#c_cbo_ins_cont_estcivil").html(data);     
            // $(".chzn-select").chosen();
        },
        error: function() { 
            alert("error")
            // msgError("#c_cbo_ins_trab_estcivil");   
        }              
    });        
}
function cboTipoArea(){  
    // msgLoading("#c_cbo_ins_not_cat");    
    $.ajax({
        type: "POST",
        url: "Trabajador/cboTipoArea",
        cache: false,
        success: function(data) { 
            $("#c_cbo_ins_trab_area").html(data);     
            $(".chosen-select").chosen(); ;
        },
        error: function() { 
            alert("error")
            // msgError("#c_cbo_ins_trab_estcivil");   
        }              
    });        
}
function cboTipoCargo(){  
    // msgLoading("#c_cbo_ins_not_cat");    
    $.ajax({
        type: "POST",
        url: "Trabajador/cboTipoCargo",
        cache: false,
        success: function(data) { 
            $("#c_cbo_ins_trab_cargo").html(data);     
            $(".chosen-select").chosen(); ;
        },
        error: function() { 
            alert("error")
            // msgError("#c_cbo_ins_trab_estcivil");   
        }              
    });        
}