<script type="text/javascript" src='<?php echo URL_JS; ?>sistema/agua/contribuyente/contribuyente_ins.js'></script>

<!-- <link rel="stylesheet" href="<?php echo URL_CSS; ?>chosen.css" /> -->

<form id="frm_ins_contribuyente" name = "frm_ins_contribuyente" class="form-horizontal" role="form">
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
				<input class="form-control date-picker" id="txt_ins_cont_nacimiento" name="txt_ins_cont_nacimiento" type="text" data-date-format="yyyy-mm-dd" />
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
			<div id="c_cbo_ins_cont_estcivil"></div>		
		</span>

		<span class="input-icon col-xs-2">
			<select class="form-control" id="cbo_ins_cont_sexo" name = "cbo_ins_cont_sexo">
				<option value="26">Masculino</option>
				<option value="27">Femenino</option>
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
				<input class="form-control" type="text" id="txt_ins_cont_telefono" name = "txt_ins_cont_telefono" />	
				<span class="input-group-addon">
					<i class="icon-phone"></i>
				</span>
			</div>

		</span>

		<span class="input-icon col-xs-2">
			<div class="input-group">
				<input class="form-control input-mask-phone" type="text" id="txt_ins_cont_celular" name = "txt_ins_cont_celular" />	
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
	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<button id = "btn_ins_cont_registrar" class="btn btn-info" data-loading-text="Loading..." type="submit">
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