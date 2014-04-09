<script type="text/javascript" src='<?php echo URL_JS; ?>sistema/agua/calle/calle_ins.js'></script>
<link rel="stylesheet" href="<?php echo URL_CSS; ?>chosen.css" />

<form id="frm_ins_calle" name = "frm_ins_calle" class="form-horizontal" role="form">
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nombre de la Calle</label>

		<div class="col-sm-9">
			<input type="text" id="txt_ins_cal_nom" name = "txt_ins_cal_nom" placeholder="Ingrese el nombre" class="col-xs-10 col-sm-5" />
		</div>
	</div>	
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right">Sector</label>
		<span class="input-icon col-xs-3">
			<div id="c_cbo_ins_cal_sector"></div>
		</span>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right">Vía</label>
		<span class="input-icon col-xs-2">
			<div id="c_cbo_ins_cal_via"></div>
		</span>
	</div>	
	<div class="space-4"></div>
	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<button id = "btn_ins_cal_registrar" class="btn btn-info" data-loading-text="Loading..." type="submit">
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
<script src="<?php echo URL_JS; ?>chosen.jquery.min.js"></script>