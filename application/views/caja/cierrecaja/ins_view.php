<script type="text/javascript" src='<?php echo URL_JS; ?>sistema/administrador/trabajador/trabajador_ins.js'></script>
<script src="<?php echo URL_JS; ?>date-time/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="<?php echo URL_CSS; ?>datepicker.css" />

<form class="form-horizontal" role="form">
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-5">Fecha de Cierre</label>

		<div class="col-sm-2">
			<div class="input-group">
				<input class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy" />
				<span class="input-group-addon">
					<i class="icon-calendar bigger-110"></i>
				</span>
			</div>
		</div>
	</div>

	<div class="space-4"></div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Saldo Actual | Ingresos</label>
		<span class="input-icon col-xs-2">
			<div class="input-group">
				<input id="txt_ins_ciec_saldo" name = "txt_ins_ciec_saldo" placeholder="Ingrese el saldo actual" class="form-control" type="text"  />
			</div>
		</span>
		<span class="input-icon col-xs-2">
			<div class="input-group">
				<input id="txt_ins_ciec_ingresos" name = "txt_ins_ciec_ingresos" placeholder="Ingresos" class="form-control" type="text"  />
			</div>
		</span>
	</div>
	<div class="space-4"></div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Salidas | Monto Total</label>
		<span class="input-icon col-xs-2">
			<div class="input-group">
				<input id="txt_ins_trab_usuario" name = "txt_ins_trab_usuario" placeholder="Salida" class="form-control" type="text"  />
			</div>
		</span>
		<span class="input-icon col-xs-2">
			<div class="input-group">
				<input id="txt_ins_trab_contrasenia" name = "txt_ins_trab_contrasenia" placeholder="Monto Total" class="form-control" type="text"  readonly/>
			</div>
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