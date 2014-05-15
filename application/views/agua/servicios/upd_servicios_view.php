<script type="text/javascript" src='<?php echo URL_JS; ?>sistema/agua/servicios/servicios_upd.js'></script>

<form id="frm_upd_servicio" name = "frm_upd_servicio" class="form-horizontal" role="form">
	<input type="hidden" id="txt_upd_nSetId" name="txt_upd_nSetId" value="<?php echo $fila['nSetId'] ?>" />
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Servicio</label>
		<div class="col-sm-9">
			<input type="text" id="txt_upd_serv_nom" name = "txt_upd_serv_nom" placeholder="Ingrese el nombre" class="col-xs-10 col-sm-5" value = "<?php echo $fila['servicio'] ?>"  />
		</div>
	</div>	
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right">Tipo</label>
		<span class="input-icon col-xs-3">
			<div id="c_cbo_upd_serv_tipo"></div>
			<input type="hidden" id="txt_upd_servtipo_nMulId" name="txt_upd_servtipo_nMulId" value="<?php echo $fila['nMulId'] ?>" />
		</span>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-tags">
			Costo
		</label>

		<div class="col-sm-9">
			<input type="text" name="txt_upd_serv_costo" id="txt_upd_serv_costo" placeholder="Ingrese el costo" value = "<?php echo $fila['costo'] ?>" />
		</div>
	</div>
	<div class="space-4"></div>
	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<button id = "btn_upd_serv_registrar" class="btn btn-info" data-loading-text="Loading..." type="submit">
				<i class="icon-ok bigger-110"></i>
				Registrar
			</button>
			&nbsp; &nbsp; &nbsp;
			<button class="btn" type="reset">
				<i class="icon-undo bigger-110"></i>
				Limpiar
			</button>
		</div>
	</div>
</form>
