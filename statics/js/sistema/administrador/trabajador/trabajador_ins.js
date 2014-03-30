$(function(){
	$('.date-picker').datepicker({autoclose:true}).next().on(ace.click_event, function(){
		$(this).prev().focus();
	});

	    $("#frm_ins_trabajador").validate({
        rules: {
            txt_ins_trab_dni: {
                required: true ,
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
                required: true ,
                // lettersonly: true,
                maxlength:80
            },
            txt_ins_trab_apmaterno: {
                required: true ,
                // lettersonly: true,
                maxlength:80
            },
            txt_ins_trab_nombres: {
                required: true,
                // lettersonly: true,
                maxlength:200
            },
            txt_ins_trab_nacimiento: {
                required: true
            },
            cbo_ins_trab_sexo: {
                required: true
            },
            cbo_ins_trab_ecivil: {
                required: true
            },
            txt_ins_trab_telefono: {
                required: true,
                maxlength:11
            }, 
            txt_ins_trab_celular: {
                required: true,
                maxlength:11
            },
            txt_ins_trab_email: {
                required: true,
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
                required: true
            },
            cbo_ins_trab_cargo: {
                required: true
            },
            txt_ins_trab_direccion: {
                required: true,
                maxlength:250
            },
            txt_ins_trab_usuario: {
                required: true,
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
                required: true,
                maxlength:40
            }
            // txt_ins_per_repclave: {
            //     required: true,
            //     equalTo: "#txt_ins_per_clave",
            //     maxlength:40
            // }
        },
        messages: {
            // txt_ins_trab_dni:{
            //     remote:"* Ya existe este documento de identidad <a href='recupera_clave.html' style='color: blue'>!Recupera tu clave Aquí¡</a>"
            // },
            // txt_ins_trab_email:{
            //     required:"Ingrese su e-mail"
            // },
            // txt_ins_trab_contrasenia: {
            // 	required:"Ingrese su contraseña",
            //     minlength:" Ingrese de {0} caracteres a más"
            // },
            // txt_ins_per_usuario: {
            // 	required:"Ingrese su usuario",
            //     minlength:"Ingrese de {0} caracteres a más",
            //     remote: "Este usuario ya existe"
            // }
        },
        submitHandler: function(form){ 
        	DesabilitarBoton('btn_ins_trab_registrar')
            $.ajax({
                type: "POST",
                url:  "insTrabajador",
                data: $(form).serialize(),
                success: function(msg){
                    HabilitarBoton('btn_ins_trab_registrar')
                    alert(msg)
                    // if(msg.trim()==1){ 
                    //     $("#gracias_usuario").html($("#txt_ins_per_nombres").val()+" "+$("#txt_ins_per_apepat").val()+" "+$("#txt_ins_per_apemat").val())
                    //     $("#c_div_registro_exito_datos").modal({
                    //         show:true,
                    //         backdrop: "static",
                    //         keyboard: false
                    //     });                
                    //     $(".modal ").css({
                    //         'margin-left': '-350px',
                    //         'margin-top': '-190px'
                    //     });
                    //     $(".modal-header ").css({
                    //         'background-color': '#2968A0', 
                    //         'color':'#FFF'
                    //     });
                    //     cleanForm(form);
                    // }
                    // else if(msg.trim()==3){
                    //     mensaje("Ya existe este DNI","a");             
                    // }
                    // else if(msg.trim()==4){
                    //     mensaje("Sus datos fueron guardados correctamente. Lamentablemente por razones técnicas no se ha podido enviar el Email.","a");             
                    // }
                    // else{
                    //     mensaje("Error Inesperando registrando la persona!, vuelva a intentarlo","r");
                    //     setInterval(tologin, 8000);                         
                    // } 
                },
                error: function(msg){                
                    mensaje("r","Error Inesperando registrando la persona!, vuelva a intentarlo");                        ;
                }
            });
        }
    });
	
})
