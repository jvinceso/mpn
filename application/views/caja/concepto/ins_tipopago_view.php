 <script type="text/javascript" src='<?php echo URL_JS; ?>sistema/caja/concepto/concepto_ins.js'></script>

<form id="frm_ins_tipopago" name = "frm_ins_tipopago" class="form-horizontal" role="form">
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tipo de Pago</label>
		<div class="col-sm-9">
			<input type="text" id="txt_ins_tpago_nom" name = "txt_ins_tpago_nom" placeholder="Ingrese el nombre" class="col-xs-10 col-sm-5" />
		</div>
	</div>	
	<div class="space-4"></div>
	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<button id = "btn_ins_tpago_registrar" class="btn btn-info" data-loading-text="Loading..." type="submit">
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