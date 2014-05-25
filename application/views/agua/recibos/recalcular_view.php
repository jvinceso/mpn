<script type="text/javascript" src='<?php echo URL_JS; ?>sistema/agua/recibos/recibos_recalcular.js'></script>
<form id="frm_rec_recibo" name = "frm_rec_recibo" class="form-horizontal" role="form">
	<?php foreach ($datos as $servicios) { ?>
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <?php echo ucwords(strtolower($servicios['cMulDescripcion'])) ?> </label>
		<div class="col-sm-9">
			<input type="text" id="<?php echo 'txt_rec_recibo_'.$servicios['nRedId'] ?>" name = "txt_rec_servicios[]"  class="col-xs-10 col-sm-5" value="<?php echo $servicios['cRedPrecio'] ?>" data-nRecId = "<?php echo $servicios['nRecId'] ?>" data-dRedFechaModificacion = "<?php echo $servicios['dRedFechaModificacion'] ?>"  />
		</div>
	</div>
	<div class="space-4"></div>
	<?php } ?>

	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<button id = "btn_rec_recibo_actualizar" class="btn btn-info" data-loading-text="Loading..." type="submit">
				<i class="icon-ok bigger-110"></i>
				Recalcular
			</button>

			&nbsp; &nbsp; &nbsp;
			<button class="btn" type="reset">
				<i class="icon-undo bigger-110"></i>
				Limpiar
			</button>
		</div>
	</div>
</form>