$(function(){ 
    $('.date-picker').datepicker({
        autoclose:true
    });
    $('#timepicker1').timepicker({
        minuteStep: 1,
        showSeconds: true,
        showMeridian: false,
        defaultTime: false
    }).next().on(ace.click_event, function(){
        $(this).prev().focus();
    });
    $(".grupo1").css("display", "none");
    $(".grupo2").css("display", "none");
    $(".grupo3").css("display", "none");

    $(".chosen-select").chosen();

    var Array1 =new Array('5','6','14','40','41','42','51','79','83','85','106','117','124','132','146','150','151','152','161','164','165','166','167','168','169','173','184','199','201','202','205','209','213','214','224','226','228','229','230','232');
    var Array2 =new Array('7','57','120','131','134','215','217','218','220','221','222','223','231','233','234');
    var Array3 =new Array('8','9','11','13','78','84','181');

    $("#cbo_ins_pag_concepto").bind({
        change:function(){
            // alert($("#cbo_ins_pag_concepto").val())
            // $("div").css({ color: "#FFFFFF", background: "#FF0000" });
            if ($.inArray($("#cbo_ins_pag_concepto").val(),Array1) != -1) {
                $(".grupo1").css({display:"block"});
                $("#cbo_ins_pag_mes_chosen").css({width:"150px"});
                $(".grupo2").css("display", "none");
                $(".grupo3").css("display", "none");                
                // $("#")
            }else{
                if ($.inArray($("#cbo_ins_pag_concepto").val(),Array2) != -1) {
                    $(".grupo1").css("display", "none");
                    $(".grupo2").css("display", "block");
                    $(".grupo3").css("display", "none");
                }else{
                    if ($.inArray($("#cbo_ins_pag_concepto").val(),Array3) != -1) {
                        $(".grupo1").css("display", "none");
                        $(".grupo2").css("display", "none");
                        $(".grupo3").css("display", "block");
                    }else{
                        $(".grupo1").css("display", "none");
                        $(".grupo2").css("display", "none");
                        $(".grupo3").css("display", "none");
                    }
                }
            };
            $.ajax({
                type: "POST",
                url: "caja_pagos/getCosto",
                cache: false,
                data: { 
                    cbo_ins_pag_concepto: $("#cbo_ins_pag_concepto").val()
                },
                success: function(data) {
                    switch (data) {
                        case "0":
                        $("#txt_ins_pag_monto").val("Error de costo");
                        break;
                        default :                       
                        $("#txt_ins_pag_monto").val(data);



                    } 
                },
                error: function() { 
                    $("#txt_ins_pag_monto").val("Error de costo");
                }              
            });  
}
});


$('#txt_ins_pag_nombre').keyup(function(){  
    creaAutocomplete({
        id:"hid_fnd_ins_pag_nombre",
        value:"txt_ins_pag_nombre",
        url:'caja_pagos/GetNombreContribuyente',
        funcion:""
    });
});

$('#txt_ins_pag_sector').keyup(function(){  
    creaAutocomplete({
        id:"hid_fnd_ins_pag_sector",
        value:"txt_ins_pag_sector",
        url:'caja_pagos/GetNombreSector',
        funcion:""
    });
});

$("#frm_ins_pagos").validate({
    rules: {           
        txt_ins_pag_nombre: {
            required: true
        },
        txt_ins_pag_monto: {
            required: true
        }
    },
    messages: {
        txt_ins_pag_nombre:{
            required:"Ingrese el nombre"
        },
        txt_ins_pag_monto:{
            required:"Ingrese el monto"
        }
    },
    submitHandler: function(form){ 
        DesabilitarBoton('btn_ins_pagos_registrar')
             // var np = $('tr', $("#tbpermisos")).length};
             $.ajax({
                type: "POST",
                url:  "caja_pagos/insCajaPagos",
                data: $(form).serialize(),
                success: function(data){ 
                // alert(data)                   
                switch (data) { 
                    case "0":
                    mensaje("Error al guardar el Pago!","a"); 
                    HabilitarBoton('btn_ins_pagos_registrar');                        
                    break;
                    default:                        
                    mensaje("Se Registro Correctamente el Pago","e");
                    HabilitarBoton('btn_ins_pagos_registrar');
                    limpiarForm('#frm_ins_pagos');
                }

            },
            error: function(msg){                
                mensaje("r","Error Inesperando registrando el Tipo de Servicio!, vuelva a intentarlo"); 
                HabilitarBoton('btn_ins_pagos_registrar');                       ;
            }
        });
         }
     });
});