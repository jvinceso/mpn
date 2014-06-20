$(function(){ 

    $('.date-picker').datepicker({
        autoclose:true
    });
    $('#txt_upd_pag_horas').timepicker({
        minuteStep: 1,
        showSeconds: true,
        showMeridian: false,
        defaultTime: false
    }).next().on(ace.click_event, function(){
        $(this).prev().focus();
    });
    
    // $(".grupo1").css("display", "none");
    // $(".grupo2").css("display", "none");
    // $(".grupo3").css("display", "none");
    $(".chosen-select").chosen();
    cboConceptoPagoUpd()


//     var Array1 =new Array('5','6','14','40','41','42','51','79','83','85','106','117','124','132','146','150','151','152','161','164','165','166','167','168','169','173','184','199','201','202','205','209','213','214','224','226','228','229','230','232');
//     var Array2 =new Array('7','57','120','131','134','215','217','218','220','221','222','223','231','233','234');
//     var Array3 =new Array('8','9','11','13','78','84','181');

// alert($("#cbo_upd_pag_concepto").val())
//     if ($.inArray($("#cbo_upd_pag_concepto").val(),Array1) != -1) {
//         $(".grupo1").css({display:"block"});
//         $("#cbo_upd_pag_mes_chosen").css({width:"150px"});
//         $(".grupo2").css("display", "none");
//         $(".grupo3").css("display", "none");  
//     }else{
//         if ($.inArray($("#cbo_upd_pag_concepto").val(),Array2) != -1) {
//             $(".grupo1").css("display", "none");
//             $(".grupo2").css("display", "block");
//             $(".grupo3").css("display", "none");
//         }else{
//             if ($.inArray($("#cbo_upd_pag_concepto").val(),Array3) != -1) {
//                 $(".grupo1").css("display", "none");
//                 $(".grupo2").css("display", "none");
//                 $(".grupo3").css("display", "block");
//             }else{
//                 $(".grupo1").css("display", "none");
//                 $(".grupo2").css("display", "none");
//                 $(".grupo3").css("display", "none");
//             }
//         }
//     };




$('#txt_upd_pag_nombre').keyup(function(){  
    creaAutocomplete({
        id:"hid_fnd_upd_pag_nombre",
        value:"txt_upd_pag_nombre",
        url:'caja_pagos/GetNombreContribuyente',
        funcion:""
    });
});

$('#txt_upd_pag_sector').keyup(function(){  
    creaAutocomplete({
        id:"hid_fnd_upd_pag_sector",
        value:"txt_upd_pag_sector",
        url:'caja_pagos/GetNombreSector',
        funcion:""
    });
});

});

function cboConceptoPagoUpd(){      
    // msgLoading("#c_cbo_upd_doc_tipo");
    $.ajax({
        type: "POST",
        url: "caja_pagos/cboConceptoPagoUpd",
        cache: false,
        data: { 
            txt_upd_pag_concepto_nConId:$("#txt_upd_pag_concepto_nConId").val()
        },        
        success: function(data) {                
            $("#c_cbo_upd_pag_concepto").html(data); 
            $(".chosen-select").chosen();

            var Array1 =new Array('5','6','14','40','41','42','51','79','83','85','106','117','124','132','146','150','151','152','161','164','165','166','167','168','169','173','184','199','201','202','205','209','213','214','224','226','228','229','230','232');
            var Array2 =new Array('7','57','120','131','134','215','217','218','220','221','222','223','231','233','234');
            var Array3 =new Array('8','9','11','13','78','84','181');
            
            if ($.inArray($("#cbo_upd_pag_concepto").val(),Array1) != -1) {
                $(".grupo1").css({display:"block"});
                $("#cbo_upd_pag_mes_chosen").css({width:"150px"});
                $(".grupo2").css("display", "none");
                $(".grupo3").css("display", "none");  
            }else{
                if ($.inArray($("#cbo_upd_pag_concepto").val(),Array2) != -1) {
                    $(".grupo1").css("display", "none");
                    $(".grupo2").css("display", "block");
                    $(".grupo3").css("display", "none");
                }else{
                    if ($.inArray($("#cbo_upd_pag_concepto").val(),Array3) != -1) {
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

            $("#cbo_upd_pag_concepto").bind({
                change:function(){
                    if ($.inArray($("#cbo_upd_pag_concepto").val(),Array1) != -1) {
                        $(".grupo1").css({display:"block"});
                        $("#cbo_upd_pag_mes_chosen").css({width:"150px"});
                        $(".grupo2").css("display", "none");
                        $(".grupo3").css("display", "none");  
                    }else{
                        if ($.inArray($("#cbo_upd_pag_concepto").val(),Array2) != -1) {
                            $(".grupo1").css("display", "none");
                            $(".grupo2").css("display", "block");
                            $(".grupo3").css("display", "none");
                        }else{
                            if ($.inArray($("#cbo_upd_pag_concepto").val(),Array3) != -1) {
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
                            cbo_ins_pag_concepto: $("#cbo_upd_pag_concepto").val()
                        },
                        success: function(data) {
                            switch (data) {
                                case "0":
                                $("#txt_upd_pag_monto").val("Error de costo");
                                break;
                                default :                       
                                $("#txt_upd_pag_monto").val(data);



                            } 
                        },
                        error: function() { 
                            $("#txt_upd_pag_monto").val("Error de costo");
                        }              
                    });  
                }
            });
},
error: function() { 
    alert("error")
            // msgError("#c_cbo_upd_doc_tipo");   
        }              
    });        
}





















