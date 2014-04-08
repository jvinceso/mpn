$(function(){

        $("#frm_ins_sector").validate({
        rules: {           
            txt_ins_sec_nom: {
                required: true
            }
        },
        messages: {
            txt_ins_sec_nom:{
                required:"Ingrese el nombre"
            }
        },
        submitHandler: function(form){ 
            DesabilitarBoton('btn_ins_sec_registrar')
            // $.ajax({
            //     type: "POST",
            //     url:  "contribuyente/insContribuyente",
            //     data: $(form).serialize(),
            //     success: function(data){                    
            //         switch (data) { 
            //             case "2":
            //             mensaje("Error al guardar el Contribuyente!","a"); 
            //             HabilitarBoton('btn_ins_sec_registrar');
            //             break; 
            //             case "0":
            //             mensaje("Error al guardar el Contribuyente!","a"); 
            //             HabilitarBoton('btn_ins_sec_registrar');                        
            //             break;
            //             default:                        
            //             mensaje("Se Registro Correctamente el Contribuyente","e");
            //             HabilitarBoton('btn_ins_sec_registrar');
            //             // limpiarForm('#frm_ins_trabajador');
            //         }

            //     },
            //     error: function(msg){                
            //         mensaje("r","Error Inesperando registrando al Contribuyente!, vuelva a intentarlo"); 
            //         HabilitarBoton('btn_ins_sec_registrar');                       ;
            //     }
            // });
        }
    });
    
})