		$(function() {
			listarUsuarios();



		})

	function listarUsuarios(){
		msgLoading('#tabla_permisos',"Espere por favor!!!");					
					$.ajax({
						url:'permisos/loadDataGrid',
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
	function confirmarDelete(nAplId){
			// console.log(fila);
			// var nAplId = $(fila).find("td:eq(0)").text();
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

	function confirmaOpcion(fila){
			alert("Gracias por confirmar la opcion");
		}
	function confirmarEdicion(fila){
			mensaje(null,'e');
			console.log(fila);
		}
	function listarModulo(){
			get_page('modulo/loadDataGrid','tabla_modulos','');
		}		