<script type="text/javascript" src='<?php echo URL_JS; ?>sistema/agua/contribuyente/contribuyente_ins.js'></script>
<script src="<?php echo URL_JS; ?>date-time/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="<?php echo URL_CSS; ?>datepicker.css" />

<form class="form-horizontal" role="form">
	<h3 class="header smaller lighter blue">
		Datos Personales
		<small>Todos los datos propios de cada persona</small>
	</h3>
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> DNI </label>

		<div class="col-sm-9">
			<input type="text" id="txt_ins_cont_dni" name = "txt_ins_cont_dni" placeholder="Ingrese su dni" class="col-xs-10 col-sm-5" />
		</div>
	</div>

	<div class="space-4"></div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Nombres</label>

		<div class="col-sm-9">
			<input type="text" id="txt_ins_cont_nombres" name = "txt_ins_cont_nombres" placeholder="Ingrese sus nombres" class="col-xs-10 col-sm-5" />
		</div>
	</div>

	<div class="space-4"></div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-input-readonly"> Apellido Paterno </label>

		<div class="col-sm-9">
			<input type="text" id="txt_ins_cont_appaterno" name = "txt_ins_cont_appaterno" placeholder="Ingrese su apellido paterno" class="col-xs-10 col-sm-5" />
		</div>
	</div>

	<div class="space-4"></div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-4">Apellido Materno</label>

		<div class="col-sm-9">
			<input type="text" id="txt_ins_cont_apmaterno" name = "txt_ins_cont_apmaterno" placeholder="Ingrese su apellido materno" class="col-xs-10 col-sm-5" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-5">Fecha de Nacimiento</label>

		<div class="col-sm-3">
			<div class="input-group">
				<input class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy" />
				<span class="input-group-addon">
					<i class="icon-calendar bigger-110"></i>
				</span>
			</div>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right">Estado civil | Sexo</label>

		<!-- <div class="col-sm-9"> -->
		<span class="input-icon col-xs-2">
			<select class="form-control" id="form-field-select-1">
				<option value="">Soltero(a)</option>
				<option value="AL">Casado(a)</option>
				<option value="AK">Viudo(a)</option>
				<option value="AZ">Divorciado(a)</option>
			</select>			
		</span>

		<span class="input-icon col-xs-2">
			<select class="form-control" id="form-field-select-2">
				<option value="">Masculino</option>
				<option value="AL">Femenino</option>
			</select>	
		</span>
		<!-- </div> -->
	</div>

	<div class="space-4"></div>

	<h3 class="header smaller lighter blue">
		Datos del Contacto
		<small>Todos los datos para poder ubicar a la persona</small>
	</h3>	
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right">Teléfono | Celular</label>

		<!-- <div class="col-sm-9"> -->
		<span class="input-icon col-xs-2">
			<div class="input-group">
				<input class="form-control input-mask-phone" type="text" id="form-field-mask-1" />	
				<span class="input-group-addon">
					<i class="icon-phone"></i>
				</span>
			</div>

		</span>

		<span class="input-icon col-xs-2">
			<div class="input-group">
				<input class="form-control input-mask-phone" type="text" id="form-field-mask-1" />	
				<span class="input-group-addon">
					<i class="icon-building"></i>
				</span>
			</div>
		</span>
		<!-- </div> -->
	</div>		
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-4">E-mail</label>
		<div class="col-sm-9">
			<input type="text" id="txt_ins_cont_email" name = "txt_ins_cont_email" placeholder="Ingrese su e-mail" class="col-xs-10 col-sm-5" />
		</div>
	</div>		
	<div class="space-4"></div>

	<h3 class="header smaller lighter blue">
		Dirección de la Persona
		<small>Dirección actual de la persona</small>
	</h3>	
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right">Sector | Calle | Via</label>

		<!-- <div class="col-sm-9"> -->
		<span class="input-icon col-xs-2">
			<select class="form-control" id="form-field-select-1">
				<option value="">Sector</option>
				<option value="AL">Casado(a)</option>
				<option value="AK">Viudo(a)</option>
				<option value="AZ">Divorciado(a)</option>
			</select>			
		</span>

		<span class="input-icon col-xs-2">
			<select class="form-control" id="form-field-select-2">
				<option value="">Calle</option>
				<option value="AL">Femenino</option>
			</select>	
		</span>	
		<span class="input-icon col-xs-2">
			<select class="form-control" id="form-field-select-2">
				<option value="">Via</option>
				<option value="AL">Femenino</option>
			</select>	
		</span>
		<!-- </div> -->
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-4">Dirección</label>

		<div class="col-sm-9">
			<input type="text" id="txt_ins_cont_direccion" name = "txt_ins_cont_direccion" placeholder="Ingrese su dirección" class="col-xs-10 col-sm-5" />
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right">Tipo de Tarifa | Agua Potable</label>

		<!-- <div class="col-sm-9"> -->
		<span class="input-icon col-xs-2">
			<select class="form-control" id="form-field-select-1">
				<option value="">Tipo de Tarifa</option>
				<option value="AL">Casado(a)</option>
				<option value="AK">Viudo(a)</option>
				<option value="AZ">Divorciado(a)</option>
			</select>			
		</span>

		<span class="input-icon col-xs-2">
			<select class="form-control" id="form-field-select-2">
				<option value="">Agua Potable</option>
				<option value="AL">Femenino</option>
			</select>	
		</span>
		<!-- </div> -->
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right">Desague | Limpieza</label>

		<!-- <div class="col-sm-9"> -->
		<span class="input-icon col-xs-2">
			<select class="form-control" id="form-field-select-1">
				<option value="">Desague</option>
				<option value="AL">Casado(a)</option>
				<option value="AK">Viudo(a)</option>
				<option value="AZ">Divorciado(a)</option>
			</select>			
		</span>

		<span class="input-icon col-xs-2">
			<select class="form-control" id="form-field-select-2">
				<option value="">Limpieza</option>
				<option value="AL">Femenino</option>
			</select>	
		</span>
		<!-- </div> -->
	</div>
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