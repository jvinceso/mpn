<script type="text/javascript" src='<?php echo URL_JS; ?>sistema/agua/costo_servicios_tipo/costo_servicios_tipo_ins.js'></script>

<form id="frm_ins_costo_servicios_tipo" name = "frm_ins_costo_servicios_tipo" class="form-horizontal" role="form">
	<input type="hidden" id="txt_ins_setid" name="txt_ins_setid" value="<?php echo $nSetId ?>" />
	<div class="alert alert-info">
		<button data-dismiss="alert" class="close" type="button">
			<i class="icon-remove"></i>
		</button>
		<strong>Aviso!</strong>
			El costo que esta registrando sera para el año <?php echo date("Y"); ?> 
			<br>
	</div>
	<div class="form-group">
		<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Costo del Servicio</label>
		<div class="col-sm-8">
			<input type="text" id="txt_ins_cst_costo" name = "txt_ins_cst_costo" placeholder="Ingrese el monto" class="col-xs-10 col-sm-6" />
		</div>
	</div>
	<div class="space-4"></div>
	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<button id = "btn_ins_cst_registrar" class="btn btn-info" data-loading-text="Loading..." type="submit">
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
