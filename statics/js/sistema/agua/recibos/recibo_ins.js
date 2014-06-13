$(function(){
	$("#hid_fnd_ins_id_Contribuyente").val("");
	$(".chosen-select").chosen();

	$('#txt_ins_contribuyente_nombre').keyup(function(){
		// $("#hid_fnd_ins_id_Contribuyente").val("");
	    creaAutocomplete({
	        id:"hid_fnd_ins_id_Contribuyente",
	        value:"txt_ins_contribuyente_nombre",
	        url:'contribuyente/nomContribuyenteAuto',
	        funcion:""
	    });
	});
	$("#btn_process_contribuyente").bind({
	    click:function(evt){
	        evt.preventDefault();
	        var idx = $("#hid_fnd_ins_id_Contribuyente").val();
	        if( idx !== "" ){
	        	procesarRecibosParciales();
	        }else{
	        	mensaje("Por favor Seleccione un Contribuyente!!!","r"); 
	        }
	    }
	});
	$("#btn_print_recibo").bind({
	    click:function(evt){
	        evt.preventDefault();
	        impresionMasiva();
	    }
	});
	$("#cbo_sector").bind({
	    change:function(evt){
	        evt.preventDefault();
	    	cargar_cboCalles();
	    }
	});
	//Carga Calles del primer Sector
	// cargar_cboCalles();
	

	$("#btnProcesar").bind({
	    click:function(evt){
	        DesabilitarBoton('btn_ins_sec_registrar');
	        $.ajax({
	            url:'recibo/procesar_recibos',
	            cache:false,
	            type:'post',
	            // data:$(form).serialize(),
	            success:function(data){
	                switch (data) { 
	                    case "4":
	                    	mensaje("Seleccione un año!!!","a");
	                    break; 
	                    case "3":
	                    	var year = new Date().getFullYear()
	                    	mensaje("Ya se han Procesados los Arbitrios para el año "+year+" !!!","a");
	                    break; 
	                    case "2":
	                    	mensaje("Error al Procesar los recibos!!!","a"); 
	                    break;  
	                    case "1":
	                    	mensaje("Se Procesaron los recibos Correctamente","e");
	                    	limpiarForm('#frm_proc_anios');
	                    break
	                    default:
	                    	mensaje("Error no identificado contactese con sistemas!!!","r"); 
	                    break; 
	                }
	                HabilitarBoton('btn_ins_sec_registrar');
	            },
	            error:function(error){
	            }
	        });
	    }
	});
});

function cargar_cboCalles(){
	msgLoading('#c_cbo_calles',"Buscando calles...");
	var nSector = $("#cbo_sector option:selected").val();
	$.ajax({
	    url:'contribuyente/get_calles/',
	    type:'post',
	    cache:false,
	    data:{"nSector":nSector},
	    success:function(data){
	    	if (data!="0") {
	    		$("#c_cbo_calles").html(data);
				$(".chosen-select").chosen();	            		
	    	}else{
	    		mensaje("No hemos encontrado calles que coincidan con el sector seleccionado, por favor vuelva a intentarlo... :(","a"); 
	    	}
	    },
	    error:function(er){
	    	console.log(er.statusText);
	        alert("Houston, tenemos un problema... Creo que has roto algo...");
	    }
	});
}

function procesarRecibosParciales(){
	// alert("go process");
	$.ajax({
	    url:'recibo/procesar_recibos/parcial',
	    cache:false,
	    type:'post',
	    data:{
	    	anio: $("#cbo_in_contribuyente_anio option:selected").val(),
	    	idx : $("#hid_fnd_ins_id_Contribuyente").val(),
	    	mes : $("#cbo_in_contribuyente_mes option:selected").val()
	    },
	    success:function(data){
	        switch (data) { 
	            case "4":
	            	mensaje("Seleccione un año!!!","a");
	            break; 
	            case "3":
	            	var year = $("#cbo_in_contribuyente_anio option:selected").val()
	            	mensaje("Ya se han Procesados los Arbitrios para el año "+year+" !!!","a");
	            break; 
	            case "2":
	            	mensaje("Error al Procesar los recibos!!!","a"); 
	            break;  
	            case "1":
	            	mensaje("Se Procesaron los recibos Correctamente","e");
	            	limpiarForm('#frm_proc_anios');
	            break
	            default:
	            	mensaje("Error no identificado contactese con sistemas!!!","r"); 
	            break; 
	        }
	        HabilitarBoton('btn_ins_sec_registrar');
	    },
	    error:function(error){
	    }
	});
	
	
}
function impresionMasiva(){
	set_popup('recibo/impresion_masiva','Impresion Masiva',920,400,{
		mes  : $("#cbo_imprimir_recibo_mes option:selected").val(),
		anio : $("#cbo_imprimir_recibo_anio option:selected").val(),
		mensaje : $("textarea[name=txt_imprimir_recibo_mensaje]").val(),
		nSec  : $("#cbo_calle option:selected").val()
	});
}