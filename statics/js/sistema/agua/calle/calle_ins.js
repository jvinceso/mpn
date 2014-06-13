$(function(){
    cboTipoSector();
    cboTipoVia();
    $("#frm_ins_calle").validate({
        rules: {
            txt_ins_cal_nom: {
                required: true ,
                // lettersonly: true,
                maxlength:80
            }
        },
        messages: {
            txt_ins_cal_nom:{
                required:"Ingrese el Nombre de la calle"
            }
        },
        submitHandler: function(form){ 
            DesabilitarBoton('btn_ins_cal_registrar')
            $.ajax({
                type: "POST",
                url:  "calle/insCalle",
                data: $(form).serialize(),
                success: function(data){                    
                    switch (data) { 
                        case "0":
                        mensaje("Error al guardar la Calle!","a");   
                        HabilitarBoton('btn_ins_cal_registrar');                      
                        break;
                        default:                        
                        mensaje("Se Registro Correctamente la Calle","e");
                        HabilitarBoton('btn_ins_cal_registrar');
                        // limpiarForm('#frm_ins_trabajador');
                    }

                },
                error: function(msg){                
                    mensaje("r","Error Inesperando registrando la Calle!, vuelva a intentarlo");   
                    HabilitarBoton('btn_ins_cal_registrar');                     ;
                }
            });
        }
    });
    
})
function cboTipoSector(){  
    // msgLoading("#c_cbo_ins_not_cat");    
    $.ajax({
        type: "POST",
        url: "calle/cboTipoSector",
        cache: false,
        success: function(data) { 
            $("#c_cbo_ins_cal_sector").html(data);     
            $(".chosen-select").chosen();
        },
        error: function() { 
            alert("error")
            // msgError("#c_cbo_ins_trab_estcivil");   
        }              
    });        
}
function cboTipoVia(){  
    // msgLoading("#c_cbo_ins_not_cat");    
    $.ajax({
        type: "POST",
        url: "calle/cboTipoVia",
        cache: false,
        success: function(data) { 
            $("#c_cbo_ins_cal_via").html(data);     
            $(".chosen-select").chosen();
        },
        error: function() { 
            alert("error")
            // msgError("#c_cbo_ins_trab_estcivil");   
        }              
    });        
}