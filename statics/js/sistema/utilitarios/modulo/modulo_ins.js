$(function(){

    $(".list-unstyled li").bind({
        click:function(evt){
            evt.preventDefault();
            var icono = $(this).text().trim();
            $("input[name=txt_ins_mod_icono]").val(icono);
            // console.log($(this).text().trim());
        }
    });

    $("#frm_ins_modulo").validate({
        submitHandler: function(form) { 
            msgLoadSaveMsg('#pnlmensajeaviso','#btnRegistrar');
            $.ajax({
                url:'modulo/insAplicacion',
                cache:false,
                type:'post',
                data:$(form).serialize(),
                success:function(data){
                    switch (data) { 
                        case "2":
                        mensaje("Error al guardar el Modulo!","a"); 
                        break; 
                        default:
                        msgLoadSaveRemove("#btnRegistrar");
                        mensaje("Se Registro Correctamente el Modulo","e");
                        limpiarForm('#frm_ins_modulo');
                    }
                },
                error:function(error){
                }
            }) 
        },            
        rules: {
            txt_ins_mod_nombre: {
                required: true
            }
        },
        messages: {
            txt_ins_mod_nombre:{
                // required:'Ingrese una zapatos'
            }
        }
    });
})
