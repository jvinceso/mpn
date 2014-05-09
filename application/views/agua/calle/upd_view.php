<script type="text/javascript" src='<?php echo URL_JS; ?>sistema/agua/calle/calle_upd.js'></script>
<!-- <link rel="stylesheet" href="<?php echo URL_CSS; ?>chosen.css" /> -->
<form id="frm_upd_calle" name = "frm_upd_calle" class="form-horizontal" role="form">
	<input type="hidden" id="txt_upd_nCalId" name="txt_upd_nCalId" value="<?php echo $fila['nCalId'] ?>" />
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nombre de la Calle</label>

		<div class="col-sm-9">
			<input type="text" id="txt_upd_cal_nom" name = "txt_upd_cal_nom" placeholder="Ingrese el nombre" class="col-xs-10 col-sm-5" value = "<?php echo $fila['cCalNombre'] ?>" />
		</div>
	</div>	
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right">Sector</label>
		<span class="input-icon col-xs-3">
			<div id="c_cbo_upd_cal_sector"></div>
			<input type="hidden" id="txt_upd_cal_nSecId" name="txt_upd_cal_nSecId" value="<?php echo $fila['nSecId'] ?>" />
		</span>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right">Vía</label>
		<span class="input-icon col-xs-2">
			<div id="c_cbo_upd_cal_via"></div>
			<input type="hidden" id="txt_upd_cal_nViaId" name="txt_upd_cal_nViaId" value="<?php echo $fila['nViaId'] ?>" />
		</span>
	</div>	
	<div class="space-4"></div>
	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<button id = "btn_upd_cal_registrar" class="btn btn-info" data-loading-text="Loading..." type="submit">
				<i class="icon-ok bigger-110"></i>
				Actualizar
			</button>
			&nbsp; &nbsp; &nbsp;
			<button class="btn" type="reset">
				<i class="icon-undo bigger-110"></i>
				Limpiar
			</button>
		</div>
	</div>
</form>
<script src="<?php echo URL_JS; ?>chosen.jquery.min.js"></script>