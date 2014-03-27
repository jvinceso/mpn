<link href="<?php echo URL_CSS ?>tree/ui.dynatree.css" rel="stylesheet" type="text/css">
<script src="<?php echo URL_JS ?>tree/jquery.dynatree.js" type="text/javascript"></script>
<script>
var objController = <?php echo json_encode($controladores) ?>;
var controlador=[];
$.each( objController, function( key, value ) {
	controlador.push(value);
});
console.log(controlador);
$("#listPermisos").dynatree({
	checkbox: true,
	selectMode: 3,
	children: controlador
});

</script>
<div id="listPermisos"></div>