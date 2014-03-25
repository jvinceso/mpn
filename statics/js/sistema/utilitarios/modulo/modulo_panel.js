$(function($) {
	$("#btnQryModulo").bind({
		click:function(evt){
			msgLoading('#tabla_modulos',"Espere por favor!!!");
			evt.preventDefault();
			$.ajax({
				url:'modulo/loadDataGrid',
				type:'post',
				cache:false,
	            // data:{},
	            success:function(data){
	            	$(".table-responsive").html(data);
	            },
	            error:function(er){
	            	console.log(er.statusText);
	            	alert("Houston, tenemos un problema... Creo que has roto algo...");
	            }
	        });
		}
	});
	// Evento Regresar Pantalla Anterior
	$("#anc_back_modulo").click(function(evt){
	    evt.preventDefault();
	    MostrarOcultarCapas('#c_frm_modulo','#tabla_modulos');
	    $('#pnl_frm_busqueda').show();
	});	
})

		function confirmarDelete(nAplId){
			$.ajax({
				type:"post",
				url: 'modulo/delAplicacion',
				cache:false,
				data:{
					codex : nAplId
				},
				success:function(data){
					mensaje("Se Eliminó correctamente la Aplicacion","e");
					listarModulo();
			    },
			    error:function(){
			    	alert("error");
			    }
			});
		}

		function asignarObjetos(fila){
			var nDocId = $(fila).find("td:eq(0)").text().trim();
			var nombre = $(fila).find("td:eq(1)").text().trim();
			console.log(nDocId);
			console.log(nombre);
			console.log(fila);
			$('#pnl_frm_busqueda').hide();
			get_page('modulo/vistaGet/ins_objetos_view/','c_frm_procesos',{"docs":nDocId,"nombre":nombre});
			// get_page('../utilitarios/modulo/vistaGet/upd_view/','pnlAsignarObjetos','');
			MostrarOcultarCapas('#tabla_modulos','#c_frm_modulo','','');
			// alert("Gracias por confirmar la opcion");
		}
		function confirmarEdicion(fila){
			mensaje(null,'e');
			console.log(fila);
		}
		function listarModulo(){
			get_page('modulo/loadDataGrid','tabla_modulos','');
		}