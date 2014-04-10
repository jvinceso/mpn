$(function(){
	$.ajax({
	    url:'servicios/qryServicioTipo',
	    type:'post',
	    dataType:'json',
	    cache:false,
	    data:{},
	    success:function(datax){
	    	console.log( datax );
	    	 $("#nav-search-input").typeahead({
            	source: datax,
            	updater: function (c) {
                // $("#nav-search-input").focus();
                // return c
            	}
        	 })
        	 var tag_input = $('#form-field-tags');
				if(! ( /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase())) ) 
				{
					tag_input.tag(
					  {
						placeholder:tag_input.attr('placeholder'),
						//enable typeahead by specifying the source array
						source: datax,//defined in ace.js >> ace.enable_search_ahead
					  }
					);
				}
				else {
					//display a textarea for old IE, because it doesn't support this plugin or another one I tried!
					tag_input.after('<textarea id="'+tag_input.attr('id')+'" name="'+tag_input.attr('name')+'" rows="3">'+tag_input.val()+'</textarea>').remove();
					//$('#form-field-tags').autosize({append: "\n"});
				}
	    },
	    error:function(er){
	    	// console.log(er.statusText);
	        alert("Houston, tenemos un problema... Creo que has roto algo...");
	    }
	})
});












//     $("#frm_ins_sector").validate({
//         rules: {           
//             txt_ins_sec_nom: {
//                 required: true
//             }
//         },
//         messages: {
//             txt_ins_sec_nom:{
//                 required:"Ingrese el nombre"
//             }
//         },
//         submitHandler: function(form){ 
//             DesabilitarBoton('btn_ins_sec_registrar')
//             $.ajax({
//                 type: "POST",
//                 url:  "sectoresyvias/insSector",
//                 data: $(form).serialize(),
//                 success: function(data){                    
//                     switch (data) { 
//                         case "0":
//                         mensaje("Error al guardar el Sector!","a"); 
//                         HabilitarBoton('btn_ins_sec_registrar');                        
//                         break;
//                         default:                        
//                         mensaje("Se Registro Correctamente el Sector","e");
//                         HabilitarBoton('btn_ins_sec_registrar');
//                         // limpiarForm('#frm_ins_trabajador');
//                     }

//                 },
//                 error: function(msg){                
//                     mensaje("r","Error Inesperando registrando el Sector!, vuelva a intentarlo"); 
//                     HabilitarBoton('btn_ins_sec_registrar');                       ;
//                 }
//             });
//         }
//     });

    
//     $("#frm_ins_via").validate({
//         rules: {           
//             txt_ins_via_nom: {
//                 required: true
//             }
//         },
//         messages: {
//             txt_ins_via_nom:{
//                 required:"Ingrese el nombre"
//             }
//         },
//         submitHandler: function(form){ 
//             DesabilitarBoton('btn_ins_via_registrar')
//             $.ajax({
//                 type: "POST",
//                 url:  "sectoresyvias/insVia",
//                 data: $(form).serialize(),
//                 success: function(data){                    
//                     switch (data) { 
//                         case "0":
//                         mensaje("Error al guardar la Vía!","a"); 
//                         HabilitarBoton('btn_ins_via_registrar');                        
//                         break;
//                         default:                        
//                         mensaje("Se Registro Correctamente la Vía","e");
//                         HabilitarBoton('btn_ins_via_registrar');
//                         // limpiarForm('#frm_ins_trabajador');
//                     }

//                 },
//                 error: function(msg){                
//                     mensaje("r","Error Inesperando registrando la Vía!, vuelva a intentarlo"); 
//                     HabilitarBoton('btn_ins_via_registrar');                       ;
//                 }
//             });
//         }
//     });
    
// })