<script type="text/javascript" src='<?php echo URL_JS; ?>sistema/administrador/trabajador/trabajador_ins.js'></script>
<script src="<?php echo URL_JS; ?>date-time/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="<?php echo URL_CSS; ?>datepicker.css" />
<link rel="stylesheet" href="<?php echo URL_CSS; ?>chosen.css" />

<form id="frm_ins_trabajador" name = "frm_ins_trabajador" class="form-horizontal" role="form">
	<h3 class="header smaller lighter blue">
		Datos Personales
		<small>Todos los datos propios de cada persona</small>
	</h3>
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="txt_ins_trab_dni"> DNI </label>

		<div class="col-sm-9">
			<input type="text" id="txt_ins_trab_dni" name = "txt_ins_trab_dni" placeholder="Ingrese su dni" class="col-xs-10 col-sm-5" />
		</div>
	</div>

	<div class="space-4"></div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="txt_ins_trab_nombres"> Nombres</label>

		<div class="col-sm-9">
			<input type="text" id="txt_ins_trab_nombres" name = "txt_ins_trab_nombres" placeholder="Ingrese sus nombres" class="col-xs-10 col-sm-5" />
		</div>
	</div>

	<div class="space-4"></div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="txt_ins_trab_appaterno"> Apellido Paterno </label>

		<div class="col-sm-9">
			<input type="text" id="txt_ins_trab_appaterno" name = "txt_ins_trab_appaterno" placeholder="Ingrese su apellido paterno" class="col-xs-10 col-sm-5" />
		</div>
	</div>

	<div class="space-4"></div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="txt_ins_trab_apmaterno">Apellido Materno</label>

		<div class="col-sm-9">
			<input type="text" id="txt_ins_trab_apmaterno" name = "txt_ins_trab_apmaterno" placeholder="Ingrese su apellido materno" class="col-xs-10 col-sm-5" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="txt_ins_trab_nacimiento">Fecha de Nacimiento</label>

		<div class="col-sm-3">
			<div class="input-group">
				<input class="form-control date-picker" id="txt_ins_trab_nacimiento" name = "txt_ins_trab_nacimiento" type="text" data-date-format="yyyy-mm-dd" />
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
			<div id="c_cbo_ins_trab_estcivil"></div>	
		</span>

		<span class="input-icon col-xs-2">
			<select class="form-control" id="cbo_ins_trab_sexo" name = "cbo_ins_trab_sexo">
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
				<input class="form-control" type="text" id="txt_ins_trab_telefono" name = "txt_ins_trab_telefono" />	
				<span class="input-group-addon">
					<i class="icon-phone"></i>
				</span>
			</div>

		</span>

		<span class="input-icon col-xs-2">
			<div class="input-group">
				<input class="form-control input-mask-phone" type="text" id="txt_ins_trab_celular" name = "txt_ins_trab_celular" />	
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
			<input type="text" id="txt_ins_trab_email" name = "txt_ins_trab_email" placeholder="Ingrese su e-mail" class="col-xs-10 col-sm-5" />
		</div>
	</div>
	<div class="space-4"></div>

	<h3 class="header smaller lighter blue">
		Datos del Trabajador
		<small>Todos los datos para poder ubicar al trabajador</small>
	</h3>
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right">Area | Cargo</label>

		<!-- <div class="col-sm-9"> -->
		<span class="input-icon col-xs-3">
			<div id="c_cbo_ins_trab_area"></div>
		</span>

		<span class="input-icon col-xs-2">
			<div id="c_cbo_ins_trab_cargo"></div>
		</span>
	</div>		
	<div class="space-4"></div>

	<h3 class="header smaller lighter blue">
		Dirección de la Persona
		<small>Dirección actual de la persona</small>
	</h3>
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-4">Dirección</label>

		<div class="col-sm-9">
			<input type="text" id="txt_ins_trab_direccion" name = "txt_ins_trab_direccion" placeholder="Ingrese su dirección" class="col-xs-10 col-sm-5" />
		</div>
	</div>
	<div class="space-4"></div>

	<h3 class="header smaller lighter blue">
		Datos de Usuario
		<small>Datos para que el trabajador acceda al sistema</small>
	</h3>
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right">Usuario | Contraseña</label>

		<!-- <div class="col-sm-9"> -->
		<span class="input-icon col-xs-2">
			<div class="input-group">
				<input id="txt_ins_trab_usuario" name = "txt_ins_trab_usuario" class="form-control" type="text"  />
			</div>
		</span>
		<span class="input-icon col-xs-2">
			<div class="input-group">
				<input id="txt_ins_trab_contrasenia" name = "txt_ins_trab_contrasenia" class="form-control" type="text"  />
			</div>
		</span>
		<!-- </div> -->
	</div>	
	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<button id = "btn_ins_trab_registrar" class="btn btn-info" data-loading-text="Loading..." type="submit">
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
<script src="<?php echo URL_JS; ?>jquery.maskedinput.min.js"></script>
<script src="<?php echo URL_JS; ?>chosen.jquery.min.js"></script>
