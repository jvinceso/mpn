$(function(){
    cboTipoEstadoCivil();
    cboTipoArea();
    cboTipoCargo()
    $('.input-mask-phone').mask('(999) 999-999');
    $('.date-picker').datepicker({
        autoclose:true
    });

        $("#frm_ins_trabajador").validate({
        rules: {
            txt_ins_trab_dni: {
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
            txt_ins_trab_appaterno: {
                // required: true ,
                // lettersonly: true,
                maxlength:80
            },
            txt_ins_trab_apmaterno: {
                // required: true ,
                // lettersonly: true,
                maxlength:80
            },
            txt_ins_trab_nombres: {
                // required: true,
                // lettersonly: true,
                maxlength:200
            },
            txt_ins_trab_nacimiento: {
                // required: true
            },
            cbo_ins_trab_sexo: {
                // required: true
            },
            cbo_ins_trab_ecivil: {
                // required: true
            },
            txt_ins_trab_telefono: {
                // required: true,
                maxlength:11
            }, 
            txt_ins_trab_celular: {
                // required: true
            },
            txt_ins_trab_email: {
                // required: true,
                email: true,
                // remote: {
                //     url: "txtUsuarioGet",
                //     type: "post",
                //     data: {
                //         accion: "EmailRP",
                //         email: function() {
                //             return $("#txt_ins_per_email").val();
                //         }
                //     }
                // },
                maxlength:250
            },
            cbo_ins_trab_area: {
                // required: true
            },
            cbo_ins_trab_cargo: {
                // required: true
            },
            txt_ins_trab_direccion: {
                // required: true,
                maxlength:250
            },
            txt_ins_trab_usuario: {
                // required: true,
                minlength:6,
                // ,remote: {
                //     url: "txtUsuarioGet",
                //     type: "post",
                //     data: {
                //         accion: "UserRP",
                //         usuario: function() {
                //             return $("#txt_ins_per_usuario").val();
                //         }
                //     }
                // },
                maxlength:100
            },
            txt_ins_trab_contrasenia: {
                minlength:6,
                // required: true,
                maxlength:40
            }
            // txt_ins_per_repclave: {
            //     required: true,
            //     equalTo: "#txt_ins_per_clave",
            //     maxlength:40
            // }
        },
        messages: {
            txt_ins_trab_dni:{
                remote:"Ya existe este documento de identidad <a href='recupera_clave.html' style='color: blue'>!Recupera tu clave Aquí¡</a>"
            },
            txt_ins_trab_email:{
                required:"Ingrese su e-mail"
            },
            txt_ins_trab_contrasenia: {
                required:"Ingrese su contraseña",
                minlength:" Ingrese de {0} caracteres a más"
            },
            txt_ins_per_usuario: {
                required:"Ingrese su usuario",
                minlength:"Ingrese de {0} caracteres a más",
                remote: "Este usuario ya existe"
            }
        },
        submitHandler: function(form){ 
            DesabilitarBoton('btn_ins_trab_registrar')
            $.ajax({
                type: "POST",
                url:  "trabajador/insTrabajador",
                data: $(form).serialize(),
                success: function(data){                    
                    switch (data) { 
                        case "2":
                        mensaje("Error al guardar el Trabajador!","a"); 
                        HabilitarBoton('btn_ins_trab_registrar');
                        break; 
                        case "0":
                        mensaje("Error al guardar el Trabajador!","a");   
                        HabilitarBoton('btn_ins_trab_registrar');                      
                        break;
                        default:                        
                        mensaje("Se Registro Correctamente el Trabajador","e");
                        HabilitarBoton('btn_ins_trab_registrar');
                        // limpiarForm('#frm_ins_trabajador');
                    }

                },
                error: function(msg){                
                    mensaje("r","Error Inesperando registrando al Trabajador!, vuelva a intentarlo");   
                    HabilitarBoton('btn_ins_trab_registrar');                     ;
                }
            });
        }
    });
    
})
function cboTipoEstadoCivil(){  
    // msgLoading("#c_cbo_ins_not_cat");    
    $.ajax({
        type: "POST",
        url: "Trabajador/cboTipoEstadoCivil",
        cache: false,
        success: function(data) { 
            $("#c_cbo_ins_trab_estcivil").html(data);     
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