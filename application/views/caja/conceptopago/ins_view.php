<script type="text/javascript" src='<?php echo URL_JS; ?>sistema/administrador/trabajador/trabajador_ins.js'></script>
<script src="<?php echo URL_JS; ?>date-time/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="<?php echo URL_CSS; ?>datepicker.css" />

<form class="form-horizontal" role="form">
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Descripción </label>

		<div class="col-sm-9">
			<input type="text" id="txt_ins_cont_dni" name = "txt_ins_cont_dni" placeholder="Ingrese la descripción" class="col-xs-10 col-sm-5" />
		</div>
	</div>

	<div class="space-4"></div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Costo</label>
		<div class="col-sm-9">
			<input type="text" id="txt_ins_cont_nombres" name = "txt_ins_cont_nombres" placeholder="Ingrese el costo" class="col-xs-10 col-sm-2" />
		</div>
	</div>

	<div class="space-4"></div>

	<div class="form-group">
		<label for = "sb_ins_conp_tipopago" class="col-sm-3 control-label no-padding-right">Tipo de Pago</label>
		<span class="col-sm-2">			
			<select id = "sb_ins_conp_tipopago" class="form-control">
				<option value="">Rentas</option>
				<option value="AL">Desague</option>
			</select>	
		</span>		
	</div>	
	<div class="space-4"></div>
	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<button class="btn btn-info" type="button">
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