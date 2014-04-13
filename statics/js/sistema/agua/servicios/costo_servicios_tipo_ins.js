$(function(){
    $("#frm_ins_costo_servicios_tipo").validate({
        rules: {           
            txt_ins_cst_costo: {
                required: true
            },
            txt_ins_cst_anio: {
                required: true
            }
        },
        messages: {
            txt_ins_cst_costo:{
                required:"Ingrese el monto"
            },
            txt_ins_cst_anio:{
                required:"Ingrese el año"
            }
        },
        submitHandler: function(form){ 
            DesabilitarBoton('btn_ins_cst_registrar')
            $.ajax({
                type: "POST",
                url:  "servicios/insCostoServiciosTipo",
                data: $(form).serialize(),
                success: function(data){ 
                // alert(data)                   
                    switch (data) { 
                        case "0":
                        mensaje("Error al guardar el Costo del Servicio!","a"); 
                        HabilitarBoton('btn_ins_cst_registrar');                        
                        break;
                        default:                        
                        mensaje("Se Registro Correctamente el Costo del Servicio","e");
                        HabilitarBoton('btn_ins_cst_registrar');
                        // limpiarForm('#frm_ins_trabajador');
                    }


                },
                error: function(msg){                
                    mensaje("r","Error Inesperando registrando el Costo del Servicio!, vuelva a intentarlo"); 
                    HabilitarBoton('btn_ins_cst_registrar');                       ;
                }
            });
        }
    });
});
