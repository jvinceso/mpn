<script type="text/javascript" src='<?php echo URL_JS; ?>sistema/caja/concepto/concepto_ins.js'></script>
<!-- <link rel="stylesheet" href="<?php echo URL_CSS; ?>chosen.css" /> -->
<form id="frm_ins_concepto" name = "frm_ins_concepto" class="form-horizontal" role="form">
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Descripción </label>

		<div class="col-sm-9">
			<input type="text" id="txt_ins_con_desc" name = "txt_ins_con_desc" placeholder="Ingrese la descripción" class="col-xs-10 col-sm-5" />
		</div>
	</div>

	<div class="space-4"></div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Costo</label>
		<div class="col-sm-9">
			<input type="text" id="txt_ins_con_costo" name = "txt_ins_con_costo" placeholder="Ingrese el costo" class="col-xs-10 col-sm-2" />
		</div>
	</div>

	<div class="space-4"></div>

	<div class="form-group">
		<label for = "sb_ins_conp_tipopago" class="col-sm-3 control-label no-padding-right">Tipo de Pago</label>
		<span class="col-sm-2">			
			<div id="c_cbo_ins_con_tipopago"></div>
		</span>		
	</div>	
	<div class="space-4"></div>
	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<button id = "btn_ins_concepto_registrar" class="btn btn-info" data-loading-text="Loading..." type="submit">
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
<!-- // <script src="<?php echo URL_JS; ?>chosen.jquery.min.js"></script> -->