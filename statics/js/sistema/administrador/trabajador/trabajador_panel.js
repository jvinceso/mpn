		$(function($) {
			// $("#tb_lista_trabajador").bind({
			// 	click:function(evt){
			// 		msgLoading('#tabla_modulos',"Espere por favor!!!");
			// 		evt.preventDefault();
			// 		$.ajax({
			// 			url:'modulo/loadDataGrid',
			// 			type:'post',
			// 			cache:false,
			//             // data:{},
			//             success:function(data){
			//             	$(".table-responsive").html(data);
			//             },
			//             error:function(er){
			//             	console.log(er.statusText);
			//             	alert("Houston, tenemos un problema... Creo que has roto algo...");
			//             }
			//         });


			// 	}
			// });

			
			// var oTable1 = $('#tabla_prueba table').dataTable( {
			// 	"aoColumns": [null, null,null,null] 
			// });

			// var oTable1 = $('#sample-table-2').dataTable( {
			// 	"aoColumns": [
			// 	{ "bSortable": false },
			// 	null, null,null, null, null,
			// 	{ "bSortable": false }
			// 	] } );


			// $('table th input:checkbox').on('click' , function(){
			// 	var that = this;
			// 	$(this).closest('table').find('tr > td:first-child input:checkbox')
			// 	.each(function(){
			// 		this.checked = that.checked;
			// 		$(this).closest('tr').toggleClass('selected');
			// 	});

			// });


			// $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
			// function tooltip_placement(context, source) {
			// 	var $source = $(source);
			// 	var $parent = $source.closest('table')
			// 	var off1 = $parent.offset();
			// 	var w1 = $parent.width();

			// 	var off2 = $source.offset();
			// 	var w2 = $source.width();

			// 	if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
			// 	return 'left';
			// }
		})


		function confirmarDelete(fila){
			console.log(fila);
			alert("Gracias por confirmar el eliminar");
		}

		function confirmaOpcion(fila){
			alert("Gracias por confirmar la opcion");
		}
		function confirmarEdicion(fila){
			mensaje(null,'e');
			console.log(fila);
		}