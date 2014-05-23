<script type="text/javascript" src='<?php echo URL_JS; ?>sistema/agua/servicios/servicios_ins.js'></script>

<form id="frm_ins_servicioportipo" name = "frm_ins_servicioportipo" class="form-horizontal" role="form">
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nombre del Servicio</label>

		<div class="col-sm-9">
			<!-- $hid_fnd_nomgiro = form_input(array('name' => 'hid_fnd_nomgiro', 'id' => 'hid_fnd_nomgiro', 'type' => 'hidden')); -->
			<input type="text" id="txt_ins_servpt_nom" name = "txt_ins_servpt_nom" placeholder="Ingrese el nombre" class="col-xs-10 col-sm-5" />
			<input type="hidden" id="hid_fnd_ins_servpt_nom" name = "hid_fnd_ins_servpt_nom"/>
		</div>
	</div>	
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-tags">
			Tipos de Servicios
		</label>

		<div class="col-sm-9">
			<input type="text" name="tags" id="form-field-tags" placeholder="Ingrese los tipos" />
		</div>
	</div>
	<div class="space-4"></div>
	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<button id = "btn_ins_servpt_registrar" class="btn btn-info" data-loading-text="Loading..." type="submit">
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
<script src="<?php echo URL_JS; ?>bootstrap-tag.min.js"></script>
<script src="<?php echo URL_JS; ?>ace-elements.min.js"></script>
