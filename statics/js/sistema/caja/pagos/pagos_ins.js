$(function(){
    $(".chosen-select").chosen();
    $("#cbo_ins_pag_concepto").bind({
        change:function(){
            // alert($("#cbo_ins_pag_concepto").val())
            if ($("#cbo_ins_pag_concepto").val() == 5) {
                $(".grupo1").css("display", "block");
            };
        }
    });
    $(".grupo1").css("display", "none");
    $(".grupo2").css("display", "none");
    $(".grupo3").css("display", "none");

    $('#txt_ins_pag_nombre').keyup(function(){  
        creaAutocomplete({
            id:"hid_fnd_ins_pag_nombre",
            value:"txt_ins_pag_nombre",
            url:'caja_pagos/GetNombreContribuyente',
            funcion:""
        });
    });

    $("#frm_ins_servicio").validate({
        rules: {           
            txt_ins_serv_nom: {
                required: true
            }
        },
        messages: {
            txt_ins_serv_nom:{
                required:"Ingrese el nombre"
            }
        },
        submitHandler: function(form){ 
            DesabilitarBoton('btn_ins_serv_registrar')
             // var np = $('tr', $("#tbpermisos")).length};
             $.ajax({
                type: "POST",
                url:  "servicios/insServicio",
                data: $(form).serialize(),
                success: function(data){ 
                // alert(data)                   
                switch (data) { 
                    case "0":
                    mensaje("Error al guardar el Tipo de Servicio!","a"); 
                    HabilitarBoton('btn_ins_serv_registrar');                        
                    break;
                    default:                        
                    mensaje("Se Registro Correctamente el Tipo de Servicio","e");
                    HabilitarBoton('btn_ins_serv_registrar');
                        // limpiarForm('#frm_ins_trabajador');
                    }


                },
                error: function(msg){                
                    mensaje("r","Error Inesperando registrando el Tipo de Servicio!, vuelva a intentarlo"); 
                    HabilitarBoton('btn_ins_serv_registrar');                       ;
                }
            });
}
});
});