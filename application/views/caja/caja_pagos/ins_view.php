<script type="text/javascript" src='<?php echo URL_JS; ?>sistema/caja/caja_pagos/pagos_ins.js'></script>
<form id="frm_ins_pagos" name = "frm_ins_pagos" class="form-horizontal" role="form">
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Nombre del Contribuyente </label>
		<div class="col-sm-9">
			<input type="text" id="txt_ins_pag_nombre" name = "txt_ins_pag_nombre" placeholder="Ingrese el Contribuyente" class="col-xs-10 col-sm-5" />
			<input type="hidden" id="hid_fnd_ins_pag_nombre" name = "hid_fnd_ins_pag_nombre"/>
		</div>
	</div>

	<div class="space-4"></div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Por Concepto de </label>
		<span class="input-icon col-xs-3">
			<div id="c_cbo_ins_pag_concepto"><?php echo $concepto ?></div>
		</span>
	</div>	
	<div class="space-4"></div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Monto </label>
		<div class="col-sm-9">
			<input type="text" id="txt_ins_pag_monto" name = "txt_ins_pag_monto" placeholder="Ingrese el monto" class="col-xs-10 col-sm-2" />
		</div>
	</div>	
	<div class="space-4"></div>

	<div class="form-group grupo1">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Mes </label>
		<span class="input-icon col-xs-3">
			<div id="c_cbo_ins_pag_mes">
				<?php 			
				echo form_dropdown("cbo_ins_pag_mes", creaComboCSO( generaMesesNombre() ),'', 'id="cbo_ins_pag_mes" class="chosen-select"');
				?>
			</div>
		</span>
	</div>	
	<div class="space-4 grupo1"></div>

	<div class="form-group grupo2">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Horas </label>
		<div class="col-sm-2">
			<div class="input-group bootstrap-timepicker">
				<input id="timepicker1" name = "txt_ins_pag_horas" type="text" class="form-control" />
				<span class="input-group-addon">
					<i class="icon-time bigger-110"></i>
				</span>
			</div>
		</div>
	</div>	
	<div class="space-4 grupo2"></div>

	<div class="form-group grupo2">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Sector </label>
		<div class="col-sm-9">
			<input type="text" id="txt_ins_pag_sector" name = "txt_ins_pag_sector" placeholder="Ingrese el sector" class="col-xs-10 col-sm-2" />
			<input type="hidden" id="hid_fnd_ins_pag_sector" name = "hid_fnd_ins_pag_sector"/>
		</div>
	</div>	
	<div class="space-4 grupo2"></div>

	<div class="form-group grupo3">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Fecha Planilla </label>
		<div class="col-sm-2">
			<div class="input-group">
				<input type="text" id="txt_ins_pag_fecha_planilla" name = "txt_ins_pag_fecha_planilla" placeholder="Ingrese la fecha" class="form-control date-picker" data-date-format="yyyy-mm-dd" />
				<span class="input-group-addon">
					<i class="icon-calendar bigger-110"></i>
				</span>
			</div>
		</div>
	</div>	
	<div class="space-4 grupo3"></div>

	<div class="form-group grupo3">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Nº Planilla </label>
		<div class="col-sm-9">
			<input type="text" id="txt_ins_pag_planilla" name = "txt_ins_pag_planilla" placeholder="Ingrese la planilla" class="col-xs-10 col-sm-2" />
		</div>
	</div>	
	<div class="space-4 grupo3"></div>	

	<div class="form-group grupo3">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Serie </label>
		<div class="col-sm-9">
			<input type="text" id="txt_ins_pag_serie" name = "txt_ins_pag_serie" placeholder="Ingrese la serie" class="col-xs-10 col-sm-2" />
		</div>
	</div>	
	<div class="space-4 grupo3"></div>

	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<button id = "btn_ins_pagos_registrar" class="btn btn-info" data-loading-text="Loading..." type="submit">
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