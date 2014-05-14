$(function(){
    $("#frm_ins_costo_servicios_tipo").validate({
        rules: {           
            txt_ins_cst_costo: {
                required: true,
                remote: {
                    url: "costo_servicios_tipo/VerificaCostoAnio",
                    type: "post",
                    data: {                        
                        nSetId: function() {
                            return $("#txt_ins_setid").val();
                        }
                    }
                }
            }
        },
        messages: {
            txt_ins_cst_costo:{
                required:"Ingrese el monto",
                remote:"El costo para este año ya existe"
            }
        },
        submitHandler: function(form){ 
            DesabilitarBoton('btn_ins_cst_registrar')
            $.ajax({
                type: "POST",
                url:  "costo_servicios_tipo/insCostoServiciosTipo",
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
                        get_page('servicios/listarServicios','tabla_servicios');
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
