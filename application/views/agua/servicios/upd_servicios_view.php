<script type="text/javascript" src='<?php echo URL_JS; ?>sistema/agua/servicios/servicios_upd.js'></script>

<form id="frm_upd_servicio" name = "frm_upd_servicio" class="form-horizontal" role="form">
	<input type="hidden" id="txt_upd_serv_nMulId" name="txt_upd_serv_nMulId" value="<?php echo $fila['nMulId'] ?>" />
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Servicio</label>

		<div class="col-sm-9">
			<input type="text" id="txt_upd_serv_nom" name = "txt_upd_serv_nom" placeholder="Ingrese el nombre" class="col-xs-10 col-sm-7" value="<?php echo $fila['cMulDescripcion'] ?>"/>
		</div>
	</div>	
	<div class="space-4"></div>
	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<button id = "btn_upd_serv_registrar" class="btn btn-info" data-loading-text="Loading..." type="submit">
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