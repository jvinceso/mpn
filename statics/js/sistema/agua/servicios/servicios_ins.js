$(function(){
	$.ajax({
	    url:'servicios/qryServicioTipo',
	    type:'post',
	    dataType:'json',
	    cache:false,
	    data:{},
	    success:function(datax){
	    	console.log( datax );
	    	// alert(datax.id)
	    	 // var resultList = datax.map(function (item) {
       //              var aItem = {name: item.Name };
       //                          // alert(item.Id)
       //              return JSON.stringify(aItem);
       //          });
	    	  // alert(resultList)

	    	 $("#nav-search-input").typeahead({
            	source: datax,
            	updater: function (c) {
            		alert(c)
           //  		var item = JSON.parse(c);
       				//  $('#IdControl').attr('value', item.id);
        			// return item.name;
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
						// source: function(datax){
      //                   // var tags = new Array()
      //                   // tags     = ["Actor", "Director", "Producer", "Musician", "test", "cool", "sexy", "Hot", "Cricket"]
      //                   // return tags
      //               	},	
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
    $("#frm_ins_servicio").validate({
        rules: {           
            txt_ins_serv_nom: {
                required: true
            },
            tags:{
            	required: true
            }
        },
        messages: {
            txt_ins_sec_nom:{
                required:"Ingrese el nombre"
            },
            tags:{
            	required: "Seleccione un tipo de servicio"
            }
        },
        submitHandler: function(form){ 
            DesabilitarBoton('btn_ins_serv_registrar')
             // var np = $('tr', $("#tbpermisos")).length};
            $.ajax({
                type: "POST",
                url:  "servicios/insServicio",
                data:{
                    json:{
                            txt_ins_serv_nom : $("#txt_ins_serv_nom").val(),
                            tipos_servicios  : obtieneCampos()
                         }
                } ,
                success: function(data){ 
                alert(data)                   
                    // switch (data) { 
                    //     case "0":
                    //     mensaje("Error al guardar el Sector!","a"); 
                    //     HabilitarBoton('btn_ins_serv_registrar');                        
                    //     break;
                    //     default:                        
                    //     mensaje("Se Registro Correctamente el Sector","e");
                    //     HabilitarBoton('btn_ins_serv_registrar');
                    //     // limpiarForm('#frm_ins_trabajador');
                    // }


                },
                error: function(msg){                
                    mensaje("r","Error Inesperando registrando el Sector!, vuelva a intentarlo"); 
                    HabilitarBoton('btn_ins_serv_registrar');                       ;
                }
            });
        }
    });
});
function obtieneCampos(){
    var spans = $("#tag").find("span");
    var arr=[];
    var indice=0;
    $.each(spans,function(i,valor){
    var obj = new Object();
    var cadena =  $(valor).text().trim();
        obj.nombre = cadena.substring(0,cadena.length - 1)
        arr[i] = obj ;
    }); 
    return arr;
}